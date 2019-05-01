
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
<div class="content-form" style="margin-top:2em ">
@yield('content')
</div>
</body>
<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

@yield('script')
</html>