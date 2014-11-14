@extends('Main.Boilerplate')

@section('title')
	<title> {{ trans('main.editing title images') }} - {{ trans('main.brand') }} </title>
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
                    
                    <div class="row">@include('Partials.Response')</div>
                    
                    <h3 class="heading">{{ trans('main.upload an image') }} <i class="fa fa-cloud-upload"></i></h3>
                    
                    <div class="row">
                        {{ Form::open(array('url' => 'private/upload-image', 'files' => true)) }}

                            <div class="form-group">
                              {{ Form::file('image') }}
                              {{ Form::hidden('title-id', $title['id']) }}
                            </div>

                            <button type="submit" class="btn btn-success">{{ trans('users.upload') }}</button>
                            
                            <div class="row">
                              {{ $errors->first('image', '<span class="help-block alert alert-danger">:message</span>') }}
                            </div>
                        {{ Form::close() }}
                    </div>
                    
                    <h3 class="heading">{{ trans('main.enter image url') }} <i class="fa fa-pencil"></i></h3 class="heading">
                    
                    <div class="row">
                        {{ Form::open(array('url' => 'private/attach-image')) }}

                            <div class="form-group">
                              {{ Form::label('image-url', trans('main.image url')) }}
                              {{ Form::text('image-url', null, array('class' => 'form-control')) }}
                              {{ Form::hidden('title-id', $title['id']) }}
                            </div>

                            <button type="submit" class="btn btn-success">{{ trans('main.attach') }}</button>

                        {{ Form::close() }}
                    </div>
                    
                    <h3 class="heading">{{ trans('main.delete existing images') }} <i class="fa fa-edit"></i></h3 class="heading">
                    
                    <div class="row">
                        @if ($title->image)
                            @foreach ($title->image as $k => $img)
                                <div class="col-sm-6 col-md-3 col-lg-4">
                                    <div class="item">
                                        <div class="pos-rlt">
                                            <img src="{{ isset($img->web) ? $img->web : asset($img->local) }}" alt="" class="img-responsive">
                                        </div> <!-- /.pos-rlt -->
                                        <div class="padder-v">
                                            {{ trans('main.image') . " #$k"}}

                                            {{ Form::open(array('url' => 'private/detach-image', 'class' => 'trash-ico pull-right')) }}
                                                {{ Form::hidden('title-id', $title['id']) }}
                                                {{ Form::hidden('image-id', $img['id']) }}
                                                <button type = "submit" title="{{ trans('dash.remove') }}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> </button> 
                                            {{ Form::close() }}
                                        </div>
                                    </div> <!-- /.item -->
                                </div>
                            @endforeach
                        @endif
                    </div>
                    
                    <div class="row">
                        <a href='{{ Helpers::url($title->title, $title->id, $title->type) }}' class="back-btn btn btn-success btn-sm">
                            <i class="fa fa-arrow-left"></i> {{ trans('main.back') }}
                        </a>
                    </div>
                    
                    <div class="push"></div>
                    
                </div> <!-- /.row.row-sm -->                                
            </section> <!-- /section#bjax-target.scrollable.padder-lg -->
        </section> <!-- /section.vbox -->
    </section> <!-- /section -->
</section> <!-- /section.hbox.stretch -->

@stop

@section('ads')
@stop

@section('scripts')

    {{ HTML::script('assets/js/editcast-autocomplete.js') }}

@stop