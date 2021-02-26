<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Not Found</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
</head>
<body>
    
    <section style="margin-top: 150px;">
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h1 style="font-size: 150px;">404</h1>
                    <h2>Page Not Found</h2>
                    <p>We are sorry, the page you requested could not be found. Please go back to the homepage.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Visit Homepage</a>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
</body>
</html>