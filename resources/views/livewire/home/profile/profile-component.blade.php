<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item" aria-current="page">MY PROFILE</li>
                    <li class="breadcrumb-item active" aria-current="page">MY POSTS</li>
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
                                My Posts
                            </div>
                            <div class="card-body my-post-body">
                                <nav wire:ignore>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                      <button class="nav-link active" id="nav-seller-ad-tab" data-bs-toggle="tab" data-bs-target="#nav-seller-ad" type="button" role="tab" aria-controls="nav-home" aria-selected="true">MY SELLER ADVERTISEMENTS</button>
                                      <button class="nav-link" id="nav-buyer-ad-tab" data-bs-toggle="tab" data-bs-target="#nav-buyer-ad" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">MY BUYER ADVERTISEMENTS</button>
                                    </div>
                                  </nav>
                                  <div class="tab-content" id="nav-tabContent">
                                    <div wire:ignore.self class="tab-pane fade show active" id="nav-seller-ad" role="tabpanel" aria-labelledby="nav-seller-ad-tab">
                                        @livewire('home.profile.profile-my-seller-ad-component')
                                    </div>
                                    <div wire:ignore.self class="tab-pane fade" id="nav-buyer-ad" role="tabpanel" aria-labelledby="nav-buyer-ad-tab">
                                        @livewire('home.profile.profile-my-buyer-ad-component')
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3" wire:ignore>
                    <div class="profile-sidebar">
                        <div class="card text-center">
                            <div class="card-header">
                                User Profile
                            </div>
                            <div class="card-body pt-4">
                                <i class="fas fa-user-circle fa-6x"></i>
                                <h5 class="mt-2">{{ Auth::user()->name }}</h5>
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>My Posts</b></li>
                                <li class="list-group-item"><a href="{{ route('profile.change_password') }}">Change Password</a></li>
                            </ul>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a type="button" class="btn btn-danger m-2" title="Logout" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
