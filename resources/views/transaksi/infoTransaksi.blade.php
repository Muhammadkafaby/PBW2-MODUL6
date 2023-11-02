<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informasi Transaksi') }}
        </h2>
    </x-slot>
<!--  
| Nama  : Muhammad Kafaby
| NIM   : 6706220149
| Kelas : 4603 
-->
<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="#" class="btn btn-dark" onclick="goBack()">Back</a><br><br>
                    
                    @php
                        $petugas = \App\Models\User::find($transaksi->idPetugas);
                        $peminjam = \App\Models\User::find($transaksi->idPeminjam);
                    @endphp
                    
                    <p>Petugas: {{ $petugas->fullname }}</p>
                    <p>Peminjam: {{ $peminjam->fullname }}</p>
                    <p>Tanggal Pinjam: {{ $transaksi->tanggalPinjam }}</p>
                    @if ($transaksi->tanggalSelesai != null)
                    <p>Tanggal Selesai: {{ $transaksi->tanggalSelesai }}</p>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full table-auto"> 
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Nama Koleksi</th>
                                <th class="border px-4 py-2">Tanggal Kembali</th>
                                <th class="border px-4 py-2">Status</th>
                                @if ($transaksi->tanggalSelesai == null)
                                <th class="border px-4 py-2">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transaksiDetails as $key => $transaksii)
                                <tr>
                                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $transaksii->koleksi->namaKoleksi }}</td>
                                    <td class="border px-4 py-2">@if ($transaksii->tanggalKembali){{ $transaksii->tanggalKembali }}@else-@endif</td>
                                    <td class="border px-4 py-2">@if ($transaksii->status == 1)Pinjam @elseif ($transaksii->status == 2)Kembali @elseif ($transaksii->status == 3)Hilang @else- @endif</td>
                                    @if ($transaksi->tanggalSelesai == null)
                                    <td class="border px-4 py-2">
                                    @if ($transaksii->status == 1)
                                        <a href="{{ route('transaksi.editTransaksi', $transaksii->id) }}" class="btn btn-icon btn-sm btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg></a>
                                    @endif
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</x-app-layout>