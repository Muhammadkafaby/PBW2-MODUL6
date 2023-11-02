<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('user.update', $user->username) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Username, Religion, Gender, Birthdate, Registered -->
                            <p>Username: {{ $user->username }}</p>
                            <p>Religion: {{ $user->religion }}</p>
                            <p>Gender: {{ $user->gender == 0 ? 'Perempuan' : 'Laki-laki' }}</p>
                            <p>Birthdate: {{ \Carbon\Carbon::parse($user->birthdate)->format('d F Y') }}</p>
                            <p>Registered: {{ $user->created_at }}</p>
                            <p>Diupdate: {{ $user->updated_at }}</p>

                            <!-- Full Name -->
                            <div class="mt-4">
                                <x-input-label for="fullname" :value="__('Full Name')" />
                                <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="$user->fullname" required autofocus />
                                <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
                            </div>

                            <!-- New Password (optional) -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('New Password (optional)')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Address -->
                            <div class="mt-4">
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$user->address" required />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>

                            <!-- Phone Number -->
                            <div class="mt-4">
                                <x-input-label for="phoneNumber" :value="__('Phone Number')" />
                                <x-text-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="$user->phoneNumber" required />
                                <x-input-error :messages="$errors->get('phoneNumber')" class="mt-2" />
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('user.daftarPengguna') }}" class="btn btn-dark">Back</a>
                                <x-primary-button class="ml-4" type="submit">Update User</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>