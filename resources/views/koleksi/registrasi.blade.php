<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Koleksi') }}
        </h2>
    </x-slot>
<!-- 
Nama    : Muhammad Kafaby
NIM     : 6706220149
Kelas   : D3IF-4604 
-->
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                    <form action="{{ route('koleksi.store') }}" method="POST">
                        @csrf
                        <!-- Nama Koleksi -->
                        <div class="mb-4">
                            <label for="namaKoleksi" class="block text-sm font-medium text-gray-600">Nama Koleksi</label>
                            <input type="text" name="namaKoleksi" id="namaKoleksi" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <!-- Jenis Koleksi -->
                        <div class="mt-4">
                            <x-input-label for="jenisKoleksi" :value="__('Jenis Koleksi')" />
                            <select id="jenisKoleksi" name="jenisKoleksi" class="block mt-1 w-full" required autofocus>
                                <option value="{{ old('jenisKoleksi') == '' ? '' : old('jenisKoleksi') }}" {{ old('jenisKoleksi') == '' ? 'selected' : '' }}>{{ old('jenisKoleksi') == '' ? 'Select one...' :  (old('jenisKoleksi') == 1 ? 'Buku (Selected)' : (old('jenisKoleksi') == 2 ? 'Majalah (Selected)' : 'Cakram Digital (Selected)')) }}</option>
                                <option value="1">Buku</option>
                                <option value="2">Majalah</option>
                                <option value="3">Cakram Digital</option>
                            </select>
                            <x-input-error :messages="$errors->get('jenisKoleksi')" class="mt-2" />
                        </div><br>

                        <!-- Jumlah Koleksi -->
                        <div class="mb-4">
                            <label for="jumlahKoleksi" class="block text-sm font-medium text-gray-600">Jumlah Koleksi</label>
                            <input type="number" name="jumlahKoleksi" id="jumlahKoleksi" class="mt-1 p-2 border rounded-md w-full" required>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="flex items-center justify-end mt-4">
                            <a href="#" class="btn btn-dark" onclick="goBack()">Back</a>
                            <x-primary-button class="ml-4" type="submit">Tambah Koleksi</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
</x-app-layout>