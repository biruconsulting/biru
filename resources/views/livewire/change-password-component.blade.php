<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">HOME</a></li>
                    <li class="breadcrumb-item" aria-current="page">MY PROFILE</li>
                    <li class="breadcrumb-item active" aria-current="page">CHANGE PASSWORD</li>
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
                            <div class="card-body change-pass-body">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                        
                                    <h2>Change Password</h2>
                                    <p>Need to change your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                                    <hr>
                                    <div class="input-group flex-nowrap mt-4">
                                        <span class="input-group-text" id="email-address"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" aria-describedby="email-address" name="email" :value="old('email')" required autofocus>
                                    </div>
                                    {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
                        
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Email Password Reset Link</button>
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