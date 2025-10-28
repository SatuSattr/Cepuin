<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#800101]">
        <!-- KIRI (Teks) -->
        <div class="hidden md:flex flex-col text-white max-w-md space-y-4 md:mr-12 mb-35">
            <div class="flex items-center space-x-2 mb-2">
                <div class="bg-white/20 p-2 rounded-xl">
                    <i class="fa-solid fa-school-flag text-white text-xl"></i>
                </div>
                <h1 class="text-2xl font-semibold">Cepuin</h1>
            </div>

            <h2 class="text-5xl font-bold leading-tight">Hello, There!</h2>
            <p class="text-lg font-medium">Bersama Siswa dan Guru BK!</p>
            <p class="text-sm text-gray-200">
                Bergabunglah untuk membantu menciptakan lingkungan sekolah yang aman, nyaman, dan peduli satu sama lain
                melalui sistem pelaporan yang mudah, cepat, dan terpercaya.
            </p>

        </div>

        <!-- KANAN (Card Form Register) -->
        <div class="bg-white border border-gray-200 rounded-4xl shadow-lg p-10 w-full max-w-sm mt-20 mb-20">
            <h2 class="text-3xl font-bold leading-tight text-center text-[#800101] mb-2">Register</h2>
            <p class="text-center text-gray-500 mb-6">Please enter your details.</p>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name"
                        class="block mt-1 w-full border-gray-300 rounded-xl focus:ring-[#800101] focus:border-[#800101]"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"
                        class="block mt-1 w-full border-gray-300 rounded-xl focus:ring-[#800101] focus:border-[#800101]"
                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password"
                        class="block mt-1 w-full border-gray-300 rounded-xl focus:ring-[#800101] focus:border-[#800101]"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-3" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation"
                        class="block mt-1 w-full border-gray-300 rounded-xl focus:ring-[#800101] focus:border-[#800101]"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Tombol -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-full bg-[#800101] hover:bg-[#5d0000] text-white font-semibold py-2 rounded-full shadow-md transition">
                        {{ __('Register') }}
                    </button>
                </div>

                <p class="text-center text-sm text-gray-500 mt-6">
                    Already registered?
                    <a href="{{ route('login') }}" class="text-[#800101] font-medium hover:underline">Log in</a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>