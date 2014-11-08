@extends('Main.Boilerplate')

@section('title')

	<title>{{{ $user->username }}} - {{ trans('users.profile') }}</title>

@stop

@section('bodytag')
	<body>
@stop

@section('content')
        
<section class="vbox">
  <section class="scrollable padder-lg" id="bjax-target">
    <section class="hbox stretch">
    	<aside class="aside-lg bg-light lter b-r">
          <section class="vbox">
            <section class="scrollable">
              <div class="wrapper">
                <div class="text-center m-b m-t">
                  <section style="background-image: url({{ $user->background ? asset($user->background) : asset('assets/images/ronin.jpg') }})" id="img-bg">
                        <div id="img-contents">
                            <img width="100px" height="100px" class="img-thumbnail" src="{{ $user->avatar ? asset($user->avatar) : asset('assets/images/no_user_icon_big.jpg')}}" alt="" style="margin-top: 7%;">
                            <h1>{{ $user->first_name && $user->last_name ? $user->first_name . ' ' . $user->last_name : $user->username }}</h1>
                            
                        </div>
                    </section>        
                </div>
                <div class="panel wrapper">
                  <div class="row text-center">
                    <div class="col-xs-6">
                      <a href="#">
                        <span class="m-b-xs h4 block">245</span>
                        <small class="text-muted">Followers</small>
                      </a>
                    </div>
                    <div class="col-xs-6">
                      <a href="#">
                        <span class="m-b-xs h4 block">55</span>
                        <small class="text-muted">Following</small>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="btn-group btn-group-justified m-b">
                    @if($friendship == NULL)
                    	@if(!Helpers::isUser($user->username))
                            <a href='{{url("/users/friends/send/$user->id")}}' class="btn btn-success btn-rounded">
                                <span class="text-active">
                                  <i class="fa fa-user"></i> Add friend
                                </span>
                            </a>
                        @endif
                    @else
                    	@if($friendship->status == 0)
                        	@if($friendship->first_user != $user->id)
                            	<a class="btn btn-success btn-rounded">
                                    <span class="text-active">
                                      <i class="fa fa-user"></i> Request sent
                                    </span>
                                </a>
                            @else
                            	<a href='{{url("/users/friends/accept/$user->id")}}' class="btn btn-primary">Accept</a>
                            	<a href='{{url("/users/friends/deny/$user->id")}}' class="btn btn-primary">Deny</a>
                            @endif
                            
                        @elseif($friendship->status > 1)
                        	<a href='{{url("/users/friends/send/$user->id")}}' class="btn btn-success btn-rounded">
                                <span class="text-active">
                                  <i class="fa fa-user"></i> Add friend
                                </span>
                            </a>
                        @endif
                    @endif
                </div>
                <div>
                  <small class="text-uc text-xs text-muted">about me</small>
                  <p>Artist</p>
                  <small class="text-uc text-xs text-muted">info</small>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat.</p>
                  <div class="line"></div>
                  <small class="text-uc text-xs text-muted">connection</small>
                  <p class="m-t-sm">
                    <a href="#" class="btn btn-rounded btn-twitter btn-icon"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="btn btn-rounded btn-facebook btn-icon"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="btn btn-rounded btn-gplus btn-icon"><i class="fa fa-google-plus"></i></a>
                  </p>
                </div>
              </div>
            </section>
          </section>
        </aside>
        <aside class="bg-white">
          <section class="vbox">
            
              @include ('Users.Partials.Header')
            
            <section class="scrollable">
              <div class="tab-content">
                <div class="tab-pane active" id="activity">
                
                	<br>

                      @foreach (Request::segment(3) == 'favorites' ? $favorite : $watchlist as $w)
		
        					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2" data-filter-class='{{ Helpers::genreFilter($w['genre']) }}' data-popularity="{{{ $w['imdb_votes_num'] }}}" data-name="{{{ $w['title'] }}}" data-release="{{{ $w['year'] }}}">
                                <div class="item">
                                    <div class="pos-rlt">
                                        <a href="{{Helpers::url($w['title'], $w['id'], $w['type'])}}">
                                            <img class ="img-responsive" src="{{{ $w['poster'] ? asset($w['poster']) : asset('assets/images/imdbnoimage.jpg') }}}" alt="{{{ $w['title'] }}}">
                                        </a> <!-- Image -->
                                    </div> <!-- /.pos-rlt -->
                                    <div class="padder-v">
                                        <a href="{{Helpers::url($w['title'], $w['id'], $w['type'])}}"> {{  Helpers::shrtString($w['title']) }} </a>
                                        @if(Helpers::isUser($user->username))
                                
                                            {{ Form::open(array('url' => 'lists/remove', 'class' => 'trash-ico pull-right')) }}
            
                                              {{ Form::hidden('title', $w['id']) }}
                                              {{ Form::hidden('user', $user->id) }}
                                              {{ Form::hidden('list', Request::segment(3) == 'favorites' ? 'favorite' : 'watchlist') }}
                                              {{ Form::hidden('name', $w['title']) }}
            
                                              <button type = "submit" title="{{ trans('dash.remove') }}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> </button> 
                                            {{ Form::close() }}
            
                                        @endif
                                    </div> <!-- /.padder-v -->
                                </div> <!-- /.item -->
                            </div> <!-- /.col-xs-6.col-sm-4.col-md-3.col-lg-2 -->
                        
                      @endforeach
                      @if (Request::segment(3) == 'favorites')
                        {{ $favorite->appends(array())->links() }}
                    @else
                        {{ $watchlist->appends(array())->links() }}
                    @endif
                </div>
              </div>
            </section>
          </section>
        </aside>
    </section>
    <!-- /section.hbox.stretch -->
  </section>
  <!-- /section#bjax-target.scrollable.padder-lg.w-f-md -->
</section>
<!-- /section.vbox -->

@stop

@section('ads')
@stop
