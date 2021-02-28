<x-guest-layout>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">HOME</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FORGOT PASSWORD</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="auth-form">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <h2>Forgot Password</h2>
            <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            <hr>
            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text" id="email-address"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" aria-describedby="email-address" name="email" :value="old('email')" required autofocus>
            </div>
            {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary btn-lg">Email Password Reset Link</button>
            </div>
        </form>

        <div class="text-center">Go back to <a href="{{ route('login') }}">Signin page</a></div>
    </div>
</x-guest-layout>