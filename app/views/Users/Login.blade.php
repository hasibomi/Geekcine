<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
    <title>{{ trans('users.login title') }}</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{{asset('assets/js/jPlayer/jplayer.flat.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/simple-line-icons.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/font.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" type="text/css" />
  <style>
	.header-logo {
		margin-top: -50px;
		margin-left: -70px;
		width: 140%;
		text-align: center;
	}
	.logo-img {
		background: #5a6a7a repeat-x;
		background-size: 100%;
		width: 100%;
		height: 67px;
	}
	img {
		margin-top: 5px;
	}
	#loginBody {
        background: url({{{ asset('assets/images/' . $bg) }}}) no-repeat;
        background-size: cover;
        height: 100%;
        width: 100%;
        overflow-y: hidden;
    }
    #loginContainer {
        background: #2da0b5;
        overflow-x: hidden;
        overflow-y: auto;
        height: 100%;
    }
    @media (min-width: 100px) {
        #loginBody {
            background: url({{{ asset('assets/images/' . $bg) }}}) no-repeat;
             background-size: cover;
             height: 100%;
             width: 100%;
             overflow-y: hidden;
        }
    }
  </style>
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/ie/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/ie/respond.min.js')}}"></script>
    <script src="{{asset('assets/js/ie/excanvas.js')}}"></script>
  <![endif]-->
</head>
<body class="bg-info dker" id="loginBody">
  <div class="row"> @include('Partials.Response') </div>
  <div class="col-md-4" id="loginContainer">
    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">    	
      
      <div class="container aside-xl">

      	<div class="header-logo">
		      <div class="logo-img">
      			<a href="/">
      				{{ HTML::image('assets/images/logoo.png','') }}
      			</a>
    		  </div>
        </div>
        
        <section class="m-b-lg">
          <header class="wrapper text-center">
          	<a href="javascript:;"><span class="h2 font-bold">Welcome to Geekcine</span></a>
          	<br>
            <strong>Sign in to get in touch</strong>
          </header>
          {{ Form::open(array('action' => 'SessionController@store')) }}

            <div class="form-group">
              {{ Form::text('username', Input::old('username'), array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => trans('users.username'))) }}
              {{ $errors->first('username', '<span class="help-block alert alert-danger">:message</span>') }}
            </div>

            <div class="form-group">
              {{ Form::password('password', array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => trans('users.password'))) }}
              {{ $errors->first('password', '<span class="help-block alert alert-danger">:message</span>') }}
            </div>

            <div class="form-group">
              <div class="text-center m-t m-b">
				<label for="remember">{{ trans('users.remember me') }}</label>
				{{ Form::checkbox('remember', 1, true, array('id' => 'remember')) }}
              </div>
            </div>

            <div class="form-group">
              <div class="text-center m-t m-b">
				<a href="{{ url('forgot-password') }}">{{ trans('users.forgot your password') }}</a>
              </div>
            </div>

            <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">{{ trans('users.login') }}</span></button>
            <div class="line line-dashed"></div>
          {{ Form::close() }}
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a href="/register" class="btn btn-lg btn-info btn-block btn-rounded">{{ trans('users.create account') }}</a>
        </section>
      </div>
    </section>
    <!-- footer -->
    <footer id="footer">
      <div class="text-center padder clearfix">
        <p>
          <small>&copy; 1999 - {{ date('Y') }} Geekcine, Inc. All Rights Reserved</small>
        </p>
      </div>
      <br>
      <br>
      <p>
          <a href="/">
            <i class="fa fa-long-arrow-left"> Goto Homepage</i>
          </a>
      </p>
    </footer>
    <!-- / footer -->
  </div>
  <!-- /.col-md-5 -->
  <!-- /.col-md-7 -->
  <div class="col-sm-2"></div>
  <div class="push"></div>
  <div class="clearfix"></div>

  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('assets/js/bootstrap.js')}}"></script>
  <!-- App -->
  <script src="{{asset('assets/js/app.js')}}"></script>  
  <script src="{{asset('assets/js/slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script src="{{asset('assets/js/app.plugin.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jPlayer/jquery.jplayer.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jPlayer/add-on/jplayer.playlist.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/jPlayer/demo.js')}}"></script>
</body>
</html>