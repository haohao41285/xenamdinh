<li>
    <div class="comment-main-level row">
          <!-- Avatar -->
      <div class="comment-avatar"><img src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg" alt=""></div>
          <!-- Contenedor del Comentario -->
      <div class="comment-box">
        <div class="comment-head row">
          <h6 class="comment-name by-author"><a href="http://creaticode.com/blog">{{$news->customer->customer_info->getPresenter()->fullName()}}</a></h6>
          <span class="time_post">{{ formatTimeDate($news->date) }}</span>
          <i class="fa fa-reply"></i>
        </div>
        @if($composer_customer &&$composer_customer->id == $news->customer->id)
            <a href="{{ route('frontend.news.delete',$news->id) }}" onclick="return confirm('Bạn muốn xóa tin này?')" title="Xóa tin"><span class="social_flickr" style="float: right;"></span></a>
            @endif
        <div class="comment-content">
              {{ $news->content }}
              @if( $news->file != "undefined")
              <img src="{{ $news->file }}" style="width:100%" alt="">
              @endif
        </div>
      </div>
    </div>
</li>