@extends('Main.Boilerplate')

@section('title')
  <title>{{{ $news->title }}} - {{ trans('main.brand') }}</title>
@stop

@section('assets')

  @parent

  <meta name="title" content="{{{ $news->title . ' - ' . trans('main.brand') }}}">
  <meta name="description" content="{{{ Helpers::shrtString($news->body, 200) }}}">
  <meta property="og:title" content="{{{ $news->title . ' - ' . trans('main.brand') }}}"/>
  <meta property="og:url" content="{{ Request::url() }}"/>
  <meta property="og:site_name" content="{{ trans('main.brand') }}"/>
  <meta property="og:image" content="{{ $news->image }}"/>

@stop

@section('bodytag')
	<body>
@stop

@section('nav')
	@include('Partials.Navbar')
@stop

@section('content')

    <br/><br/>

	<section class="vbox">
        <section class="scrollable wrapper-lg">
            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ trans('main.recent news') }}</div>
                        @if (isset($recent) && ! empty($recent))
                            @foreach($recent as $k => $n)
                                <div class="panel-body">
                                    <article class="media">
                                        @if ($options->scrapeNewsFully())
                                        <a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}" class="pull-left thumb-lg m-t-xs">
                                            <img src="{{{ asset($n->image) }}}" alt="{{ 'Image of News Item' . $k }}">
                                        </a>
                                        @else
                                            <a href="{{{ $n->full_url ? $n->full_url : Helpers::url($n->title, $n->id, 'news') }}}" class="pull-left thumb-lg m-t-xs">
                                                <img src="{{{ asset($n->image) }}}" alt="{{ 'Image of News Item' . $k }}">
                                            </a>
                                        @endif
                                        <div class="media-body">
                                            @if ($options->scrapeNewsFully())
                                                <a href="{{{ Helpers::url($n->title, $n->id, 'news') }}}" class="font-semibold">{{{ $n->title }}}</a>
                                                <div class="text-xs block m-t-xs"><a>{{ trans('main.from') }} {{{ $n->source ? $n->source : trans('main.brand') }}}</a> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($n->created_at))->diffForHumans() }}</div>
                                            @else
                                                <a href="{{{ $n->full_url ? $n->full_url : Helpers::url($n->title, $n->id, 'news') }}}" class="font-semibold">{{{ $n->title }}}</a>
                                                <div class="text-xs block m-t-xs"><a href="#">Travel</a> 2 minutes ago</div>
                                            @endif
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        @endif
                      </div>
                </div>
                {{-- /.colsm-4 --}}
                <div class="col-sm-8">
                    <div class="panel">
                        <div class="wrapper-lg">
                            <h2 class="m-t-none text-black">{{{ $news->title }}}</h2>
                            <div class="post-sum">
                                {{ $news->body }}
                            </div>
                            @if ($news->source)
                                <p class="row">{{ trans('main.source') }}: <a href="{{ $news->full_url }}">{{ $news->source }}</a></p>
                            @endif
                            <div class="line b-b"></div>
                            <div class="text-muted">
                                <i class="fa fa-user icon-muted"></i> by <a href="#" class="m-r-sm">Admin</a>
                                <i class="fa fa-clock-o icon-muted"></i> Feb 20, 2013
                                <a href="#" class="m-l-sm"><i class="fa fa-comment-o icon-muted"></i> 3 comments</a>
                            </div>
                        </div>
                    </div>
                    {{-- /.panel --}}
                </div>
                {{-- /.col-sm-8 --}}
                @if (isset($disqus))
                    <h4 class="m-t-lg m-b">3 Comments</h4>
                    <section class="comment-list block">
                        <article id="comment-id-1" class="comment-item">
                            <a class="pull-left thumb-sm">
                                <img src="images/a0.png" class="img-circle">
                            </a>
                            <section class="comment-body m-b">
                                <header>
                                  <a href="#"><strong>John smith</strong></a>
                                  <label class="label bg-info m-l-xs">Editor</label>
                                  <span class="text-muted text-xs block m-t-xs">
                                    24 minutes ago
                                  </span>
                                </header>
                                <div class="m-t-sm">{{ trans('main.comments') }}</div>
                                <div id="disqus_thread"></div>
                            </section>
                            @include('Titles.Partials.Disqus')
                        </article>
                    </section>
                    {{-- /section.comment-list.block--}}
                @endif
            </div>
            {{-- /.row --}}
        </section>
        {{-- /section.scrollable.wrapper-lg --}}
	</section>
	{{-- /section.vbox --}}
	
	<div class="push"></div>

@stop