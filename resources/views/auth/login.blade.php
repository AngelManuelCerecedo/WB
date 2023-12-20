<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<div class="bg-gray-100 flex justify-center items-center h-screen">
    <!-- Left: Image -->
    <div class="w-.5 h-screen hidden lg:block">
        <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/ImgDH/main/fondo.jpg" alt="Placeholder Image"
            class="object-cover w-full h-full">
    </div>
    <!-- Right: Login Form -->
    <div class="lg:p-12 md:p-52 sm:20 p-8 w-full lg:w-1/2">
        <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/ImgDH/main/LOGO-DH.png" alt="Placeholder Image"
            class="">
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Username Input -->
            <div class="mb-4">
                <x-jet-label for="email" value="{{ __('Usuario') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                    required autofocus />
            </div>
            <!-- Password Input -->
            <div class="mb-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>
            <!-- Remember Me Checkbox -->
            <!-- Forgot Password Link -->
            <!-- Login Button -->
            <div class="">
                <x-jet-button class="text-lg">
                    {{ __('Iniciar Sesión') }}
                </x-jet-button>
            </div>
        </form>
        <!-- Sign up  Link -->
    </div>
</div>
