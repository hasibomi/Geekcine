<aside class="aside-lg bg-light lter b-r">
  <section class="vbox">
    <section class="scrollable">

      <section class="panel panel-default">
        <div class="panel-body" style="background: url({{ $user->background ? asset($user->background) : asset('assets/images/ronin.jpg') }}) no-repeat; background-size: cover" id="img-bg">
          <div class="clearfix text-center m-t" style="margin-bottom: 10%;">
            <div class="inline" style="">
              <div class="easypiechart" data-percent="75" data-line-width="5" data-bar-color="#4cc0c1" data-track-Color="#f5f5f5" data-scale-Color="false" data-size="134" data-line-cap='butt' data-animate="1000">
                <div class="thumb-lg">
                  <img width="100px" height="100px" class="img-thumbnail" src="{{ $user->avatar ? asset($user->avatar) : asset('assets/images/no_user_icon_big.jpg')}}" alt="" style="margin-top: 7%;">
                </div>
              </div>
              <div class="h4 m-t m-b-xs" style="color: #fff;">{{ $user->first_name && $user->last_name ? $user->first_name . ' ' . $user->last_name : $user->username }}</div>
              <small class="text-muted m-b" style="color: #fff;">
                  <i class="fa fa-map-marker"></i> {{ $user->address }} - {{ date('Y') - $user->year }} years old
              </small>
            </div>
          </div>
        </div>
      </section>
      <footer class="panel-footer bg-info text-center" style="width: 90%; margin-top: -20%; margin-left: auto; margin-right: auto;">
        <div class="row pull-out">
          <div class="col-xs-4">
            <div class="padder-v">
              <span class="m-b-xs h3 block text-white">{{ $friendsCount }}</span>
              <small class="text-muted">{{ trans('main.friends') }}</small>
            </div>
          </div>
          <div class="col-xs-4 dk">
            <div class="padder-v">
              <span class="m-b-xs h3 block text-white">{{ $user->reputation }}</span>
              <small class="text-muted">{{ trans('main.reputation points') }}</small>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="padder-v">
              <span class="m-b-xs h3 block text-white">{{ $linksCount }}</span>
              <small class="text-muted">{{ trans('main.links') }}</small>
            </div>
          </div>
        </div>
      </footer>
      	<br>
        <div class="btn-group btn-group-justified m-b">
          @if($friendship == NULL)
          	@if(!Helpers::isUser($user->username))
              <a href='{{url("/users/friends/send/$user->id")}}' class="btn btn-success btn-rounded">
                  <span class="text">
                    <i class="fa fa-user"></i> Add friend
                  </span>
              </a>
            @endif
          @else
          	@if($friendship->status == 0)
            	@if($friendship->first_user != $user->id)
              	<a class="btn btn-success btn-rounded">
                  <span class="text">
                    <i class="fa fa-user"></i> Request sent
                  </span>
                </a>
              @else
              	<a href='{{url("/users/friends/accept/$user->id")}}' class="btn btn-success">Accept</a>
              	<a href='{{url("/users/friends/deny/$user->id")}}' class="btn btn-danger">Deny</a>
              @endif
                  
            @elseif($friendship->status > 1)
            	<a href='{{url("/users/friends/send/$user->id")}}' class="btn btn-success btn-rounded">
                    <span class="text">
                      <i class="fa fa-user"></i> Add friend
                    </span>
                </a>
            @endif
          @endif
          <a href='#' class="btn btn-info btn-rounded">
                <span class="text">
                  <i class="icon icon-envelope"></i> &nbsp;Send message
                </span>
           </a>
        </div>
        <div style="margin-left: 5%;">
          <small class="h3 font-thin">About me</small>

          <br><br>

          <div class="row">
            <div class="col-md-6">{{ trans('main.member since') }}</div>
            <div class="col-md-6">{{ $user->created_at->toFormattedDateString() }}</div>
          </div>

          <div class="row">
            <div class="col-md-6">{{ trans('main.reviews written') }}</div>
            <div class="col-md-6">{{ $revCount }}</div>
          </div>

          <div class="row">
            <div class="col-md-6">{{ trans('main.titles favorited') }}</div>
            <div class="col-md-6">{{ $favCount }}</div>
          </div>

          <div class="row">
            <div class="col-md-6">{{ trans('main.titles watchlisted') }}</div>
            <div class="col-md-6">{{ $watCount }}</div>
          </div>

          <br>

          <small class="h3 font-thin">Info</small>

          <div class="row">
          	<div class="col-md-12">
          		@if (strlen($user->information) > 100)
          			<p id="less">{{ substr($user->information, 0, 100) }}</p>
          			<p>
          				<a href="javascript:;" id="moreInfo" style="color: blue;">More</a>
          			</p>
          			<p id="more" style="display: none;">{{ $user->information }}</p>
          			<p><a href="javascript:;" id="lessInfo" style="display: none;color: blue;">Less</a></p>
          		@elseif (strlen($user->information) <= 100)
          			{{ $user->information }}
          		@endif
          	</div>
          </div>
        </div>
    </section>
  </section>
</aside>