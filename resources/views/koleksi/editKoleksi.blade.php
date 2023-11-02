<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Koleksi') }}
        </h2>
    </x-slot>
<!-- 
Nama    : Muhammad Kafaby
NIM     : 6706220149
Kelas   : D3IF-4604 
-->

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif -->
                        <form action="{{ route('koleksi.update', $koleksi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <p>Nama Koleksi: {{ $koleksi->namaKoleksi }}</p>
                            <p>Jumlah Koleksi: {{ $koleksi->jumlahKoleksi }}</p>
                            <p>Jumlah Sisa: {{ $koleksi->jumlahSisa }}</p>
                            <p>Ditambahkan: {{ $koleksi->created_at }}</p>
                            <p>Diupdate: {{ $koleksi->updated_at }}</p>

                            <!-- Jenis Koleksi -->
                            <div class="mt-4">
                                <x-input-label for="jenisKoleksi" :value="__('Jenis Koleksi')" />
                                <select id="jenisKoleksi" name="jenisKoleksi" class="block mt-1 w-full">
                                    <option value="1" {{ $koleksi->jenisKoleksi == 1 ? 'selected' : '' }}>Buku</option>
                                    <option value="2" {{ $koleksi->jenisKoleksi == 2 ? 'selected' : '' }}>Majalah</option>
                                    <option value="3" {{ $koleksi->jenisKoleksi == 3 ? 'selected' : '' }}>Cakram Digital</option>
                                </select>
                                <x-input-error :messages="$errors->get('jenisKoleksi')" class="mt-2" />
                            </div><br>

                            <!-- Jumlah Koleksi -->
                            <div class="mb-4">
                                <label for="jumlahKoleksi" class="block text-sm font-medium text-gray-600">Jumlah Keluar</label>
                                <input type="number" name="jumlahKeluar" id="jumlahKeluar" class="mt-1 p-2 border rounded-md w-full"
                                    value="{{ $koleksi->jumlahKeluar }}" required max="{{ $koleksi->jumlahKoleksi }}">
                            </div>

                            <!-- Tombol Submit -->
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('koleksi.daftarKoleksi') }}" class="btn btn-dark mr-2">Kembali</a>
                                <x-primary-button class="ml-4" type="submit">Update Koleksi</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>