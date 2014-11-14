@extends('Main.Boilerplate')

@section('title')
	<title>{{ trans('dash.edit') }} {{ trans('main.news') }} - {{ trans('main.brand') }}</title>
@stop

@section('assets')
	@parent

	{{ HTML::script('assets/js/ckeditor/ckeditor.js') }}
@stop

@section('bodytag')
	<body id="edit">
@stop

@section('content')
	
<section class="hbox stretch">
    <section>
        <section class="vbox">
            <section class="scrollable padder-lg">
                <div class="row row-sm">
                    
                    <div class="row">@include('Partials.Response')</div>
                    
                    <div class="row">
                        {{ Form::model($news, array('route' => array(Str::slug(trans('main.news')) . '.update', $news['id']), 'method' => 'put')) }}

                            <div class="row form-group">
                                {{ Form::label('title', trans('main.title') ) }}
                                {{ Form::text('title', null, array('class' => 'form-control')) }}
                                {{ $errors->first('title', '<span class="help-block alert alert-danger">:message</span>') }}
                            </div>

                            <div class="row form-group">
                                {{ Form::label('image', trans('main.image path') ) }}
                                {{ Form::text('image', null, array('class' => 'form-control')) }}
                                {{ $errors->first('image', '<span class="help-block alert alert-danger">:message</span>') }}
                            </div>

                            <div class="row form-group">
                                {{ Form::label('body', trans('main.body') ) }}
                                {{ Form::textarea('body', null, array('class' => 'ckeditor form-control', 'rows' => 40, 'cols' => 10)) }}
                                {{ $errors->first('body', '<span class="help-block alert alert-danger">:message</span>') }}
                            </div>

                            {{ Form::hidden('author', Helpers::loggedInUser()->username) }}

                            <button type="submit" class="btn btn-default">{{ trans('dash.update') }}</button>

                        {{ Form::close() }}
                        
                        <br>
                    </div>
                    
                    <div class="push"></div>
                    
                </div>
            </section>
        </section>
    </section>
</section>	

@stop

@section('ads')
@stop