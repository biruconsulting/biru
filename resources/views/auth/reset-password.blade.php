<x-guest-layout>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item active" aria-current="page">RESET PASSWORD</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="auth-form">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="email-address"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" name="email" :value="old('email', $request->email)" required autofocus>
            </div>
            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="password"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" aria-label="password" name="password" required autocomplete="new-password">
            </div>
            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="confirm-password"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Confirm Password" aria-label="confirm-password" name="password_confirmation" required autocomplete="new-password">
            </div>
            
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Reset Password</button>
            </div>
        </form>

    </div>
</x-guest-layout>