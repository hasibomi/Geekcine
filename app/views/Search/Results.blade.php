@extends('Main.Boilerplate')

@section('bodytag')
<body>
@stop

@section('content')

<section class="hbox stretch">
    <section>
        <section class="vbox">
            <section class="scrollable padder-lg" id="bjax-target">
                <div class="row row-sm">
                    <br />

                    <i class="fa fa-search"></i> {{ trans('main.top matches for') }} <strong>{{{ $term }}}</strong>

                    <br />
                    <br />

                    <section class="panel panel-default">
                        <header class="panel-heading bg-light">
                            <ul class="nav-tabs nav">
                                <li><a id="trigger" href="#movies" class="btn" data-toggle="tab"><i class="fa visible-xs fa-users"></i><span class="hidden-xs">{{ trans('main.movies') }}</span></a></li>
						    <li><a id="trigger2" href="#series" class="btn" data-toggle="tab"><i class="fa visible-xs fa-thumbs-up"></i><span class="hidden-xs">{{ trans('main.series') }}</span></a></li>			
						    <li><a id="trigger3" href="#people" class="btn no-bord-right" data-toggle="tab"><i class="fa fa-video-camera visible-xs"></i><span class="hidden-xs">{{ trans('main.people') }}</span></a></li>
						    <li><a href="#news" class="btn no-bord-right" data-toggle="tab"><i class="fa fa-video-camera visible-xs"></i><span class="hidden-xs">{{ trans('main.news') }}</span></a></li>
                            </ul>
                        </header>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="movies">
                                <br />
                                <div style="margin-left:10px;">
                                    @include('Search.MoviesGrid')
                                </div>
                            </div>

                            <div class="tab-pane fade" id="series">
                                <br />
                                <div style="margin-left:10px;">
                                    @include('Search.SeriesGrid')
                                </div>
                            </div>

                            <div class="tab-pane fade" id="people">
                                <br />
                                <div style="margin-left:10px;">
                                    @include('Search.PeopleGrid')
                                </div>
                            </div>

                            <div class="tab-pane fade" id="news">
                                <br />
                                <div style="margin-left:10px;">
                                    @include('Search.NewsResults')
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
		</section>
	</section>
</section>

@stop
