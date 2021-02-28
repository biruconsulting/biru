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