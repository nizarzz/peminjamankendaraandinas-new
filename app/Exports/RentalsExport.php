<?php
namespace App\Exports;

use App\Models\Rental;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Illuminate\Http\Request;

class RentalsExport implements FromCollection, WithHeadings, WithStyles, WithEvents, WithTitle
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Rental::with(['user', 'vehicle']);
        // Filter search (nama peminjam, kendaraan, plat nomor)
        if (!empty($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function($q) use ($search) {
                $q->whereHas('user', function($qu) use ($search) {
                    $qu->where('name', 'like', "%$search%");
                })
                ->orWhereHas('vehicle', function($qu) use ($search) {
                    $qu->where('name', 'like', "%$search%")
                       ->orWhere('license_plate', 'like', "%$search%");
                });
            });
        }
        // Filter status
        if (!empty($this->filters['status'])) {
            $query->where('status', $this->filters['status']);
        }
        // Filter tanggal
        if (!empty($this->filters['date_from'])) {
            $query->whereDate('time_out', '>=', $this->filters['date_from']);
        }
        if (!empty($this->filters['date_to'])) {
            $query->whereDate('time_out', '<=', $this->filters['date_to']);
        }
        $rentals = $query->get();
        return $rentals->map(function ($rental) {
            // Hitung durasi
            $durasi = '-';
            if ($rental->status == 'returned' && $rental->time_in && $rental->time_out) {
                $start = \Carbon\Carbon::parse($rental->time_out);
                $end = \Carbon\Carbon::parse($rental->time_in);
                $diff = $start->diff($end);
                $parts = [];
                if ($diff->d > 0) $parts[] = $diff->d . ' hari';
                if ($diff->h > 0) $parts[] = $diff->h . ' jam';
                if ($diff->i > 0) $parts[] = $diff->i . ' menit';
                $durasi = implode(' ', $parts);
            }
            return [
                'Nama Peminjam' => $rental->user->name ?? '-',
                'Kendaraan' => $rental->vehicle->name ?? '-',
                'Jenis' => $rental->vehicle->type ?? '-',
                'Bahan Bakar' => $rental->vehicle->fuel_type ?? '-',
                'Plat Nomor' => $rental->vehicle->license_plate ?? '-',
                'Tgl Pinjam' => $rental->time_out,
                'Tgl Kembali' => $rental->time_in ?? '-',
                'Durasi' => $durasi,
                'Tujuan' => $rental->purpose,
                'KM Awal' => $rental->start_kilometer,
                'KM Akhir' => $rental->end_kilometer,
                'Jarak' => $rental->jarak_tempuh,
                'Status' => $rental->status,
                'Alasan Penolakan' => ($rental->status == 'rejected' ? ($rental->rejection_reason ?? '-') : '-')
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Peminjam', 'Kendaraan', 'Jenis', 'Bahan Bakar', 'Plat Nomor',
            'Tgl Pinjam', 'Tgl Kembali', 'Durasi', 'Tujuan', 'KM Awal', 'KM Akhir', 'Jarak', 'Status', 'Alasan Penolakan'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Tidak ada teks yang ditebalkan
        return [];
    }

    public function title(): string
    {
        return 'Laporan Peminjaman Kendaraan';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Judul di atas tabel
                $sheet->insertNewRowBefore(1, 1);
                $sheet->setCellValue('A1', 'Laporan Peminjaman Kendaraan');
                $lastCol = chr(ord('A') + count($this->headings()) - 1);
                $sheet->mergeCells("A1:{$lastCol}1");

                // Hapus bold dan atur ukuran font normal (misalnya 12)
                $sheet->getStyle('A1')->getFont()->setBold(false)->setSize(12);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

                // Autofit semua kolom
                foreach (range('A', $lastCol) as $col) {
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }

                // Border dan alignment kiri untuk seluruh isi tabel
                $lastRow = $sheet->getHighestRow();
                $range = "A2:{$lastCol}{$lastRow}";

                $sheet->getStyle($range)->getBorders()->getAllBorders()
                      ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // Rata kiri semua isi
                $sheet->getStyle($range)->getAlignment()->setHorizontal('left');
            },
        ];
    }
}
