<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">HOME</a></li>
                    <li class="breadcrumb-item active" aria-current="page">CONTACT US</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="contact-us-form">
        <form wire:submit.prevent="submitContact">
            <h2>Contact US</h2>
            <p>Leave a message for us</p>
            <hr>
            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Username" wire:model.defer="username" required>
            </div>
            @error('username') <span class="error text-danger">{{ $message }}</span> @enderror

            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="Email Address" wire:model.defer="email" required>
            </div>
            @error('email') <span class="error text-danger">{{ $message }}</span> @enderror

            <div class="input-group flex-nowrap mt-4">
                <span class="input-group-text"><i class="fas fa-comment"></i></span>
                <textarea class="form-control" placeholder="Message" rows="3" wire:model.defer="message" required></textarea>
            </div>
            @error('message') <span class="error text-danger">{{ $message }}</span> @enderror

            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
    </div>
</div>