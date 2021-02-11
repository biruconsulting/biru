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
    <form action="/examples/actions/confirmation.php" method="post">
        <h2>Contact US</h2>
        <p>Leave a message for us</p>
        <hr>
        <div class="input-group flex-nowrap mt-4">
            <span class="input-group-text" id="username"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="username">
        </div>
        <div class="input-group flex-nowrap mt-4">
            <span class="input-group-text" id="email-address"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" aria-describedby="email-address">
        </div>
        <div class="input-group flex-nowrap mt-4">
            <span class="input-group-text" id="message"><i class="fas fa-comment"></i></span>
            <textarea class="form-control" placeholder="Message" rows="3" aria-label="message"></textarea>
        </div>
        <div class="form-group mt-5">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>
</div>