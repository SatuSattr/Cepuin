<x-guest-layout>
<div class="min-h-screen flex items-center justify-center bg-[#800101]">
        <!-- KIRI (Teks) -->
        <div class="hidden md:flex flex-col text-white max-w-md space-y-4 md:mr-12">
            <div class="flex items-center space-x-2 mb-2">
                <div class="bg-white/20 p-2 rounded-xl">
                    <i class="fa-solid fa-school-flag text-white text-xl"></i>
                </div>
                <h1 class="text-2xl font-semibold">Cepuin</h1>
            </div>

            <h2 class="text-5xl font-bold leading-tight">Hello, There!</h2>
            <p class="text-lg font-medium">Bersama Siswa dan Guru BK!</p>
            <p class="text-sm text-gray-200">
                Platform yang memudahkan siswa untuk melapor dengan aman,
                serta membantu guru BK mengelola dan menindaklanjuti setiap laporan dengan cepat dan efisien.
            </p>

        </div>

        <!-- KANAN (Card Form Login) -->
        <div class="bg-white border border-gray-200 rounded-4xl shadow-lg p-10 w-full max-w-sm">
            <!-- <h2 class="text-3xl font-semibold text-center text-[#800101] mb-2">Log In</h2> -->
            <h2 class="text-3xl font-bold leading-tight text-center text-[#800101] mb-2">Log In</h2>
            <p class="text-center text-gray-500 mb-6">
                Masuk untuk melanjutkan.
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-gray-300 rounded-xl focus:ring-[#800101] focus:border-[#800101]"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-gray-300 rounded-xl focus:ring-[#800101] focus:border-[#800101]"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-3" />
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between text-sm mt-2">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-[#800101] shadow-sm focus:ring-[#800101]"
                            name="remember">
                        <span class="ms-2 text-gray-600">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-[#800101] hover:underline">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                <!-- Tombol -->
                <div class="mt-4">
                    <button type="submit"
                        class="w-full bg-[#800101] hover:bg-[#5d0000] text-white font-semibold py-2 rounded-full shadow-md transition">
                        {{ __('Login') }}
                    </button>
                </div>

                <p class="text-center text-sm text-gray-500 mt-6">
                    Don’t have an account? 
                    <a href="{{ route('register') }}" class="text-[#800101] font-medium hover:underline">Register</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>