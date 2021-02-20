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

                                <form wire:submit.prevent="updatePassword">
                                    <div class="input-group flex-nowrap mt-4">
                                        <span class="input-group-text" id="current_password"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Current Password" aria-label="current_password" wire:model.defer="state.current_password" autocomplete="current-password" >
                                    </div>
                                    {!! $errors->first('current_password', '<p class="help-block text-danger">:message</p>') !!}

                                    <div class="input-group flex-nowrap mt-4">
                                        <span class="input-group-text" id="password"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="New Password" aria-label="Password" wire:model.defer="state.password" autocomplete="new-password" >
                                    </div>
                                    {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}

                                    <div class="input-group flex-nowrap mt-4">
                                        <span class="input-group-text" id="password_confirmation"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Confirm Password" aria-label="password_confirmation" wire:model.defer="state.password_confirmation" autocomplete="new-password" >
                                    </div>
                                    {!! $errors->first('password_confirmation', '<p class="help-block text-danger">:message</p>') !!}

                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
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