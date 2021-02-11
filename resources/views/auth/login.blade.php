{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item active" aria-current="page">SIGNIN</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="auth-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <h2>Sign In</h2>
            <p>Please fill in this form to signin into the account!</p>
            <hr>
            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="email-address"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" aria-describedby="email-address" name="email" :value="old('email')" required autofocus>
            </div>
            {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}

            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="password"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password" name="password" required autocomplete="current-password">
            </div>
            {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}

            <div class="form-check mt-4">
                <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                <label class="form-check-label" for="rememberMe">
                    Remember Me
                </label>
            </div>
            <div class="forgot-password">
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            </div>
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
            </div>
        </form>

        <div class="text-center">Don't have an account? <a href="{{ route('register') }}">Register here</a></div>
    </div>
</x-guest-layout>