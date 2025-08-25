@extends('layouts.app')

@section('title', '')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-4">
  <div class="max-w-4xl mx-auto space-y-4 px-2">
    
    <!-- Profile Header Card -->
    <div class="bg-white rounded-2xl shadow-xl border border-slate-200/60 overflow-hidden">
      <div class="bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-700 px-4 py-6 relative overflow-hidden">
        <!-- Enhanced Background Pattern -->
        <div class="absolute inset-0 opacity-10">
          <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full transform translate-x-32 -translate-y-32"></div>
          <div class="absolute bottom-0 left-0 w-40 h-40 bg-white rounded-full transform -translate-x-16 translate-y-16"></div>
          <div class="absolute top-1/2 left-1/2 w-20 h-20 bg-white rounded-full transform -translate-x-10 -translate-y-10"></div>
        </div>
        
        <div class="relative z-10">
          <div class="flex flex-col lg:flex-row items-start lg:items-center gap-4">
            <!-- Enhanced Avatar -->
            <div class="relative group">
              <div class="w-20 h-20 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm border border-white/30 group-hover:scale-105 transition-transform duration-300">
                <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg>
              </div>
              <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-emerald-500 rounded-full border-2 border-white flex items-center justify-center">
                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
              </div>
            </div>
            
            <!-- Enhanced Profile Info -->
            <div class="flex-1 space-y-3">
              <div>
                <h1 class="text-2xl font-bold text-white mb-2">{{ $admin->name }}</h1>
                <div class="flex items-center gap-2 mb-2">
                  <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-blue-100 text-xs font-medium border border-white/30">
                    {{ $admin->position ?? 'Administrator' }}
                  </span>
                  <span class="px-2 py-0.5 bg-emerald-500/20 backdrop-blur-sm rounded-full text-emerald-100 text-xs font-medium border border-emerald-400/30">
                    Aktif
                  </span>
                </div>
              </div>
              
              <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-2">
                <!-- Email Card -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 border border-white/20 hover:bg-white/15 transition-colors group">
                  <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                      </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                      <div class="text-white/80 text-xs font-medium">Email</div>
                      <div class="text-white font-semibold truncate text-sm">{{ $admin->email }}</div>
                    </div>
                  </div>
                </div>
                
                <!-- Phone Card -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 border border-white/20 hover:bg-white/15 transition-colors group">
                  <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                      </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                      <div class="text-white/80 text-xs font-medium">No. HP</div>
                      <div class="text-white font-semibold text-sm">{{ $admin->phone ?? 'Belum diisi' }}</div>
                    </div>
                  </div>
                </div>
                
                <!-- Join Date Card -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 border border-white/20 hover:bg-white/15 transition-colors group md:col-span-2 xl:col-span-1">
                  <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                      </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                      <div class="text-white/80 text-xs font-medium">Bergabung</div>
                      <div class="text-white font-semibold text-sm">{{ $admin->created_at ? $admin->created_at->format('d M Y') : '-' }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Profile Details Card -->
    <div class="bg-white rounded-2xl shadow-xl border border-slate-200/60 p-4">
      <div class="flex items-center gap-2 mb-4">
        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
          <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
          </svg>
        </div>
        <h2 class="text-xl font-bold text-slate-900">Detail Profil</h2>
      </div>
      
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="space-y-3">
          <!-- NIP -->
          <div class="group">
            <div class="p-3 bg-gradient-to-r from-slate-50 to-slate-100 rounded-xl border border-slate-200 hover:shadow-md transition-all duration-300">
              <label class="block text-xs font-bold text-slate-600 mb-1 uppercase tracking-wide">NIP</label>
              <div class="text-slate-900 font-semibold text-base break-words">{{ $admin->nip ?? 'Belum diisi' }}</div>
            </div>
          </div>
          
          <!-- Position -->
          <div class="group">
            <div class="p-3 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200 hover:shadow-md transition-all duration-300">
              <label class="block text-xs font-bold text-blue-600 mb-1 uppercase tracking-wide">Jabatan</label>
              <div class="text-slate-900 font-semibold text-base">{{ $admin->position ?? 'Belum diisi' }}</div>
            </div>
          </div>
          
          <!-- Phone -->
          <div class="group">
            <div class="p-3 bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl border border-emerald-200 hover:shadow-md transition-all duration-300">
              <label class="block text-xs font-bold text-emerald-600 mb-1 uppercase tracking-wide">No. HP</label>
              <div class="text-slate-900 font-semibold text-base break-words">{{ $admin->phone ?? 'Belum diisi' }}</div>
            </div>
          </div>
        </div>
        
        <div class="space-y-3">
          <!-- Join Date -->
          <div class="group">
            <div class="p-3 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl border border-purple-200 hover:shadow-md transition-all duration-300">
              <label class="block text-xs font-bold text-purple-600 mb-1 uppercase tracking-wide">Tanggal Bergabung</label>
              <div class="text-slate-900 font-semibold text-base">
                {{ $admin->created_at ? $admin->created_at->format('d M Y, H:i') : '-' }}
              </div>
            </div>
          </div>
          
          <!-- Last Updated -->
          <div class="group">
            <div class="p-3 bg-gradient-to-r from-orange-50 to-red-50 rounded-xl border border-orange-200 hover:shadow-md transition-all duration-300">
              <label class="block text-xs font-bold text-orange-600 mb-1 uppercase tracking-wide">Terakhir Diperbarui</label>
              <div class="text-slate-900 font-semibold text-base">
                {{ $admin->updated_at ? $admin->updated_at->format('d M Y, H:i') : '-' }}
              </div>
            </div>
          </div>
          
          <!-- Address -->
          <div class="group">
            <div class="p-3 bg-gradient-to-r from-cyan-50 to-blue-50 rounded-xl border border-cyan-200 hover:shadow-md transition-all duration-300">
              <label class="block text-xs font-bold text-cyan-600 mb-1 uppercase tracking-wide">Alamat</label>
              <div class="text-slate-900 font-semibold text-base break-words">{{ $admin->address ?? 'Belum diisi' }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Forms Grid -->
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
      <!-- Edit Biodata Card -->
      <div class="bg-white rounded-2xl shadow-xl border border-slate-200/60 p-4">
        <div class="flex items-center gap-2 mb-4">
          <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
          </div>
          <h2 class="text-lg font-bold text-slate-900">Edit Biodata</h2>
        </div>
        
        @if(session('biodata_status'))
          <div class="mb-8 p-5 bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 rounded-2xl animate-fade-in">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
              </div>
              <div class="text-emerald-800 font-semibold">{{ session('biodata_status') }}</div>
            </div>
          </div>
        @endif
        
        <form method="POST" action="{{ route('admin.biodata.update') }}" class="space-y-3">
          @csrf
          <div class="space-y-3">
            <!-- Name Field -->
            <div class="form-group">
              <label for="name" class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wide">Nama Lengkap</label>
              <input type="text"
                     id="name"
                     name="name"
                     value="{{ request('reset') ? '' : old('name', $admin->name) }}"
                     class="w-full px-3 py-2 border-2 border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-base font-medium placeholder-slate-400"
                     placeholder="Masukkan nama lengkap">
            </div>
            
            <!-- NIP Field -->
            <div class="form-group">
              <label for="nip" class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wide">NIP</label>
              <input type="text"
                     id="nip"
                     name="nip"
                     value="{{ request('reset') ? '' : old('nip', $admin->nip) }}"
                     class="w-full px-3 py-2 border-2 border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-base font-medium placeholder-slate-400"
                     placeholder="Masukkan NIP">
            </div>
            
            <!-- Position Field -->
            <div class="form-group">
              <label for="position" class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wide">Jabatan</label>
              <input type="text"
                     id="position"
                     name="position"
                     value="{{ request('reset') ? '' : old('position', $admin->position) }}"
                     class="w-full px-3 py-2 border-2 border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-base font-medium placeholder-slate-400"
                     placeholder="Masukkan jabatan">
            </div>
            
            <!-- Phone Field -->
            <div class="form-group">
              <label for="phone" class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wide">No. HP</label>
              <input type="text"
                     id="phone"
                     name="phone"
                     value="{{ request('reset') ? '' : old('phone', $admin->phone) }}"
                     class="w-full px-3 py-2 border-2 border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-base font-medium placeholder-slate-400"
                     placeholder="Masukkan nomor HP">
            </div>
            
            <!-- Address Field -->
            <div class="form-group">
              <label for="address" class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wide">Alamat Lengkap</label>
              <textarea id="address"
                        name="address"
                        rows="3"
                        class="w-full px-3 py-2 border-2 border-slate-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 text-base font-medium placeholder-slate-400 resize-none"
                        placeholder="Masukkan alamat lengkap">{{ request('reset') ? '' : old('address', $admin->address) }}</textarea>
            </div>
          </div>
          
          <div class="pt-2">
            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl text-base">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
              Simpan Biodata
            </button>
          </div>
        </form>
      </div>

      <!-- Change Password Card -->
      <div class="bg-white rounded-2xl shadow-xl border border-slate-200/60 p-4">
        <div class="flex items-center gap-2 mb-4">
          <div class="w-8 h-8 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
          </div>
          <h2 class="text-lg font-bold text-slate-900">Ubah Password</h2>
        </div>
        
        @if(session('status'))
          <div class="mb-8 p-5 bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 rounded-2xl animate-fade-in">
            <div class="flex items-center gap-4">
              <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
              </div>
              <div class="text-emerald-800 font-semibold">{{ session('status') }}</div>
            </div>
          </div>
        @endif
        
        @if($errors->any())
          <div class="mb-8 p-5 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-2xl animate-fade-in">
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 bg-red-100 rounded-xl flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                </svg>
              </div>
              <div class="space-y-2">
                @foreach($errors->all() as $error)
                  <div class="text-red-800 font-semibold">{{ $error }}</div>
                @endforeach
              </div>
            </div>
          </div>
        @endif
        
        <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-3">
          @csrf
          
          <!-- Current Password -->
          <div class="form-group">
            <label for="current_password" class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wide">Password Lama</label>
            <div class="relative flex items-center">
              <input type="password" 
                     id="current_password"
                     name="current_password" 
                     class="w-full px-3 py-2 pr-10 border-2 border-slate-200 rounded-xl focus:ring-4 focus:ring-orange-500/20 focus:border-orange-500 transition-all duration-300 text-base font-medium placeholder-slate-400"
                     placeholder="Masukkan password lama"
                     required>
              <button type="button" 
                      class="absolute right-2 inset-y-0 flex items-center text-slate-400 hover:text-slate-600 transition-colors p-1"
                      onclick="togglePassword('current_password')">
                <svg class="w-5 h-5" id="current_password_icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
              </button>
            </div>
          </div>
          
          <!-- New Password -->
          <div class="form-group">
            <label for="password" class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wide">Password Baru</label>
            <div class="relative flex items-center">
              <input type="password" 
                     id="password"
                     name="password" 
                     class="w-full px-3 py-2 pr-10 border-2 border-slate-200 rounded-xl focus:ring-4 focus:ring-orange-500/20 focus:border-orange-500 transition-all duration-300 text-base font-medium placeholder-slate-400"
                     placeholder="Masukkan password baru"
                     required>
              <button type="button" 
                      class="absolute right-2 inset-y-0 flex items-center text-slate-400 hover:text-slate-600 transition-colors p-1"
                      onclick="togglePassword('password')">
                <svg class="w-5 h-5" id="password_icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
              </button>
            </div>
            <div class="mt-2 p-2 bg-blue-50 rounded-lg border border-blue-200">
              <div class="text-xs text-blue-700 font-medium">
                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Password minimal 8 karakter dengan kombinasi huruf dan angka
              </div>
            </div>
          </div>
          
          <!-- Confirm Password -->
          <div class="form-group">
            <label for="password_confirmation" class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wide">Konfirmasi Password Baru</label>
            <div class="relative flex items-center">
              <input type="password" 
                     id="password_confirmation"
                     name="password_confirmation" 
                     class="w-full px-3 py-2 pr-10 border-2 border-slate-200 rounded-xl focus:ring-4 focus:ring-orange-500/20 focus:border-orange-500 transition-all duration-300 text-base font-medium placeholder-slate-400"
                     placeholder="Konfirmasi password baru"
                     required>
              <button type="button" 
                      class="absolute right-2 inset-y-0 flex items-center text-slate-400 hover:text-slate-600 transition-colors p-1"
                      onclick="togglePassword('password_confirmation')">
                <svg class="w-5 h-5" id="password_confirmation_icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
              </button>
            </div>
          </div>
          
          <div class="pt-2">
            <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-[1.02] hover:shadow-xl text-base">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
              </svg>
              Simpan Password
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Enhanced password toggle functionality
  window.togglePassword = function(fieldId) {
    const field = document.getElementById(fieldId);
    const icon = document.getElementById(fieldId + '_icon');
    const button = icon.parentElement;
    
    if (field.type === 'password') {
      field.type = 'text';
      button.classList.add('text-orange-500');
      icon.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
      `;
    } else {
      field.type = 'password';
      button.classList.remove('text-orange-500');
      icon.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
      `;
    }
  };
  
  // Enhanced form validation with real-time feedback
  const passwordForm = document.querySelector('form[action*="password.update"]');
  if (passwordForm) {
    const passwordField = document.getElementById('password');
    const confirmField = document.getElementById('password_confirmation');
    
    // Real-time password strength indicator
    passwordField.addEventListener('input', function() {
      const password = this.value;
      const strength = calculatePasswordStrength(password);
      updatePasswordStrengthIndicator(strength);
    });
    
    // Real-time confirmation matching
    confirmField.addEventListener('input', function() {
      const password = passwordField.value;
      const confirm = this.value;
      
      if (confirm && password !== confirm) {
        this.classList.add('border-red-300', 'focus:border-red-500', 'focus:ring-red-500/20');
        this.classList.remove('border-slate-200', 'focus:border-orange-500', 'focus:ring-orange-500/20');
      } else {
        this.classList.remove('border-red-300', 'focus:border-red-500', 'focus:ring-red-500/20');
        this.classList.add('border-slate-200', 'focus:border-orange-500', 'focus:ring-orange-500/20');
      }
    });
    
    passwordForm.addEventListener('submit', function(e) {
      const password = passwordField.value;
      const confirmation = confirmField.value;
      
      if (password !== confirmation) {
        e.preventDefault();
        showErrorMessage('Password konfirmasi tidak cocok');
        confirmField.focus();
      }
    });
  }
  
  // Enhanced phone number formatting
  const phoneInput = document.getElementById('phone');
  if (phoneInput) {
    phoneInput.addEventListener('input', function(e) {
      let value = e.target.value.replace(/\D/g, '');
      
      // Indonesian phone number formatting
      if (value.startsWith('62')) {
        value = '+' + value;
      } else if (value.startsWith('0')) {
        if (value.length > 4 && value.length <= 8) {
          value = value.replace(/(\d{4})(\d+)/, '$1-$2');
        } else if (value.length > 8) {
          value = value.replace(/(\d{4})(\d{4})(\d+)/, '$1-$2-$3');
        }
      }
      
      e.target.value = value;
    });
  }
  
  // Enhanced form loading states
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    form.addEventListener('submit', function() {
      const submitBtn = this.querySelector('button[type="submit"]');
      if (submitBtn && !submitBtn.disabled) {
        const originalContent = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
        submitBtn.innerHTML = `
          <svg class="animate-spin w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
          Menyimpan...
        `;
        
        // Fallback to re-enable button
        setTimeout(() => {
          submitBtn.disabled = false;
          submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
          submitBtn.innerHTML = originalContent;
        }, 5000);
      }
    });
  });
  
  // Auto-hide success messages with animation
  const successMessages = document.querySelectorAll('.animate-fade-in');
  successMessages.forEach(message => {
    setTimeout(() => {
      message.style.transition = 'all 0.5s ease-out';
      message.style.opacity = '0';
      message.style.transform = 'translateY(-20px) scale(0.95)';
      setTimeout(() => {
        message.remove();
      }, 500);
    }, 5000);
  });
  
  // Helper functions
  function calculatePasswordStrength(password) {
    let strength = 0;
    if (password.length >= 8) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    return strength;
  }
  
  function updatePasswordStrengthIndicator(strength) {
    // This could be expanded to show a visual strength indicator
    const passwordField = document.getElementById('password');
    const colors = ['border-red-300', 'border-orange-300', 'border-yellow-300', 'border-blue-300', 'border-emerald-300'];
    
    // Remove all color classes
    colors.forEach(color => passwordField.classList.remove(color));
    
    // Add appropriate color based on strength
    if (strength > 0) {
      passwordField.classList.add(colors[Math.min(strength - 1, 4)]);
    }
  }
  
  function showErrorMessage(message) {
    const errorDiv = document.createElement('div');
    errorDiv.className = 'fixed top-4 right-4 z-50 p-4 bg-red-50 border border-red-200 rounded-2xl shadow-lg animate-fade-in';
    errorDiv.innerHTML = `
      <div class="flex items-center gap-3">
        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
          <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
          </svg>
        </div>
        <div class="text-red-800 font-semibold">${message}</div>
      </div>
    `;
    
    document.body.appendChild(errorDiv);
    
    setTimeout(() => {
      errorDiv.style.transition = 'all 0.3s ease-out';
      errorDiv.style.opacity = '0';
      errorDiv.style.transform = 'translateX(100%)';
      setTimeout(() => errorDiv.remove(), 300);
    }, 3000);
  }
});
</script>

<style>
/* Enhanced animations and transitions */
@keyframes fade-in {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-in {
  animation: fade-in 0.5s ease-out;
}

/* Enhanced focus states */
.form-group input:focus,
.form-group textarea:focus {
  transform: translateY(-1px);
  box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 0 0 4px var(--tw-ring-color);
}

/* Enhanced button states */
button:not(:disabled):hover {
  transform: translateY(-1px);
}

button:not(:disabled):active {
  transform: translateY(0);
}

/* Smooth scrolling */
html {
  scroll-behavior: smooth;
}

/* Enhanced card hover effects */
.group:hover .group-hover\:scale-110 {
  transform: scale(1.1);
}

/* Custom scrollbar for webkit browsers */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #f1f5f9;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb {
  background: #cbd5e1;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: #94a3b8;
}

/* Responsive improvements */
@media (max-width: 640px) {
  .rounded-3xl {
    border-radius: 1.5rem;
  }
  
  .p-8 {
    padding: 1.5rem;
  }
  
  .text-4xl {
    font-size: 2rem;
    line-height: 2.5rem;
  }
  
  .text-3xl {
    font-size: 1.75rem;
    line-height: 2.25rem;
  }
}
</style>
@endsection