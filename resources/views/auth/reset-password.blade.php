<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

{{-- <x-guest-layout>
    <div>
        <div class="breadcrumb-bar">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">HOME</a></li>
                        <li class="breadcrumb-item" aria-current="page">MY PROFILE</li>
                        <li class="breadcrumb-item active" aria-current="page">RESET PASSWORD</li>
                    </ol>
                </nav>
            </div>
        </div>
    
        <div class="user-profile-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <div class="profile-mainbar">
                            <div class="card">
                                <div class="card-header text-center text-lg-start">
                                    Update Password
                                </div>
                                <div class="card-body reset-pass-body">
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf
    
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="email"><i class="fas fa-lock"></i></span>
                                            <input type="email" class="form-control" placeholder="Email" aria-label="email" name="email" :value="old('email', $request->email)" required autofocus>
                                        </div>
                                        {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
    
                                        <div class="input-group flex-nowrap mt-4">
                                            <span class="input-group-text" id="password"><i class="fas fa-lock"></i></span>
                                            <input type="password" class="form-control" placeholder="New Password" aria-label="Password" name="password" required autocomplete="new-password">
                                        </div>
                                        {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}
    
                                        <div class="input-group flex-nowrap mt-4">
                                            <span class="input-group-text" id="password_confirmation"><i class="fas fa-lock"></i></span>
                                            <input type="password" class="form-control" placeholder="Confirm Password" aria-label="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                        {!! $errors->first('password_confirmation', '<p class="help-block text-danger">:message</p>') !!}
    
                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn reset-btn">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="profile-sidebar d-flex justify-content-center flex-column">
                            <div class="card text-center">
                                <div class="card-header">
                                    User Profile
                                </div>
                                <div class="card-body">
                                    <i class="fas fa-user-circle fa-6x"></i>
                                    <h5 class="mt-2">Thishanth Thavarasa</h5>
                                    <p>thisha@gmail.com</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ route('profile') }}">My Posts</a></li>
                                    <li class="list-group-item"><b>Change Password</b></li>
                                </ul>
                                <button type="button" class="btn btn-danger m-2">Logout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout> --}}