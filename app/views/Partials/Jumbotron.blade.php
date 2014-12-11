{{--slider begins--}}
@if ( ! $featured->isEmpty())
	<section class="panel panel-default" style=" background: url( {{{ asset('assets/images/' . $bg) }}} ) no-repeat;  background-size: 100%; width: 107.5%; margin-left: -4%;">
	    <div class="carousel slide auto panel-body" id="c-slide" style="background-color:rgba(0,0,5,.8);padding:70px 0 40px;">
	        <div class="carousel-inner">
	            <div class="item active" style="margin-left: 6.5%">
	              @foreach($featured->slice(0, 4) as $k => $v)
	                <div class="col-sm-12 col-md-2 slider-img">
	                    <p class="text-center">
	                        <a href="{{ Helpers::url($v->title, $v->id, $v->type) }}">
	                            <img src="{{$v->poster}}" class="img-responsive trailer-trigger" alt="{{{ $v->title . 'Poster' }}}" data-trailer="{{{ $v->trailer }}}">
	                            <div class="overlay hidden-xs trailler-trigger pull-right">
                                    <i class="icon-control-play i-2x"></i>
                                </div>
                            </a>
	                    </p>

	                    <small class="text-muted"><a href="{{ Helpers::url($v->title, $v->id, $v->type) }}" class="text-white">{{{ $v->title }}}</a></small>
	                </div>
	              @endforeach
	          	</div>

	          	<div class="item" style="margin-left: 6.5%">
	              @foreach($featured->slice(4, 8) as $k => $v)
	                <div class="col-sm-12 col-md-2 slider-img">
	                    <p class="text-center">
	                        <a href="{{ Helpers::url($v->title, $v->id, $v->type) }}" class="text-white">
	                            <img src="{{$v->poster}}" class="img-responsive trailer-trigger" data-trailer="{{{ $v->trailer }}}" alt="{{{ $v->title . 'Poster' }}}">
	                            <div class="overlay hidden-xs trailler-trigger pull-right">
                                    <i class="fa fa-play"></i>
                                </div>
	                        </a>
	                    </p>
	                    <small class="text-muted">
	                        <a href="{{ Helpers::url($v->title, $v->id, $v->type) }}" class="text-white">{{{ $v->title }}}</a>
	                    </small>
	                </div>
	              @endforeach
	          	</div>
	        </div>
	        <a class="left carousel-control" href="#c-slide" data-slide="prev">
	          <i class="fa fa-angle-left"></i>
	        </a>
	        <a class="right carousel-control" href="#c-slide" data-slide="next">
	          <i class="fa fa-angle-right"></i>
	        </a>
	    </div>
	</section>
@endif