@extends('Main.Boilerplate')

@section('title')
	<title> {{  trans('main.edit')}} - {{{ $title->title }}} </title>
@stop

@section('bodytag')
	<body>
@stop

@section('content')

<section class="hbox stretch">
    <section>
        <section class="vbox">
            <section class="scrollable padder-lg" id="bjax-target">
                <div class="row row-sm">
                    
                    <h3 class="heading">
                        {{ trans('main.edit title heading', array('title' => $title->title)) }} <i class="fa fa-pencil"></i>
                    </h3>
                    
                    <p class="padding-top-bot"> {{ trans('main.edit title expl') }} </p>
                    
                    <div class="row"> @include('Partials.Response') </div>
                    
                    <div class="row">
                        {{ Form::model($title, array('route' => array(Str::slug(trans("main.$type")) . '.update', $title->id), 'method' => 'PUT')) }}
          
                            @include('Titles.Partials.CreateEditForm')

                              <a type="button" href="{{ url(Str::slug(trans("main.$type")) . '/' . Request::segment(2)) }}" class="btn btn-warning">
                                <i class="fa fa-arrow-left"></i> {{ trans('main.back') }}
                              </a>

                              <button type="submit" class="btn btn-success">{{ trans('dash.update') }}</button>

                        {{ Form::close() }}
                        
                        <br>
                    </div>
                    
                </div> <!-- /.row-sm -->
            </section> <!-- /section#bjax-target.scrollable.padder-lg -->
        </section> <!-- /section.vbox -->
    </section> <!-- /section -->
</section> <!-- /section.hbox.stretch -->

@stop

@section('ads')
@stop