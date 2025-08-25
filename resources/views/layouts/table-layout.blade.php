@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-8 rounded-2xl">
  <div class="max-w-[95%] mx-auto">
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden mb-8">
      {{-- Header Section --}}
      @hasSection('header')
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-8 py-6">
          @yield('header')
        </div>
      @endif
      {{-- Filter Section --}}
      @hasSection('filters')
        <div class="p-8">
          @yield('filters')
        </div>
      @endif
      {{-- Card Section --}}
      @hasSection('cards')
        <div class="p-8">
          @yield('cards')
        </div>
      @endif
      {{-- Table Section --}}
      <div class="overflow-x-auto">
        @hasSection('table')
          @yield('table')
        @elseif (View::hasSection('tabel'))
          @yield('tabel')
        @endif
      </div>
      @hasSection('actions')
        <div class="border-t border-slate-200 bg-slate-50/50 px-8 py-6">
          @yield('actions')
        </div>
      @endif
    </div>
  </div>
</div>
@endsection 