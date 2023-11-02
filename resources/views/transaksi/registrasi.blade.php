<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Transaksi') }}
        </h2>
    </x-slot>
<!--  
| Nama  : Muhammad Kafaby
| NIM   : 6706220149
| Kelas : D3IF-4604 
-->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf

                        <!-- Peminjam -->
                        <div class="mt-4">
                            <x-input-label for="idPeminjam" :value="__('Pilih Peminjam')" />
                            <select id="idPeminjam" name="idPeminjam" class="block mt-1 w-full" required autofocus>
                                <option value="">Select one...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('idPeminjam') == $user->id ? 'selected' : '' }}>
                                    {{ $user->id }}. {{ $user->fullname }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('idPeminjam')" class="mt-2" />
                            <br>
                            <x-input-label for="transaksi1" :value="__('Pilih Koleksi 1')" />
                            <select id="transaksi1" name="transaksi1" class="block mt-1 w-full" required autofocus>
                                <option value="">Select one...</option>
                                @foreach($koleksi as $koleksii)
                                    <option value="{{ $koleksii->id }}" {{ old('transaksi1') == $koleksii->id ? 'selected' : '' }}>
                                    {{ $koleksii->id }}. {{ $koleksii->namaKoleksi }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('transaksi1')" class="mt-2" />
                            <br>
                            <x-input-label for="transaksi2" :value="__('Pilih Koleksi 2')" />
                            <select id="transaksi2" name="transaksi2" class="block mt-1 w-full" required autofocus>
                                <option value="">Select one...</option>
                                @foreach($koleksi as $koleksii)
                                    <option value="{{ $koleksii->id }}" {{ old('transaksi2') == $koleksii->id ? 'selected' : '' }}>
                                    {{ $koleksii->id }}. {{ $koleksii->namaKoleksi }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('transaksi2')" class="mt-2" />
                            <br>
                            <x-input-label for="transaksi3" :value="__('Pilih Koleksi 3')" />
                            <select id="transaksi3" name="transaksi3" class="block mt-1 w-full" required autofocus>
                                <option value="">Select one...</option>
                                @foreach($koleksi as $koleksii)
                                    <option value="{{ $koleksii->id }}" {{ old('transaksi3') == $koleksii->id ? 'selected' : '' }}>
                                    {{ $koleksii->id }}. {{ $koleksii->namaKoleksi }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('transaksi3')" class="mt-2" />
                        </div><br>

                        <!-- Tombol Submit -->
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('transaksi.daftarTransaksi') }}" class="btn btn-dark"">Back</a>
                            <x-primary-button class="ml-4" type="submit">Tambah Transaksi</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>