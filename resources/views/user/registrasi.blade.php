<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah User') }}
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
                    <!-- Formulir Penambahan Koleksi -->
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <!-- Username -->
                    <div>
                        <x-input-label for="username" :value="__('Username')" />
                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    
                    <!-- Full Name -->
                    <div>
                        <x-input-label for="fullname" :value="__('Full Name')" />
                        <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus autocomplete="fullname" />
                        <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Address -->
                    <div class="mt-4">
                        <x-input-label for="address" :value="__('Address')" />
                        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <!-- Birthdate -->
                    <div class="mt-4">
                        <x-input-label for="birthdate" :value="__('Birthdate')" />
                        <x-text-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate" :value="old('birthdate')" required autofocus autocomplete="birthdate" />
                        <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
                    </div>

                    <!-- Phone Number -->
                    <div class="mt-4">
                        <x-input-label for="phonenumber" :value="__('Phone Number')" />
                        <x-text-input id="phonenumber" class="block mt-1 w-full" type="number" name="phonenumber" :value="old('phonenumber')" required autofocus autocomplete="phonenumber" />
                        <x-input-error :messages="$errors->get('phonenumber')" class="mt-2" />
                    </div>

                    <!-- Religion -->
                    <div class="mt-4">
                        <x-input-label for="religion" :value="__('Religion')" />
                        <select id="religion" name="religion" class="block mt-1 w-full" required autofocus>
                            <option value="{{ old('religion') == '' ? '' : old('religion') }}" {{ old('religion') == '' ? 'selected' : '' }}>{{ old('religion') == '' ? 'Select one...' : old('religion').' (Selected)' }}</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Khonghucu">Khonghucu</option>
                        </select>
                        <x-input-error :messages="$errors->get('religion')" class="mt-2" />
                    </div>

                    <!-- Gender -->
                    <div class="mt-4">
                        <x-input-label for="gender" :value="__('Gender')" />
                        <select id="gender" name="gender" class="block mt-1 w-full" required autofocus>
                            <option value="{{ old('gender') == '' ? '' : old('gender') }}" {{ old('gender') == '' ? 'selected' : '' }}>{{ old('gender') == '' ? 'Select one...' : (old('gender') == 1 ? 'Laki-Laki (Selected)' : 'Perempuan (Selected)') }}</option>
                            <option value="1">Laki-Laki</option>
                            <option value="0">Perempuan</option>
                        </select>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>

                        <!-- Tombol Submit -->
                        <div class="flex items-center justify-end mt-4">
                            <a href="#" class="btn btn-dark" onclick="goBack()">Back</a>
                            <x-primary-button class="ml-4" type="submit">Tambah User</x-primary-button>
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