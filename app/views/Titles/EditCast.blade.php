@extends('Main.Boilerplate')

@section('title')
	<title> {{ trans('main.edit cast info')}} - {{ trans('main.brand') }} </title>
@stop

@section('bodytag')
	<body data-url="{{ url('private') }}">
@stop

@section('content')

    <section class="hbox stretch">
        <section>
            <section class="vbox">
                <section class="scrollable padder-lg" id="bjax-target">
                    <div class="row row-sm">
                    
                    <h3 class="heading">{{ trans('main.edit cast', array('title' => $title->title)) }} <i class="fa fa-pencil"></i></h3 class="heading">
                    
                    <p> {{ trans('main.edit cast expl') }} </p>
                    
                    <div class="row">@include('Partials.Response')</div>
                    
                    <p> <i class="fa fa-paperclip"></i> {{ trans('main.attach new ac combo', array('title' => $title->title)) }}</p>
                    
                    <div class="row">
                        {{ Form::open(array('url' => array('private/add-cast'), 'id' => 'cast')) }}

                            <div class="form-group" id="actor-form">
                              {{ Form::label('actor', trans('main.actor')) }}
                              {{ Form::text('actor', null, array('class' => 'form-control', 'id' => 'auto-complete-cast', 'data-url' => url('typeahead-actor'))) }}
                              {{ Form::hidden('title-id', $title->id)}}
                            </div>

                            <div class="form-group">
                              {{ Form::label('char', trans('main.char')) }}
                              {{ Form::text('char', null, array('class' => 'form-control')) }}
                            </div>

                            <a type="button" href='{{ Helpers::url( $title->title, $title->id, $title->type ) }}' class="btn btn-success btn-sm">
                              <i class="fa fa-arrow-left"></i> {{ trans('main.back') }}
                            </a>
                            <button type="submit" id ="submit" class="btn btn-warning btn-sm">{{ trans('main.add') }}</button>

                        {{ Form::close() }}
                    </div>
                    <br>
                    <div class="row">
                        @if ( ! $title->actor->isEmpty() )
                            @include('Titles.Partials.EditCastTable', compact('title'))
                       @endif
                    </div>
                    
                    <div class="push"></div>
                    
                    </div>
                </section> <!-- /section#bjax-targtet.scrollable.padder-lg -->
            </section> <!-- /section.vbox -->
        </section> <!-- /section -->
    </section> <!-- /section.hbox.stretch -->

@stop

@section('ads')
@stop

@section('scripts')

  {{ HTML::script('assets/js/editcast-autocomplete.js') }}

@stop
