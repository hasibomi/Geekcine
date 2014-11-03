<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  @section('title')

    <title>{{ trans('main.meta title') }}</title>

  @show
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />

  <link rel="shortcut icon" href="{{{ asset('assets/images/favicon.ico') }}}">
  <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Cantora+One' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Quando' rel='stylesheet' type='text/css'>

  {{ HTML::style('assets/js/jPlayer/jplayer.flat.css') }}
  {{ HTML::style('assets/css/bootstrap.css') }}
  {{ HTML::style('assets/css/animate.css') }}
  {{ HTML::style('assets/css/font-awesome.min.css') }}
  {{ HTML::style('assets/css/simple-line-icons.css') }}
  {{ HTML::style('assets/css/font.css') }}
  {{ HTML::style('assets/css/app.css') }}

  {{ HTML::style('assets/css/styles.css') }}
  {{ HTML::style('assets/css/' . $options->getColorScheme() . '.css') }}
  {{ HTML::style('assets/css/new.css') }}

  <!--[if lt IE 9]>
    {{ HTML::script('assets/js/ie/html5shiv.js') }}
    {{ HTML::script('assets/js/ie/respond.min.js') }}
    {{ HTML::script('assets/js/ie/excanvas.js') }}
  <![endif]-->
</head>
<body class="">
  <section class="vbox">
    <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
      <div class="navbar-header aside bg-info nav-xs">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="icon-list"></i>
        </a>
        <a href="index.html" class="navbar-brand text-lt">
          <i class="icon-earphones"></i>
          <img src="{{asset('assets/images/K1TFYQqZG9jHHHpXaNOp.png')}}" alt="." class="hide">
          <span class="hidden-nav-xs m-l-sm">
            <img src="{{asset('assets/images/K1TFYQqZG9jHHHpXaNOp.png')}}" alt=".">
          </span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="icon-settings"></i>
        </a>
      </div>      <ul class="nav navbar-nav hidden-xs">
        <li>
          <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
            <i class="fa fa-indent text"></i>
            <i class="fa fa-dedent text-active"></i>
          </a>
        </li>
      </ul>
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border rounded" placeholder="Search songs, albums...">
          </div>
        </div>
      </form>
      <div class="navbar-right ">
        <ul class="nav navbar-nav m-n hidden-xs nav-user user">
          <li class="hidden-xs">
            <a href="#" class="dropdown-toggle lt" data-toggle="dropdown">
              <i class="icon-bell"></i>
              <span class="badge badge-sm up bg-danger count">2</span>
            </a>
            <section class="dropdown-menu aside-xl animated fadeInUp">
              <section class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>You have <span class="count">2</span> notifications</strong>
                </div>
                <div class="list-group list-group-alt">
                  <a href="#" class="media list-group-item">
                    <span class="pull-left thumb-sm">
                      <img src="{{asset('assets/images/a0.png')}}" alt="..." class="img-circle">
                    </span>
                    <span class="media-body block m-b-none">
                      Use awesome animate.css<br>
                      <small class="text-muted">10 minutes ago</small>
                    </span>
                  </a>
                  <a href="#" class="media list-group-item">
                    <span class="media-body block m-b-none">
                      1.0 initial released<br>
                      <small class="text-muted">1 hour ago</small>
                    </span>
                  </a>
                </div>
                <div class="panel-footer text-sm">
                  <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                  <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                </div>
              </section>
            </section>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="{{asset('assets/images/a0.png')}}" alt="...">
              </span>
              John.Smith <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInRight">            
              <li>
                <span class="arrow top"></span>
                <a href="#">Settings</a>
              </li>
              <li>
                <a href="profile.html">Profile</a>
              </li>
              <li>
                <a href="#">
                  <span class="badge bg-danger pull-right">3</span>
                  Notifications
                </a>
              </li>
              <li>
                <a href="docs.html">Help</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black dk nav-xs aside hidden-print" id="nav">          
          <section class="vbox">
            @include('Partials.Navbar')
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <div class="bg hidden-xs ">
                  <div class="dropdown dropup wrapper-sm clearfix">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb-sm avatar pull-left m-l-xs">                        
                        <img src="{{asset('assets/images/a3.png')}}" class="dker" alt="...">
                        <i class="on b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-l">
                          <strong class="font-bold text-lt">John.Smith</strong> 
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block m-l">Art Director</span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight aside text-left">                      
                      <li>
                        <span class="arrow bottom hidden-nav-xs"></span>
                        <a href="#">Settings</a>
                      </li>
                      <li>
                        <a href="profile.html">Profile</a>
                      </li>
                      <li>
                        <a href="#">
                          <span class="badge bg-danger pull-right">3</span>
                          Notifications
                        </a>
                      </li>
                      <li>
                        <a href="docs.html">Help</a>
                      </li>
                      <li class="divider"></li>
                      <li>
                        <a href="modal.lockme.html" data-toggle="ajaxModal" >Logout</a>
                      </li>
                    </ul>
                  </div>
                </div>            </footer>
          </section>
        </aside>
        <!-- /.aside -->
        @yield("content")
      </section>
    </section>    
  </section>
 {{ HTML::script('assets/js/jquery.min.js') }}
 {{ HTML::script('assets/js/bootstrap.js') }}
 {{ HTML::script('assets/js/app.js') }}
 {{ HTML::script('assets/js/slimscroll/jquery.slimscroll.min.js') }}
 {{ HTML::script('assets/js/app.plugin.js') }}
 {{ HTML::script('assets/js/jPlayer/jquery.jplayer.min.js') }}
 {{ HTML::script('assets/js/jPlayer/add-on/jplayer.playlist.min.js') }}
 {{ HTML::script('assets/js/jPlayer/demo.js') }}
 {{ HTML::script('assets/js/scripts.js') }}
   @yield('scripts')
</body>
</html>