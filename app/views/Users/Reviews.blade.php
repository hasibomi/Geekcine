@extends('Main.Boilerplate')

@section('title')

	<title>{{{ $user->username }}} - {{ trans('users.profile') }}</title>

@stop

@section('bodytag')
	<body class="padding nav user-profile">
@stop

@section('content')
	
<section class="vbox">
  <section class="scrollable padder-lg" id="bjax-target" style="padding: 0">
    <section class="hbox stretch">
    	
    	@include('Users.Partials.Timeline')
    	
        <aside class="bg-white">
          <section class="vbox">
            
              @include ('Users.Partials.Header')
            
            <section class="scrollable">
              <div class="tab-content">
                <div class="tab-pane active" id="activity">
                
                	<br>

                    <div class="container row" style="width: 99%; margin: auto;"> @include('Partials.Response') </div>

                      @foreach ($reviews as $k => $r)

						<li>			
							<div class="row review-info">
			                	<span class="review-score"><span>{{{ $r->score * 10 }}}</span></span>  <strong>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($r->created_at))->diffForHumans() }}</strong> - <strong>{{ Title::find($r->title_id)->title }}</strong>
				            </div>

				            <p class="review-body">{{{ $r->body }}}</p>

				            <hr> 
						</li>

					@endforeach

                      @if (Request::segment(3) == 'favorites')
                        {{ $favorite->appends(array())->links() }}
                    @else
                        {{ $watchlist->appends(array())->links() }}
                    @endif

                </div>
              </div>
              <div class="push"></div>
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
