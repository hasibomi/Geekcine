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

@section('nav')
	@include('Partials.Navbar')
@stop

@section('content')


<section id="content">
	<section class="hbox stretch">
	    <section>
	    	<!-- JUMBOTRON -->
	        <section class="vbox">
	          <section class="scrollable padder-lg w-f-md" id="bjax-target">


	          	@if (Helpers::hasAccess('titles.update'))

				{{ Form::open(array('route' => 'titles.updatePlaying', 'class' => 'pull-right in-heading-form')) }}

                	<button type="submit" class="pull-right text-muted m-t-lg" data-toggle="class:fa-spin"><i class="icon-refresh i-lg  inline" id="refresh"></i> {{ trans('dash.update') }}</button>

              	{{ Form::close() }}

				@endif

				@include('Partials.Jumbotron')

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
	           						<div class="bottom">
	           							<span class="badge bg-info m-1-sm m-b-sm">03:20</span>
	           						</div> <!-- /.bottom -->
	           						<div class="item-overlay opacity r r-2x bg-black">
	           							<div class="text-info padder m-t-sm text-sm">
	           								<i class="fa fa-star"></i>
	           								<i class="fa fa-star"></i>
	           								<i class="fa fa-star"></i>
	           								<i class="fa fa-star"></i>
	           								<i class="fa fa-star"></i>
	           								<i class="fa fa-star-o text-muted"></i>
	           							</div> <!-- /.text-info.padder.m-t-sm.text-sm -->
	           							<div class="center text-center m-t-n">
	           								<a href="#"><i class="icon-control-play i-2x"></i></a>
	           							</div> <!-- /.center.text-center.m-t-n -->
	           							<div class="bottom padder m-b-sm">
	           								<a href="#" class="pull-right">
	           									<i class="fa fa-heart-o"></i>
	           								</a>
	           								<a href="#">
	           									<i class="fa fa-plus-circle"></i>
	           								</a>
	           							</div> <!-- /.bottom.padder.m-b-sm -->
	           						</div> <!-- /.item-overlay.opacity.r.r-2x.bg-black -->
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
		           						<div class="bottom">
		           							<span class="badge bg-info m-1-sm m-b-sm">03:20</span>
		           						</div> <!-- /.bottom -->
		           						<div class="item-overlay opacity r r-2x bg-black">
		           							<div class="text-info padder m-t-sm text-sm">
		           								<i class="fa fa-star"></i>
		           								<i class="fa fa-star"></i>
		           								<i class="fa fa-star"></i>
		           								<i class="fa fa-star"></i>
		           								<i class="fa fa-star"></i>
		           								<i class="fa fa-star-o text-muted"></i>
		           							</div> <!-- /.text-info.padder.m-t-sm.text-sm -->
		           							<div class="center text-center m-t-n">
		           								<a href="#"><i class="icon-control-play i-2x"></i></a>
		           							</div> <!-- /.center.text-center.m-t-n -->
		           							<div class="bottom padder m-b-sm">
		           								<a href="#" class="pull-right">
		           									<i class="fa fa-heart-o"></i>
		           								</a>
		           								<a href="#">
		           									<i class="fa fa-plus-circle"></i>
		           								</a>
		           							</div> <!-- /.bottom.padder.m-b-sm -->
		           						</div> <!-- /.item-overlay.opacity.r.r-2x.bg-black -->
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
	                <h3 class="font-thin">{{ trans('main.popular actors') }}</h3>
	                <div class="row row-sm">
	                	@foreach($actors as $k => $v)
		                  	<div class="col-xs-6 col-sm-3">
			                    <div class="item">
			                      <div class="pos-rlt">
			                        <div class="item-overlay opacity r r-2x bg-black">
			                          <div class="center text-center m-t-n">
			                            <a href="#"><i class="fa fa-play-circle i-2x"></i></a>
			                          </div>
			                        </div>
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
	          </section>
	          <footer class="footer bg-dark">
	            <div id="jp_container_N">
	              <div class="jp-type-playlist">
	                <div id="jplayer_N" class="jp-jplayer hide"></div>
	                <div class="jp-gui">
	                  <div class="jp-video-play hide">
	                    <a class="jp-video-play-icon">play</a>
	                  </div>
	                  <div class="jp-interface">
	                    <div class="jp-controls">
	                      <div><a class="jp-previous"><i class="icon-control-rewind i-lg"></i></a></div>
	                      <div>
	                        <a class="jp-play"><i class="icon-control-play i-2x"></i></a>
	                        <a class="jp-pause hid"><i class="icon-control-pause i-2x"></i></a>
	                      </div>
	                      <div><a class="jp-next"><i class="icon-control-forward i-lg"></i></a></div>
	                      <div class="hide"><a class="jp-stop"><i class="fa fa-stop"></i></a></div>
	                      <div><a class="" data-toggle="dropdown" data-target="#playlist"><i class="icon-list"></i></a></div>
	                      <div class="jp-progress hidden-xs">
	                        <div class="jp-seek-bar dk">
	                          <div class="jp-play-bar bg-info">
	                          </div>
	                          <div class="jp-title text-lt">
	                            <ul>
	                              <li></li>
	                            </ul>
	                          </div>
	                        </div>
	                      </div>
	                      <div class="hidden-xs hidden-sm jp-current-time text-xs text-muted"></div>
	                      <div class="hidden-xs hidden-sm jp-duration text-xs text-muted"></div>
	                      <div class="hidden-xs hidden-sm">
	                        <a class="jp-mute" title="mute"><i class="icon-volume-2"></i></a>
	                        <a class="jp-unmute hid" title="unmute"><i class="icon-volume-off"></i></a>
	                      </div>
	                      <div class="hidden-xs hidden-sm jp-volume">
	                        <div class="jp-volume-bar dk">
	                          <div class="jp-volume-bar-value lter"></div>
	                        </div>
	                      </div>
	                      <div>
	                        <a class="jp-shuffle" title="shuffle"><i class="icon-shuffle text-muted"></i></a>
	                        <a class="jp-shuffle-off hid" title="shuffle off"><i class="icon-shuffle text-lt"></i></a>
	                      </div>
	                      <div>
	                        <a class="jp-repeat" title="repeat"><i class="icon-loop text-muted"></i></a>
	                        <a class="jp-repeat-off hid" title="repeat off"><i class="icon-loop text-lt"></i></a>
	                      </div>
	                      <div class="hide">
	                        <a class="jp-full-screen" title="full screen"><i class="fa fa-expand"></i></a>
	                        <a class="jp-restore-screen" title="restore screen"><i class="fa fa-compress text-lt"></i></a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	                <div class="jp-playlist dropup" id="playlist">
	                  <ul class="dropdown-menu aside-xl dker">
	                    <!-- The method Playlist.displayPlaylist() uses this unordered list -->
	                    <li class="list-group-item"></li>
	                  </ul>
	                </div>
	                <div class="jp-no-solution hide">
	                  <span>Update Required</span>
	                  To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
	                </div>
	              </div>
	            </div>
	          </footer>
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
	          <footer class="footer footer-md bg-black">
	            <form class="" role="search">
	              <div class="form-group clearfix m-b-none">
	                <div class="input-group m-t m-b">
	                  <span class="input-group-btn">
	                    <button type="submit" class="btn btn-sm bg-empty text-muted btn-icon"><i class="fa fa-search"></i></button>
	                  </span>
	                  <input type="text" class="form-control input-sm text-white bg-empty b-b b-dark no-border" placeholder="Search members">
	                </div>
	              </div>
	            </form>
	          </footer>
	        </section>              
	      </aside>
	      <!-- / side content -->
	    </section>
	    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
	  </section>
 
@stop

@section('scripts')

@stop