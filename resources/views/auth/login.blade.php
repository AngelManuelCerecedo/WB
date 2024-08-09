<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link rel="icon" href="{{ asset('Imagenes/WB.ico') }}">
<div class="bg-white-200 flex justify-center items-center h-screen">
    <!-- Left: Image -->
    <div class="w-.5 h-screen hidden lg:block">
        <img src="{{ asset('Imagenes/fondo.png') }}" alt="Placeholder Image"
            class="object-cover w-full h-full">
    </div>
    <!-- Right: Login Form -->
    <div class="lg:p-12 md:p-52 sm:20 w-full lg:w-1/4">
        <img src="{{ asset('Imagenes/WB.jpg') }}">
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
