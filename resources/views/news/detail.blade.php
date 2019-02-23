@extends('frontend.layouts.master')
@section('title')
@endsection
@section('head')
<link rel="stylesheet"  href="https://static.mediacdn.vn/autopro/web_css/core.detail.min.17122018v1.css">
<link rel="stylesheet"  href="https://adminplayer.sohatv.vn/resource/AutoproPlayer/core/AutoproPlayer.core.min.css">
<script async="" src="https://static.mediacdn.vn/autopro/web_js/core.detail.min.14112018v1.js" type="text/javascript"></script>
<script src="https://adminplayer.sohatv.vn/resource/init-script/playerInitScript.js" type="text/javascript"></script>
@endsection

@section('script')
<script>
	var html='';
	html +=`
	<div class="relatednews">
    <ul>

@foreach($related_news as $related_new)

        <li>
            <h3 class="relatedtitle"> 
                <a data-id="20181223112604979" data-linktype="newsdetail" title="Pha sang đường của cụ bà khiến mạng xã hội rần rần chia sẻ trong sáng Chủ nhật" href="{{ route('frontend.detail.news',removeFirstString($related_new->detail_path)) }}">{{ $related_new->title }}</a>
            </h3>
            <div class="clearfix"></div>
        </li>
        
@endforeach

    </ul>
</div>
	`;
	$('.relatednews').html(html);
	$('.zonename').remove();
	$('.link-content-footer').remove();
	$('.like-share-bottom').remove();
	$('.fb-like').remove();
    $('.kbwcs-fb').remove();
	$('.listtags').remove();
</script>
@endsection

@section('content')
<div class="col-lg-10 col-md-10 offset-md-1">
{!! $content !!}
</div>
@endsection