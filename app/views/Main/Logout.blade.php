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

  <!--[if lt IE 9]>
    {{ HTML::script('assets/js/ie/html5shiv.js') }}
    {{ HTML::script('assets/js/ie/respond.min.js') }}
    {{ HTML::script('assets/js/ie/excanvas.js') }}
  <![endif]-->

    <style>
      @media (max-width: 767px) {
        html, body {
            overflow: visible;
            width: 100%;
            height: 100%;
            position: relative;
            background: #5a6a7a;
        }
        .modal-over {
            overflow: visible;
            width: 100%;
            height: 100%;
            position: relative;
            background: #5a6a7a;
        }
      }
  </style>
</head>

<body class="body">
<div class="modal-over">
  <div class="modal-center animated fadeInUp text-center" style="width:200px;margin:-80px 0 0 -100px;">
      
    <div class="thumb-md"><img src="{{ $user->first()->avatar ? asset($user->first()->avatar) : asset('assets/images/no_user_icon_big.jpg')}}" class="img-circle b-a b-light b-3x"></div>

    <p class="text-white h4 m-t m-b">{{ $user->first()->first_name . ' ' . $user->first()->last_name }}</p>
    {{ Form::open(array('url' => '/log-out')) }}
        {{ Form::hidden('username', Sentry::getUser()->username) }}

        <div class="row">
            {{ $errors->first('username', '<span class="help-block alert alert-danger">:message</span>') }}
        </div>
        <div class="input-group">
            {{ Form::password('password', ['class' => 'form-control text-sm btn-rounded', 'placeholder' => 'Enter password to continue']) }}
            <span class="input-group-btn">
                <button class="btn btn-success btn-rounded" type="submit" data-dismiss="modal"><i class="fa fa-arrow-right"></i></button>
            </span>
        </div>
        
      <div class="row">
        {{ $errors->first('password', '<span class="help-block alert alert-danger">:message</span>') }}
      </div>
    {{ Form::close() }}
    <p class="text-white m-t m-b"><a href="/" class="text-white"><i class="fa fa-arrow-left"></i> Goto Homepage</a></p>
    <?php
    Sentry::check() ? Sentry::logout() : Redirect::to('/');
    ?>
  </div>
</div>

</body>
</html>