@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-8">
  <div class="max-w-[95%] mx-auto">
    <div class="bg-white rounded-2xl shadow-lg border border-slate-200/60 overflow-hidden mb-8">
      <div class="p-8">
        @yield('card-filters')
      </div>
      <div>
        @yield('card-content')
      </div>
      <div class="border-t border-slate-200 bg-slate-50/50 px-8 py-6">
        @yield('card-actions')
      </div>
    </div>
  </div>
</div>
@endsection 