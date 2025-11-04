<x-guest-layout>
    <div x-data="{ showPassword: false }">

        {{-- 
          DIUBAH: 
          - 'text-1xl' -> 'text-xl' (perbaikan typo)
          - 'text-gray-90=0' -> 'text-gray-900' (perbaikan typo)
        --}}
        <h1 class="text-xl font-bold text-center text-gray-900 mb-6">
            Masuk Sebagai Admin
        </h1>

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf

            <div class="space-y-1">
                <label for="username" class="block text-sm font-medium text-gray-700">
                    Username
                </label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required autofocus
                    autocomplete="username" {{-- DIUBAH: 'py-3' -> 'py-2' agar lebih ramping --}}
                    class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                <x-input-error :messages="$errors->get('username')" class="mt-2" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4 space-y-1">
                <label for="password" class="block text-sm font-medium text-gray-700">
                    Kata Sandi
                </label>

                <div class="relative">
                    <input id="password" {{-- DIUBAH: 'py-3' -> 'py-2' agar lebih ramping --}}
                        class="block w-full px-4 py-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        :type="showPassword ? 'text' : 'password'" name="password" required
                        autocomplete="current-password" placeholder="Masukan Kata Sandi">

                    {{-- Tombol Show/Hide Password --}}
                    <button type="button" @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500">
                        <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274 4.057 5.064 7 9.542 7 1.356 0 2.644.246 3.832.686M17.5 17.5l-1.414-1.414M10 10.039C9.338 10.455 9 11.182 9 12c0 1.657 1.343 3 3 3 .818 0 1.545-.338 2.039-.882M17.5 17.5l-1.414-1.414m2.828-2.828l-1.06-1.06C18.607 11.536 19.5 10.31 20.5 9c-.998-1.31-2.02-2.322-3.086-3.086m-3.72-3.72L9.25 3.036C8.036 3.498 6.91 4.22 6 5.166M4.5 4.5L3 3m12 0l1.5 1.5M4.5 4.5l1.5 1.5">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex flex-col items-center justify-end mt-6 space-y-4">
                {{-- 
                  DIUBAH: 
                  - 'py-3' -> 'py-2'
                  - 'text-lg' -> 'text-base' (ukuran font normal)
                --}}
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Login now
                </button>
            </div>

            <p class="text-center text-sm text-gray-500 mt-4">
                Jika Anda Adalah Admin Tolong Masukan Username Dan Juga Kata Sandi
            </p>
        </form>
    </div>
</x-guest-layout>
