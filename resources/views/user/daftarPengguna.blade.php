<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pengguna') }}
        </h2>
    </x-slot>
 <!-- 
Nama    : Muhammad Kafaby
NIM     : 6706220149
Kelas   : D3IF-4604 
-->
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"><a href="{{ route('user.registrasi') }}" class="btn btn-icon btn-dark">Tambah</a></div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
</x-app-layout>