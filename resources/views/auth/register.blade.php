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