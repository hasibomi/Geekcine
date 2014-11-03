<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
    <title>{{ trans('users.register title') }}</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{{asset('assets/js/jPlayer/jplayer.flat.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/simple-line-icons.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/font.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/ie/html5shiv.js')}}"></script>
    <script src="{{asset('assets/js/ie/respond.min.js')}}"></script>
    <script src="{{asset('assets/js/ie/excanvas.js')}}"></script>
  <![endif]-->
</head>
<body class="bg-info dker">
  <div class="row"> @include('Partials.Response') </div>
  <div class="col-md-5">
    <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
      <a class="navbar-brand block" href="javascript:;"><span class="h1 font-bold">Welcome to Geekcine</span></a>
      <div class="container aside-xl">
        
        <section class="m-b-lg">
          <header class="wrapper text-center">
            <strong>Sign up to find interesting thing</strong>
          </header>
          {{ Form::open(array('action' => 'UserController@store')) }}
            <div class="form-group">
              {{ Form::text('username', Input::old('username'), array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => trans('users.username'))) }}
              {{ $errors->first('username', '<span class="help-block alert alert-danger">:message</span>') }}
            </div>
            <div class="form-group">
              {{ Form::email('email', Input::old('email'), array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => trans('users.email'))) }}
              {{ $errors->first('email', '<span class="help-block alert alert-danger">:message</span>') }}
            </div>
            <div class="form-group">
              {{ Form::password('password', array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => trans('users.password'))) }}
              {{ $errors->first('password', '<span class="help-block alert alert-danger">:message</span>') }}
            </div>
            <div class="form-group">
              {{ Form::password('password_confirmation', array('class' => 'form-control rounded input-lg text-center no-border', 'placeholder' => trans('users.confirm password'))) }}
              {{ $errors->first('password_confirmation', '<span class="help-block alert alert-danger">:message</span>') }}
            </div>
            <div class="checkbox i-checks m-b">
              <label class="m-l">
                <input type="checkbox" checked=""><i></i> Agree the <a href="#">terms and policy</a>
              </label>
            </div>
            <button type="submit" class="btn btn-lg btn-warning lt b-white b-2x btn-block btn-rounded"><i class="icon-arrow-right pull-right"></i><span class="m-r-n-lg">{{ trans('users.create account') }}</span></button>
            <div class="line line-dashed"></div>
            <p class="text-muted text-center"><small>Already have an account?</small></p>
            <a href="/login" class="btn btn-lg btn-info btn-block btn-rounded">{{ trans('users.login') }}</a>
          {{ Form::close() }}
        </section>
      </div>
    </section>
    <!-- footer -->
    <footer id="footer">
      <div class="text-center padder clearfix">
        <p>
          <small>&copy; 1999 - 2014 Geekcine, Inc. All Rights Reserved</small>
        </p>
      </div>
      <p>
        <small>
          <a href="/">
            <i class="fa fa-long-arrow-left"> Goto Homepage</i>
          </a>
        </small>
      </p>
    </footer>
    <!-- / footer -->
  </div>
  <!-- /.col-md-5 -->
  <div class="col-md-7">
    <img src="{{ asset('assets/images/elysium.jpg') }}" alt="" width="800px" height="650px">
  </div>
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