@extends('Main.Boilerplate')

@section('title')
	<title>{{ trans('main.news archive') }} - {{ trans('main.brand') }}</title>
@stop

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
<section class="hbox stretch">
    <section class="vbox">
        <section class="scrollable">
            <div class="row"> <br> <div class="col-md-10 col-md-offset-1"> @include('Partials.Response') </div> </div>
            <div id="masonry" class="pos-rlt animated fadeInUpBig">
            
            	{{ $news->links() }}
				
				@if (Helpers::hasAccess('news.create'))
					<a href="{{ route(Str::slug(trans('main.news')) . '.create') }}" id="create-news" class="pull-right btn btn-success"><i class="fa fa-pencil"></i> {{ trans('dash.create') }}</a>
				@endif

				@if (Helpers::hasAccess('news.update'))

					{{ Form::open(array('url' => 'news/external', 'class' => 'pull-right form-update-news')) }}

                    	<button type="submit" class="btn btn-success"><i class="fa fa-refresh"></i> {{ trans('dash.update') }}</button>

                  	{{ Form::close() }}

				@endif
                @if ( $news->isEmpty() )
                    {{ trans('main.no news found') }}
                @else
                    @foreach($news as $k => $n)
                        @unless($options->scrapeNewsFully() && $n->fully_scraped && strlen($n->body) < 350)
                            <div class="item">
                                @if ($options->scrapeNewsFully())
                                    <div class="bottom gd bg-info wrapper">
                                        <div class="m-t m-b">
                                            <a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}" class="b-b b-info h4 text-u-c text-lt font-bold">{{{ $n['title'] }}}</a>
                                        </div>
                                    </div>
                                    <a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}"><img src="{{{ asset($n['image']) }}}" alt="{{ 'Image of News Item' . $k }}" class="img-full"></a>
                                @else
                                     <div class="bottom gd bg-info wrapper">
                                        <div class="m-t m-b">
                                            <a href="{{{ $n['full_url'] ? $n['full_url'] : Helpers::url($n->title, $n->id, 'news') }}}" class="b-b b-info h4 text-u-c text-lt font-bold">{{{ $n['title'] }}}</a>
                                        </div>
                                    </div>
                                    <a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}"><img src="{{{ asset($n['image']) }}}" alt="{{ 'Image of News Item' . $k }}" class="img-full"></a>
                                @endif
                            </div>
                            <!-- /.item -->
                        @endunless
                    @endforeach
                @endif
            </div>
            <!-- /#masonry.pos-rlt.animated.fadeInUpBig -->
        </section>
        <!-- /.scrollable -->
    </section>
    <!-- /.vbox -->
</section>

@stop

@section('scripts')
    {{ HTML::script('assets/js/masonry/tiles.min.js') }}
    {{ HTML::script('assets/js/masonry/demo.js') }}
@stop