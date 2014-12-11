<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>{{ '404 - ' . trans('main.brand') }}</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  {{ HTML::style('assets/js/jPlayer/jplayer.flat.css') }}
  {{ HTML::style('assets/css/bootstrap.css') }}
  {{ HTML::style('assets/css/animate.css') }}
  {{ HTML::style('assets/css/font-awesome.min.css') }}
  {{ HTML::style('assets/css/simple-line-icons.css') }}
  {{ HTML::style('assets/css/font.css') }}
  {{ HTML::style('assets/css/app.css') }}

  <!-- {{ HTML::style('assets/css/styles.css') }} -->
  {{ HTML::style('assets/css/' . $options->getColorScheme() . '.css') }}
  {{ HTML::style('assets/css/new.css') }}

  <!--[if lt IE 9]>
    {{ HTML::script('assets/js/ie/html5shiv.js') }}
    {{ HTML::script('assets/js/ie/respond.min.js') }}
    {{ HTML::script('assets/js/ie/excanvas.js') }}
  <![endif]-->
</head>
<?php //.$bg ?>
<body class="bg-light dk" style="background: url( {{{ asset('assets/images/' . $bg) }}} ); background-size: cover; height: 100%">
    <section id="content">
    <div class="row m-n">
      <div class="col-sm-4 col-sm-offset-4">
        <div class="text-center m-b-lg">
          <h1 class="h text-white animated fadeInDownBig">404</h1>
        </div>
        <div class="list-group auto m-b-sm m-b-lg">
          <p class="h4 animated fadeInDownBig list-group-item">{{ trans('main.404 page message') }}</p>
          <a href="/" class="list-group-item">
            <i class="fa fa-chevron-right icon-muted"></i>
            <i class="fa fa-fw fa-home icon-muted"></i> Goto homepage
          </a>
          <a href="/contact" class="list-group-item">
            <i class="fa fa-chevron-right icon-muted"></i>
            <i class="fa fa-fw fa-question icon-muted"></i> Contact Us
          </a>
        </div>
      </div>
    </div>
  </section>
  {{ HTML::script('assets/js/jquery.min.js') }}
 {{ HTML::script('assets/js/bootstrap.js') }}
 {{ HTML::script('assets/js/app.js') }}
 {{ HTML::script('assets/js/slimscroll/jquery.slimscroll.min.js') }}
 {{ HTML::script('assets/js/app.plugin.js') }}
 {{ HTML::script('assets/js/jPlayer/jquery.jplayer.min.js') }}
 {{ HTML::script('assets/js/jPlayer/add-on/jplayer.playlist.min.js') }}
 {{ HTML::script('assets/js/jPlayer/demo.js') }}
</body>
</html>