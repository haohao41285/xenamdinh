<!DOCTYPE HTML>
<html>
<head>
<title>Trendy Blog a Blogging Category Bootstrap Responsive Website Template  | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Trendy Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('html/assets/css/checkdate.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('html/assets/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
</head>

<body>

@include('frontend.layouts.partials.login')
@include('frontend.layouts.partials.register')
@include('frontend.layouts.partials.header')
@include('frontend.layouts.partials.search')
{{-- @include('frontend.layouts.partials.information') --}}
@include('frontend.layouts.partials.test-login')

  
@yield('content')

@include('frontend.layouts.partials.footer')
<!-- for bootstrap working -->
    <script src="{{asset('/js/bootstrap.js')}}"></script>
<!-- //for bootstrap working -->
@yield('script')
<script src="{{asset('assets/js/function.js')}}" type="text/javascript" ></script>
<script src="{{ asset('assets/ajax/address.js') }}"></script>
<script>
	$(document).ready(function() {

		$('.eye-password').on('click',function(){

			$(this).toggleClass('glyphicon-eye-open glyphicon-eye-close');

			var type = $(this).siblings('input').attr('type');

			if(type == 'password'){

				$(this).siblings('input').attr('type','text');
			}
			else{
				$(this).siblings('input').attr('type','password');
			}
		})
	});
</script>
</body>
</html>