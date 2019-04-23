
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link rel="icon" href="Favicon.png">
    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <title>Xe Nam Định</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="content-form">
@yield('content')
</div>
</body>
<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

@yield('script')
</html>