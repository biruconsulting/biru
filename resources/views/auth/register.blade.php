{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
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
                    <li class="breadcrumb-item active" aria-current="page">REGISTER</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="auth-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <h2>Register</h2>
            <p>Please fill in this form to create an account!</p>
            <hr>
            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="username"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="username" name="name" :value="old('name')" required autofocus autocomplete="name">
            </div>
            {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}

            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="email-address"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" aria-describedby="email-address" name="email" :value="old('email')" required>
            </div>
            {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}

            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="password"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password" name="password" required autocomplete="new-password">
            </div>
            {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}

            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="conform-password"><i class="fas fa-lock"></i><i class="fas fa-check"></i></span>
                <input type="password" class="form-control" placeholder="Conform Password" aria-label="Conform Password" aria-describedby="conform-password" name="password_confirmation" required autocomplete="new-password">
            </div>
            {!! $errors->first('password_confirmation', '<p class="help-block text-danger">:message</p>') !!}

            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary btn-lg">Register</button>
            </div>
        </form>

        <div class="text-center">Already have an account? <a href="{{ route('login') }}">Login here</a></div>
    </div>
</x-guest-layout>