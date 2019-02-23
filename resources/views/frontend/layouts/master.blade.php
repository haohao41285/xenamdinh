<!DOCTYPE html>
<html lang="en">
  <head>
    <title>House To Home | Trang chủ</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    
    <link rel="manifest" href="{!!asset('html/assets/manifest.json')!!}">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
    <link href="{!!asset('html/assets/css/styles.css')!!}" rel="stylesheet">
    <link href="{!!asset('html/assets/css/checkdate.css')!!}"  rel="stylesheet">
    @yield('meta')
    <meta name="linkDatatable" content={{ route('frontend.address') }} />
    <meta name="linkAdd" content={{ route('frontend.ticket.add') }} />
    <meta name="token" content={{ csrf_token() }} />
    
    @yield('head')
  </head>
  <body>
    @include('frontend.layouts.partials.message_system')
    @yield('report')
    @include('frontend.layouts.partials.header')
    
    <main class="wrapper" >
      @yield('content')
      
    </main>
        <!--login form   -->
        @include('frontend.layouts.partials.modal_login')
        <!--signUpModal-->
        @include('frontend.layouts.partials.modal_sign_up')
        <!--digit code    -->
        @include('frontend.layouts.partials.modal_digit')
        <!--information-->
        @include('frontend.layouts.partials.modal_information')
      
    
    <!-- End Main Content-->
   @include('frontend.layouts.partials.footer')
    <!-- End Footer-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{!!asset('html/assets/js/library.js')!!}"></script>
    <script src="{!!asset('html/assets/js/main.js')!!}"></script>
    <script src="{{ asset('assets/js/function.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('assets/js/form.js') }}"></script>
    <script src="{{ asset('assets/ajax/address.js') }}"></script>
    @yield('script')

    <script>
        jQuery(document).ready(function($) {


            var is_modal = "";

            @if(count($errors) > 0)
            var $errors = {!! $errors !!}
            var is_modal = (errors.is_modal) ? errors.is_modal[0] : "" ;
            @endif

            if(is_modal == 'signUpModal')
            {
                displayModal('signUpModal');
            }

            @if(session()->has("error_signup"))
            displayModal('signUpModal');
            @elseif(session()->has("inforModal"))
            displayModal('inforModal');
            @elseif(session()->has("error_login"))
            displayModal('loginModal');
            @endif
        })
    </script>
  </body>
</html>