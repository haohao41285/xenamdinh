@if(session()->has("error_signup") && isset($type) && $type == "modal_signup")
    <div class="alert alert-danger alert-dismissible message-errors" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        {{ session("error_signup") }}
    </div>
@endif
@if(session()->has("error_login") && isset($type) && $type == "modal_login")
    <div class="alert alert-danger alert-dismissible message-errors" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        {{ session("error_login") }}
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger message-errors">
        <ul style="padding-left: 0; list-style: none;">
            @foreach ($errors->toArray() as $key => $error)
                @if($key != 'is_modal')
                    @foreach($error as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                    
                @endif
            @endforeach
        </ul>
    </div>
@endif