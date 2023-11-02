<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Transaksi') }}
        </h2>
    </x-slot>
<!-- 
Nama    : Muhammad Kafaby
NIM     : 6706220149
Kelas   : 4603 
-->
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('transaksi.update', ['id' => $transaksiDetail->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            @php
                                $petugas = \App\Models\User::find($transaksi->idPetugas);
                                $peminjam = \App\Models\User::find($transaksi->idPeminjam);
                                $koleksi = \App\Models\Koleksi::find($transaksiDetail->idKoleksi);
                            @endphp
                            
                            <p>Koleksi: {{ $koleksi->namaKoleksi }}</p>
                            <p>Petugas: {{ $petugas->fullname }}</p>
                            <p>Peminjam: {{ $peminjam->fullname }}</p>
                            <p>Tanggal Pinjam: {{ $transaksi->tanggalPinjam }}</p>

                            <!-- Status Transaksi -->
                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status Transaksi')" />
                                <select id="status" name="status" class="block mt-1 w-full">
                                    <option value="1" {{ $transaksi->status == 1 ? 'selected' : '' }}>Pinjam</option>
                                    <option value="2" {{ $transaksi->status == 2 ? 'selected' : '' }}>Kembali</option>
                                    <option value="3" {{ $transaksi->status == 3 ? 'selected' : '' }}>Hilang</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div><br>

                            <!-- Tombol Submit -->
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('transaksi.infoTransaksi', $transaksi->id) }}" class="btn btn-dark mr-2">Kembali</a>
                                <x-primary-button class="ml-4" type="submit">Update Transaksi</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>