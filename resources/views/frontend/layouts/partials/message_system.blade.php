@if(session()->has("message"))
<div class="message-system col-md-4 offset-md-4 ">
	<div class="alert alert-{{ session('attr') }} alert-dismissible message-errors" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <p class="text-center">{!! session("message") !!}</p>
    </div>
</div>
@endif