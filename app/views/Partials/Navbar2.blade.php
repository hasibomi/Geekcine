<nav style="border-color:{{$color}}" class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">

		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
    	</button>

    	@if (isset($options->options['logo']) && Str::length($options->options['logo']) > 4)
    		<a style="padding:0px 0px 0px 15px" class="navbar-brand" href="{{ route('home') }}">
    			<img class="brand-logo" src="{{ asset('assets/images/' . $options->options['logo']) }}">
    		</a>	
    	@else
			<a style="color:{{ $color }}!important" class="navbar-brand" href="{{ route('home') }}">{{ trans('main.brand') }}</a>
    	@endif
    	
      </div>

	<div class="collapse navbar-collapse navbar-ex1-collapse">

		<ul class="nav navbar-nav">
			<li><a href="{{ route('home') }}">{{ trans('main.home') }}</a></li>
			<li><a href="{{ url(Str::slug(trans('main.movies'))) }}">{{ trans('main.movies-menu') }}</a></li>
			<li><a href="{{ url(Str::slug(trans('main.series'))) }}">{{ trans('main.series-menu') }}</a></li>
			<li><a href="{{ url(Str::slug(trans('main.news'))) }}">{{ trans('main.news-menu') }}</a></li>
			<li><a href="{{ url(Str::slug(trans('main.people'))) }}">{{ trans('main.people-menu') }}</a></li>
			<!--<li><a href="{{ url(Str::slug(trans('forum'))) }}">{{ trans('main.forum-menu') }}</a></li>-->

			@if(Helpers::hasAccess('super'))
				@if (isset($options->options['logo']) && Str::length($options->options['logo']) > 4)
	        		<li><a href="{{ url('dashboard') }}">{{ trans('dash.dash') }}</a></li>
	        	@else
	        		<li><a href="{{ url('dashboard') }}">{{ trans('main.dashboard') }}</a></li>
	        	@endif
			@endif
	    </ul>

	    @if( ! Sentry::check())

			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{ url(Str::slug(trans('main.register'))) }}">{{ trans('main.register-menu') }}</a></li>
				<li><a href="{{ url(Str::slug(trans('main.login'))) }} ">{{ trans('main.login-menu') }}</a></li>
			</ul>

	    @else

			<ul class="nav navbar-nav navbar-right logged-in-box hidden-xs">
				<li>
					<a class="no-pad" href="{{ Helpers::profileUrl() }}"><img class="small-avatar" src="{{ Helpers::smallAvatar() }}" alt="" class="img-responsive"></a>
				</li>
				<li><a class="logged-box-text" href="{{ Helpers::profileUrl() }}">{{ trans('main.welcome') }}, <br> {{{ Helpers::loggedInUser()->first_name ? Helpers::loggedInUser()->first_name : Helpers::loggedInUser()->username }}}</a></li>
				<li><a class="logout hidden-md" href="{{ action('SessionController@logOut') }}"><i class="fa fa-power-off"></i> </a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right visible-xs logged-in-box">
				<li><a href="{{ Helpers::profileUrl() }}">{{ trans('users.profile') }}</a></li>
			</ul>

	    @endif

		@unless( ! Request::segments(2))

			{{ Form::open(array('url' => Str::slug(trans('main.search')), 'class' => 'navbar-form navbar-right nav-search hidden-sm col-sm-3 col-lg-4 col-xs-12', 'method' => 'get')) }}

				<div class="input-group">
					{{ Form::text('q', null, array('id' => 'auto-complete-small', 'class' => 'form-control search-bar', 'placeholder' => trans('main.nav search place'), 'data-url' => url('typeahead'))) }}
					<span class="input-group-btn">
						<button class="btn btn-default search-button" type="submit"><i class="fa fa-search"></i></span></button>
					</span>
				</div>
			
			{{ Form::close() }}

		@endunless

    </div>
</nav>

@if(Sentry::check())
<div class="fix_me">
	<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#friend-list-modal">
	<i class="fa fa-user"></i> 
	@if($requests = Helpers::getUserFriendRequests())
      <span class="badge" style="position:absolute; top:-5px; left:-12px; ">
      {{count($requests)}}
      </span>
    @endif
    </button>
</div>

<style type="text/css">
	.fix_me {
        position: fixed;
        top: 50%;
        right: 0;
        z-index: 50;
	}
</style>

<!-- Modal -->
<div class="modal fade" id="friend-list-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="modal-close" aria-hidden="true" data-dismiss="modal" type="button"></button>
                    <h4 class="modal-title">
                        <strong>FRIEND REQUEST</strong>                        
                    </h4>
                </div>
                <div class="modal-body row">
                    @if(isset($requests) && !empty($requests))
                    	<div class="alert" style="display: none;"></div>
                    	@foreach($requests as $friend)
                        <?php $friendPage = url('/users'). '/'. $friend->id. '-'. $friend->username; ?>
                        <div class="row" id="frnd{{$friend->id}}">
                        <div class="col-xs-8">
                        	<div class="panel panel-default">
							  <div class="panel-body">
							    @if(!empty($friend->avatar))
	                                <img src="{{url($friend->avatar)}}" align="left" style="padding-right: 5px;" />
	                            @else
	                                <img src="{{url('/assets/images/no_user_icon_big.jpg')}}" />
	                            @endif
	                            <h3>
	                                <a href="{{$friendPage}}">
	                                    {{$friend->first_name}} {{$friend->last_name}}
	                                </a>
	                            </h3>
	                            <h3 class="grey-out">
	                                {{ $friend->reputation }} points
	                            </h3>

							  </div>
							</div>
                        </div>
                        <div class="col-xs-4 frnd-options" style="padding-top: 49px;">
          		            
          		            <a href="javascript:void(0);" rel-url='{{url("/users/friends/accept/$friend->id")}}'  class="btn btn-success">Accept</a>
                    		<a href="javascript:void(0);" rel-url='{{url("/users/friends/deny/$friend->id")}}' class="btn btn-danger">Deny</a>
                            
                        </div>
                        </div>
                        @endforeach
                    @else
                        <div class="alert alert-warning">Sorry, No Friend Requests!</div>
                    @endif    
                </div>
            </div>
        </div>
    </div>

@section('scripts')    
<script type="text/javascript">
(function($){

$('.frnd-options a').click(function(){
		// var $this = $(this);
		var url = $(this).attr('rel-url');

		$.get(url,null,function(data){
			if(data.status==1)
			{
				$('#frnd'+data.id).hide();
				$('#friend-list-modal .alert').removeClass('alert-danger').addClass('alert-success').html(data.msg).show();
			}
			else
			{
				$('#frnd'+data.id).hide();
				$('#friend-list-modal .alert').removeClass('alert-success').addClass('alert-danger').html(data.msg).show();
			}
		})

		
	})

})(jQuery);
	
</script>    
@stop
@endif