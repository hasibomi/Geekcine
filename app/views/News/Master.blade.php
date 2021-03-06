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
            
            <div class="container">
                <div class="row">
                    {{ $news->links() }}

                    @if (Helpers::hasAccess('news.create'))
                        <a href="{{ route(Str::slug(trans('main.news')) . '.create') }}" id="create-news" class="pull-right btn btn-success"><i class="fa fa-pencil"></i> {{ trans('dash.create') }}</a>
                    @endif

                    @if (Helpers::hasAccess('news.update'))

                        {{ Form::open(array('url' => 'news/external', 'class' => 'pull-right form-update-news')) }}

                            <button type="submit" class="btn btn-success"><i class="fa fa-refresh"></i> {{ trans('dash.update') }}</button>

                        {{ Form::close() }}

                    @endif
                </div>
            </div>
            
            <div class="row">                
                @if ( $news->isEmpty() )
                    {{ trans('main.no news found') }}
                @else
                    @foreach($news as $k => $n)
                        @unless($options->scrapeNewsFully() && $n->fully_scraped && strlen($n->body) < 350)
                            @if ($options->scrapeNewsFully())
                                <div class="col-sm-3 pull-left hidden-xs" style="margin-right: -30px; display: block; width: 35%; visibility: visible;">
                                    <div class="item">
                                        <div class="pos-rlt">
                                            <div class="item-overlay opacity r r-2x bg-black">
                                                <div class="bottom padder m-b-sm">
                                                    <a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}" class="b-b b-info h4 text-u-c text-lt font-bold">{{{ $n['title'] }}}</a>
                                                </div>
                                                
                                                @if(Helpers::hasAccess('news.delete'))
                                                    {{ Form::open(array('action' => array('NewsController@destroy', $n['id']), 'class' => 'pull-left padd-right', 'method' => 'delete')) }}
                                                        <button type="submit" class="btn btn-danger btn-sm">{{ trans('dash.delete') }}</button>
                                                        {{ Form::close() }}
                                                @endif
                                        
                                                @if(Helpers::hasAccess('news.edit'))
                                                    <a href="{{ Helpers::url($n->title, $n->id, 'news') . '/edit' }}" type="submit" class="btn btn-warning btn-sm">{{ trans('dash.edit') }}</a>
                                                @endif

                                                @if ($n->source != 'ScreenRant')
                                                    <div class="news-master-share">
                                                        <div class="news-master-share-inner" data-image="{{ $n->image }}" data-url="{{ Helpers::url($n->title, $n->id, 'news') }}" data-text="{{ $n->title }}"></div>
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}"><img src="{{{ asset($n['image']) }}}" alt="{{ 'Image of News Item' . $k }}" class="img-full" width="100" height="250"></a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-sm-3 pull-left hidden-xs" style="margin-right: -30px; display: block; width: 35%; visibility: visible;">
                                    <div class="item">
                                        <div class="pos-rlt">
                                            <div class="item-overlay opacity r r-2x bg-black">
                                                <div class="bottom padder m-b-sm">
                                                    <a href="{{{ $n['full_url'] ? $n['full_url'] : Helpers::url($n->title, $n->id, 'news') }}}" class="b-b b-info h4 text-u-c text-lt font-bold">{{{ $n['title'] }}}</a>
                                                </div>
                                            </div>
                                            
                                            <a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}"><img src="{{{ asset($n['image']) }}}" alt="{{ 'Image of News Item' . $k }}" class="img-full" width="100" height="250"></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endunless
                    @endforeach
                @endif
            </div> <!-- end .row -->
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