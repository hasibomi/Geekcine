@if ( ! $data->getSeasons($num)->episode->isEmpty())

    @if (Helpers::hasAccess('titles.create'))
        <div class="row">
            <div class="col-md-4"></div>
            <a class="btn btn-primary pull-left" style="margin-left: 5%" href='{{ url("series/" . $data->getId() . "/seasons/$num/episodes/create") }}'>{{ trans('main.create new epi') }}</a>
        </div>
        <br>
    @endif

@foreach($data->getSeasons($num)->episode as $k => $v)
    <div class="row">
        <div class="media col-sm-12">
            <div class="col-sm-5">
                <img src="{{{ $v->poster ? asset($v->poster) : asset($data->getPoster()) }}}" alt="{{ 'Poster of ' . $v->title }}" class="media-object img-responsive">
                <span class="row grey-out">{{ trans('main.release date') }}: {{{ $v->release_date }}} </span>
            </div>
        
            <div class="media-body col-sm-7">
                <span class="h3">{{ trans('main.episode') }} {{{ $v->episode_number }}} - {{ $v->title }}</span>
                
                @if ($v->promo)

                    <button class="promo-trigger btn btn-warning" data-trailer="{{ $v['promo'] }}" data-toggle="modal">
                      <i class="fa fa-play"></i> {{ trans('main.watch promo') }}
                    </button>

                    <div id="promo-modal-box"></div>
                @endif

                <p>
                    @if (Helpers::hasAccess('titles.delete'))
                        {{ Form::open(array('url' => Str::slug(trans('main.series')) . '/' . $data->getId() . "/seasons/$num/episodes/{$v->id}", 'method' => 'delete', 'class' => 'delete-form', 'style' => 'float: left')) }}
                            <button style="float: left;" type="submit" title="{{ trans('main.delete') }}" class="btn btn-info btn-sm"><i class="fa fa-trash-o"></i> {{ trans('main.delete ep') }}</button>
                        {{ Form::close() }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    @endif
                     @if (Helpers::hasAccess('titles.edit'))
                        @include('Titles.Partials.EditEpisodeModal')
                    @endif
                </p>

                <p>
                    @if(Sentry::check())
                    <button type="button" class="btn btn-warning btn-add-episode-link btn-sm" data-title_id="{{$v->title_id}}" data-episode_id="{{$v->id}}"
                        data-episode_number="{{$v->episode_number}}" data-season_number="{{$num}}">
                        <i class="fa fa-plus-square"></i>{{trans('main.add link')}}
                    </button>
                    @endif
                </p>
                <br>
                <p>{{ $v->plot }}</p>
            </div>{{--media-body--}}

        </div>{{--media--}}
    </div>
    <hr>
@endforeach

<style type="text/css">
    .episode-link, .episode-link:hover {
        background-color: #E9E9E8; 
		color: #4D4D4D;
        font-weight: bold;		
		border-color: #EDEDED;
		box-shadow: 0px 0px 5px 0px rgba(119, 119, 119, 0.54);
        -moz-box-shadow: 0px 0px 5px 0px rgba(119, 119, 119, 0.54);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(119, 119, 119, 0.54);
        box-shadow: inset 0px 0px 5px 0px rgba(119, 119, 119, 0.54);
        -moz-box-shadow: inset 0px 0px 5px 0px rgba(119, 119, 119, 0.54);
        -webkit-box-shadow: inset 0px 0px 5px 0px rgba(119, 119, 119, 0.54);

    }
</style>

<div class="modal fade" id="add-episode-link-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" aria-hidden="true" data-dismiss="modal" type="button"></button>
                <h4 class="modal-title"><strong>Add New Link</strong></h4>
            </div>
            <div class="modal-body row form-horizontal">
                <div class="col-md-7">
                    <div class="fixed-height">
                        <div class="alert alert-success hidden">Success</div>
                        <div class="alert alert-danger hidden"></div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('serie-title', 'TV Show', array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-8">
                            <input type="text" readonly value="{{$data->getTitle()}}" class="form-control" id="serie-title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('link-language', 'Language', array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-8">
                            <?php
                                $options = array();
                                foreach($languages as $lang) {
                                    $options[$lang->id] = $lang->name;
                                }
                            ?>
                            {{ Form::select('link-language', $options, null, array('class' => 'form-control'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('link-quality', 'Quality', array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-8">
                            <?php
                                $options = array('dvd'=>'DVD', 'hd'=>'HD');
                            ?>
                            {{ Form::select('link-quality', $options, null, array('class' => 'form-control'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('s_num', 'Season', array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-3">
                            {{ Form::text('season_number', null, array('class' => 'form-control', 'id' => 's_num', 'readonly'))}}
                        </div>

                        {{ Form::label('e_num', 'Episode', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-3">
                            {{ Form::text('episode_number', null, array('class' => 'form-control', 'id' => 'e_num', 'readonly'))}}
                            {{ Form::hidden('title_id', null, array('id' => 'title_id'))}}
                            {{ Form::hidden('episode_id', null, array('id' => 'episode_id'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('link-url', 'New Link', array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-8">
                            {{ Form::text('link-url', null, array('class' => 'form-control'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('captcha', 'Captcha', array('class' => 'col-md-4 control-label')) }}
                        <div class="col-md-8">
                            {{ Form::text('captcha', null, array('class' => 'form-control', 'id' => 'captcha'))}}
                            <a href="javascript:void(0)" id="reload-captcha">Reload captcha</a>
                            <img id="captcha-img" width="100%" />
                            {{ Form::hidden('captcha_id', null, array('id' => 'captcha-id'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger col-md-4" id="add-episode-link" data-loading-text="Adding...">Add Link</button>
                    </div>
                </div>
                <div class="col-md-5">
                    @include('Partials.AddLinkTerm')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="play-episode-link-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="modal-close" aria-hidden="true" data-dismiss="modal" type="button"></button>
                <h4 class="modal-title">
                    <strong>
                        Episode
                        <span id="episode-number"></span> - 
                        Link
                        <span id="link-number"></span>
                    </strong>
                    <span id="reported" class="pull-right">
                        <input type="hidden" id="link-id">
                        <a href="javascript:void(0)" id="report">
                            <img src="{{url('assets/images/report_link.png')}}" width="24" />
                            Dead Link
                        </a>
                        (<span id="reported-number"></span>)
                    </span>
                </h4>
            </div>
            <div class="modal-body row">
                <p id="movie-iframe"></p>
                <p>
                    <span class="pull-left">
                        <strong>Added by:</strong> <a id="username"></a>
                    </span>
                    <span class="pull-right">
                        <strong><span id="views"></span> Views</strong>

                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

@else
    <div><h3 class="reviews-not-released"><i class="fa fa-exclamation-triangle"></i> {{ trans('main.no episodes') }}</h3></div>
@endif