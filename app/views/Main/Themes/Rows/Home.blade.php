@extends('Main.Boilerplate')

@section('assets')

  @parent

  <meta name="title" content="{{ trans('main.meta title') }}">
  <meta name="description" content="{{ trans('main.meta description') }}">

  <meta name="keywords" content="{{ trans('main.meta keywords') }}">

@stop

@section('bodytag')
	<body>
@stop

@section('content')


	<section class="hbox stretch">
	    <section>
	        <section class="vbox">
	          <section class="scrollable padder-lg" id="bjax-target">


	          	@if (Helpers::hasAccess('titles.update'))

				{{ Form::open(array('route' => 'titles.updatePlaying', 'class' => 'pull-right in-heading-form')) }}

                	<button type="submit" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin"><i class="icon-refresh i-lg  inline" id="refresh"></i> {{ trans('dash.update') }}</button>

              	{{ Form::close() }}

				@endif
                
				<!-- JUMBOTRON -->

	            <h2 class="font-thin m-b">Discover <span class="musicbar animate inline m-l-sm" style="width:20px;height:20px">
	             <span class="bar1 a1 bg-primary lter"></span>
	             <span class="bar2 a2 bg-info lt"></span>
	             <span class="bar3 a3 bg-success"></span>
	             <span class="bar4 a4 bg-warning dk"></span>
	             <span class="bar5 a5 bg-danger dker"></span>
	           </span></h2>
	           <h3>{{ trans('main.in theaters') }}</h3>
	           	<div class="row row-sm">
	           		@foreach($playing->slice(0, 12) as $k => $movie)
	           			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
	           				<div class="item">
	           					<div class="pos-rlt">
	           						<a href="{{ Helpers::url($movie['title'], $movie['id'], $movie['type']) }}"><img src="{{{ asset($movie['poster']) }}}" alt="{{ 'Poster of ' . $movie['title'] }}" class="r r-2x img-full"></a> <!-- Image -->
	           					</div> <!-- /.pos-rlt -->
	           					<div class="padder-v">
	           						<a href="{{ Helpers::url($movie['title'], $movie['id'], $movie['type']) }}">{{{ Helpers::shrtString($movie['title']) }}}</a>
	           					</div> <!-- /.padder-v -->
	           				</div> <!-- /.item -->
	           			</div> <!-- /.col-xs-6.col-sm-4.col-md-3.col-lg-2 -->
	           		@endforeach
	            </div>
	             @if (isset($upcoming) && ! $upcoming->isEmpty())
		            <h3>{{ trans('main.upcoming') }}</h3>
		            <div class="row row-sm">
		           		@foreach($upcoming as $k => $movie)
		           			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
		           				<div class="item">
		           					<div class="pos-rlt">
		           						<a href="{{ Helpers::url($movie['title'], $movie['id'], $movie['type']) }}">
							                <img src="{{{ asset($movie['poster']) }}}" class="r r-2x img-full" alt="{{ 'Poster of ' . $movie['title'] }}">
							            </a> <!-- Image -->
		           					</div> <!-- /.pos-rlt -->
		           					<div class="padder-v">
		           						<a href="{{ Helpers::url($movie['title'], $movie['id'], $movie['type']) }}" class="text-ellipsis">
		           							{{{ Helpers::shrtString($movie['title']) }}}
		           						</a>
		           					</div> <!-- /.padder-v -->
		           				</div> <!-- /.item -->
		           			</div> <!-- /.col-xs-6.col-sm-4.col-md-3.col-lg-2 -->
		           		@endforeach
		            </div>
		         @endif

		        <!-- Actors -->
		        @if (isset($actors) && ! $actors->isEmpty())
	            <div class="row">
	              <div class="col-md-7">
	                <h3>{{ trans('main.popular actors') }}</h3>
	                <div class="row row-sm">
	                	@foreach($actors as $k => $v)
		                  	<div class="col-xs-6 col-sm-3">
			                    <div class="item">
			                      <div class="pos-rlt">
			                        <a href="{{ Helpers::url($v['name'], $v['id'], 'people') }}">
						                <img src="{{{ asset($v['image']) }}}" class="r r-2x img-full" alt="{{ 'Poster of ' . $v['name'] }}">
						            </a>
			                      </div>
			                      <div class="padder-v">
			                      	<a class="text-ellipsis" href="{{ Helpers::url($v['name'], $v['id'], 'people') }}">{{{ $v['name'] }}}</a>
			                      </div>
			                    </div>
		                  	</div>
	                  	@endforeach
	                </div>
	              </div>
	              <!-- Actors end -->
	              <div class="col-md-5">
	                <h3 class="font-thin">Top Songs</h3>
	                <div class="list-group bg-white list-group-lg no-bg auto">                          
	                  <a href="#" class="list-group-item clearfix">
	                    <span class="pull-right h2 text-muted m-l">1</span>
	                    <span class="pull-left thumb-sm avatar m-r">
	                      <img src="images/a4.png" alt="...">
	                    </span>
	                    <span class="clear">
	                      <span>Little Town</span>
	                      <small class="text-muted clear text-ellipsis">by Chris Fox</small>
	                    </span>
	                  </a>
	                  <a href="#" class="list-group-item clearfix">
	                    <span class="pull-right h2 text-muted m-l">2</span>
	                    <span class="pull-left thumb-sm avatar m-r">
	                      <img src="images/a5.png" alt="...">
	                    </span>
	                    <span class="clear">
	                      <span>Lementum ligula vitae</span>
	                      <small class="text-muted clear text-ellipsis">by Amanda Conlan</small>
	                    </span>
	                  </a>
	                  <a href="#" class="list-group-item clearfix">
	                    <span class="pull-right h2 text-muted m-l">3</span>
	                    <span class="pull-left thumb-sm avatar m-r">
	                      <img src="images/a6.png" alt="...">
	                    </span>
	                    <span class="clear">
	                      <span>Aliquam sollicitudin venenatis</span>
	                      <small class="text-muted clear text-ellipsis">by Dan Doorack</small>
	                    </span>
	                  </a>
	                  <a href="#" class="list-group-item clearfix">
	                    <span class="pull-right h2 text-muted m-l">4</span>
	                    <span class="pull-left thumb-sm avatar m-r">
	                      <img src="images/a7.png" alt="...">
	                    </span>
	                    <span class="clear">
	                      <span>Aliquam sollicitudin venenatis ipsum</span>
	                      <small class="text-muted clear text-ellipsis">by Lauren Taylor</small>
	                    </span>
	                  </a>
	                  <a href="#" class="list-group-item clearfix">
	                    <span class="pull-right h2 text-muted m-l">5</span>
	                    <span class="pull-left thumb-sm avatar m-r">
	                      <img src="images/a8.png" alt="...">
	                    </span>
	                    <span class="clear">
	                      <span>Vestibulum ullamcorper</span>
	                      <small class="text-muted clear text-ellipsis">by Dan Doorack</small>
	                    </span>
	                  </a>
	                </div>
	              </div>
	            </div>
	            @endif
                
                <div class="row">
                    
                    <h3>{{ trans('main.latest news') }}</h3>
                    
                    <div class="row row-sm">
                    
                        @foreach($news->slice(0,6) as $k => $n)

                            @if ($k == 3)

                                @if($ad = $options->getHomeNewsAd())
                                    <div class="ads-row">{{ $ad }}</div>
                                @endif

                            @endif

                            <div class="col-sm-3">
                                <div class="item">
                                    <div class="pos-rlt">
                                        @if ($options->scrapeNewsFully())
                                            <a class="pull-left hidden-xs" href="{{{ Helpers::url($n->title, $n->id, 'news') }}}">
                                                <img style="max-width:235px" class="media-object img-responsive" src="{{{ asset($n->image) }}}" alt="{{ 'Image of News Item' . $k }}">
                                            </a>
                                        @else
                                            <a class="pull-left hidden-xs" href="{{{ $n->full_url ? $n->full_url : Helpers::url($n->title, $n->id, 'news') }}}">
                                                <img style="max-width:235px" class="media-object img-responsive" src="{{{ asset($n->image) }}}" alt="{{ 'Image of News Item' . $k }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="padder-v">
                                        @if ($options->scrapeNewsFully())
                                            <h4 class="media-heading"><a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}">{{{ $n['title'] }}}</a> </h4>
                                       @else
                                           <h4 class="media-heading"><a href="{{{ $n['full_url'] ? $n['full_url'] : Helpers::url($n->title, $n->id, 'news') }}}">{{{ $n['title'] }}}</a> </h4>
                                       @endif
                                    </div>

                                    <span class="home-news-time pull-left"> {{ trans('main.from') }} {{{ $n['source'] ? $n['source'] : trans('main.brand') }}}
                                        <span class="home-news-ago"><i class="fa fa-clock-o"></i> 
                                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($n['created_at']))->diffForHumans() }}
                                        </span>

                                        @if ($options->scrapeNewsFully())
                                             <a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}">{{ trans('main.read full article') }} <i class="fa fa-external-link"></i></a>
                                        @else
                                            <a href="{{{ $n['full_url'] ? $n['full_url'] : Helpers::url($n->title, $n->id, 'news') }}}">{{ trans('main.read full article') }} <i class="fa fa-external-link"></i></a>
                                        @endif

                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                @if ( ! Sentry::check() )
                    <div class="row m-t-lg m-b-lg">
                      <div class="col-sm-6">
                        <div class="bg-primary wrapper-md r">
                          <a href="/register">
                            <span class="h4 m-b-xs block"><i class=" icon-user-follow i-lg"></i> Login or Create account</span>
                            <span class="text-muted">Save and share your playlist with your friends when you log in or create an account.</span>
                          </a>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="bg-black wrapper-md r">
                          <a href="#">
                            <span class="h4 m-b-xs block"><i class="icon-cloud-download i-lg"></i> Download our app</span>
                            <span class="text-muted">Get the apps for desktop and mobile to start listening music at anywhere and anytime.</span>
                          </a>
                        </div>
                      </div>
                    </div>
                @endif
	          </section>
	          
	        </section>
	      </section>
	      <!-- side content -->
	      <aside class="aside-md bg-light dk" id="sidebar">
	        <section class="vbox animated fadeInRight">
	          <section class="w-f-md scrollable hover">
	            <h4 class="font-thin m-l-md m-t">Connected</h4>
	            <ul class="list-group no-bg no-borders auto m-t-n-xxs">
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a1.png" alt="..." class="img-circle">
	                  <i class="on b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Chris Fox</a></div>
	                  <small class="text-muted">New York</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a2.png" alt="...">
	                  <i class="on b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Amanda Conlan</a></div>
	                  <small class="text-muted">France</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a3.png" alt="...">
	                  <i class="busy b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Dan Doorack</a></div>
	                  <small class="text-muted">Hamburg</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a4.png" alt="...">
	                  <i class="away b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Lauren Taylor</a></div>
	                  <small class="text-muted">London</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a5.png" alt="..." class="img-circle">
	                  <i class="on b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Chris Fox</a></div>
	                  <small class="text-muted">Milan</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a6.png" alt="...">
	                  <i class="on b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Amanda Conlan</a></div>
	                  <small class="text-muted">Copenhagen</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a7.png" alt="...">
	                  <i class="busy b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Dan Doorack</a></div>
	                  <small class="text-muted">Barcelona</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a8.png" alt="...">
	                  <i class="away b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Lauren Taylor</a></div>
	                  <small class="text-muted">Tokyo</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a9.png" alt="..." class="img-circle">
	                  <i class="on b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Chris Fox</a></div>
	                  <small class="text-muted">UK</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a1.png" alt="...">
	                  <i class="on b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Amanda Conlan</a></div>
	                  <small class="text-muted">Africa</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a2.png" alt="...">
	                  <i class="busy b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Dan Doorack</a></div>
	                  <small class="text-muted">Paris</small>
	                </div>
	              </li>
	              <li class="list-group-item">
	                <span class="pull-left thumb-xs m-t-xs avatar m-l-xs m-r-sm">
	                  <img src="images/a3.png" alt="...">
	                  <i class="away b-light right sm"></i>
	                </span>
	                <div class="clear">
	                  <div><a href="#">Lauren Taylor</a></div>
	                  <small class="text-muted">Brussels</small>
	                </div>
	              </li>
	            </ul>
	          </section>
	        </section>              
	      </aside>
	      <!-- / side content -->
	    </section>
	    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
	  </section>
 
@stop

@section('scripts')
    <!-- {{ HTML::script('assets/js/scripts.js') }} -->
@stop