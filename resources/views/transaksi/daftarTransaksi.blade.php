<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Transaksi') }}
        </h2>
    </x-slot>
 <!-- 
Nama    : Muhammad Kafaby
NIM     : 6706220149
Kelas   : 4603 
-->
    <div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
        <div class="card">
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).on('click', '.view-detail', function () {
            var id = $(this).data('id');
            // Redirect ke rute infoTransaksi dengan parameter ID
            window.location.href = "{{ route('transaksi.infoTransaksi', '') }}/" + id;
        });
    </script>
@endpush
</x-app-layout>