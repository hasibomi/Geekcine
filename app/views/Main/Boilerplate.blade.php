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



  <!-- {{ HTML::style('assets/css/styles.css') }} -->

  {{ HTML::style('assets/css/' . $options->getColorScheme() . '.css') }}

  {{ HTML::style('assets/css/new.css') }}
  
  {{ HTML::style('assets/css/auto-complete.css') }}

  <style>
      .slider-img {
          width: 23%;
      }

      @media (min-width: 651px) and (max-width: 900px) {
        .slider-img {
               width: 21%;
               float: left;
            }
      }
      @media (min-width: 100px) and (max-width: 650px) {
        .slider-img {
           width: 100%;
        }
      }

      .header-md .navbar-brand img {
        max-height: 60px;
      }
  </style>



  <!--[if lt IE 9]>

    {{ HTML::script('assets/js/ie/html5shiv.js') }}

    {{ HTML::script('assets/js/ie/respond.min.js') }}

    {{ HTML::script('assets/js/ie/excanvas.js') }}

  <![endif]-->

</head>

<body class="">

  <section class="vbox">



    @include("Partials.Header")



    <section>

      <section class="hbox stretch">

        <!-- .aside -->

        <aside class="bg-black dk nav-xs aside hidden-print" id="nav">



          <section class="vbox">



            @include('Partials.Navbar')



          </section>

        </aside>

        <!-- /.aside -->

        <section id="content">



          @yield('content')

          

        </section>

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
 
 {{ HTML::script('assets/js/home-autocomplete.js') }}



 <script>

  $(document).ready(function() {

    $("#hidder").click (function() {

    	if ($("#hidden-logo").attr('class') == 'hide') {

    		$("#hidden-logo").removeClass('hide');

    		$("#visible-logo").addClass('hide');

    		// alert('hide');

    	} else if ($("#hidden-logo").attr('class') != 'hide') {

    		$("#hidden-logo").addClass('hide');

    		$("#visible-logo").removeClass('hide');

    	}

    });

  });

 </script>



 @yield('scripts')



</body>

</html>