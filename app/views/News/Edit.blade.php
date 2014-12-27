@extends('Main.Boilerplate')

@section('title')
	<title>{{ trans('dash.edit') }} {{ trans('main.news') }} - {{ trans('main.brand') }}</title>
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

@section('scripts')

	{{ HTML::script('assets/js/ckeditor/ckeditor.js') }}

	<script>

		//resize ckeditor by specified rows
		(function($) {
			jQuery.fn.cke_resize = function() {
			   return this.each(function() {
			      var $this = $(this);
			      var rows = $this.attr('rows');
			      var height = rows * 20;
			      $this.next("div.cke").find(".cke_contents").css("height", height);
			   });
			};
			})(jQuery);

			CKEDITOR.on( 'instanceReady', function(){
			  $("textarea.ckeditor").cke_resize();
		})

	</script>

@stop

@stop

@section('ads')
@stop