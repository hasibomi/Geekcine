@extends('Main.Boilerplate')

@section('title')
	<title> {{  trans('users.profile details') . ' - ' . trans('main.brand') }}</title>
	<link rel="stylesheet" href="{{ asset("assets/css/jquery.Jcrop.min.css") }}">
@stop

@section('bodytag')
	<body id="edit">
@stop

@section('content')
<section class="hbox stretch">
	    <section>
	    	
	        <section class="vbox">
	          <section class="scrollable padder-lg" id="bjax-target">

    <div class="col-sm-12">
      <h3 class="heading">{{ trans('users.edit user heading') }} <i class="fa fa-pencil"></i></h3>

      <p class="padding-top-bot"> {{ trans('users.edit user expl') }} <a href="{{ Helpers::url($user->username, $user->id, 'users') . '/change-password' }}">{{ trans('main.here') }}</a></p>
    </div>
    
    <br>

    <div class="row"> @include('Partials.Response') </div>

    <section class="col-sm-12 users-upload-box">
      
      <img width="100px" height="100px" src="{{{ $user->avatar ? asset($user->avatar) : asset('assets/images/no_user_icon_big.jpg') }}}" alt="{{{ $user->username . trans('users.avatar') }}}" class="img-responsive thumb">
      
      <br>
      <br>

      {{ Form::open(array('route' => array('users.avatar', $user->id), 'files' => true)) }}

        <div class="form-group">
          {{ Form::file('avatar') }}
          {{ $errors->first('avatar', '<span class="help-block alert alert-danger">:message</span>') }}
          <span class="help-block">*{{ trans('users.avatar expl') }}</span>
        </div>

        <button type="submit" class="btn btn-success">{{ trans('users.upload') }}</button>

      {{ Form::close() }}
      
      <br>
	  
	  <p>Previous background : </p>
	  
	  <img src="{{{ $user->background ? asset($user->background) : asset('assets/images/ronin.jpg') }}}" alt="{{{ $user->username . trans('users.avatar') }}}" id="image">
	  
	  @if($user->background)
		{{ Form::open(["url" => "crop/" . $user->id]) }}
		  {{ Form::hidden("image", $user->background) }}
		  {{ Form::hidden("x") }}
		  {{ Form::hidden("y") }}
		  {{ Form::hidden("w") }}
		  {{ Form::hidden("h") }}
		  <br />
		  {{ Form::submit("Crop") }}
		{{ Form::close() }}
	  
	  
	  <p>Current background : </p>
	  <img src="{{{ asset($user->new_background) }}}" alt="{{{ $user->username . trans('users.avatar') }}}">
	  
	  @endif
      
      <br>
      <br>

       {{ Form::open(array('route' => array('users.bg', $user->id), 'files' => true)) }}
	   
        <div class="form-group">
          {{ Form::file('bg') }}
          {{ $errors->first('bg', '<span class="help-block alert alert-danger">:message</span>') }}
          <span class="help-block">*{{ trans('main.user bg expl') }}</span>
        </div>
	   
		<div class="form-group">
			<button type="submit" class="btn btn-success">{{ trans('users.upload') }}</button>
		</div>

      {{ Form::close() }}

    </section>

    <div class="col-sm-12">
      {{ Form::model($user, array('route' => array(Str::slug(trans('main.users')).'.update', $user->username), 'method' => 'PUT')) }}
        
        <div class="form-group">
          {{ Form::label('first_name', trans('users.first name')) }}
          {{ Form::text('first_name', Input::old('first_name'), array('class' => 'form-control')) }}
          {{ $errors->first('first_name', '<span class="help-block alert alert-danger">:message</span>') }}
        </div>

        <div class="form-group">
          {{ Form::label('last_name', trans('users.last name')) }}
          {{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-control')) }}
          {{ $errors->first('last_name', '<span class="help-block alert alert-danger">:message</span>') }}
        </div>   

        <div class="form-group">
          {{ Form::label('gender', trans('users.gender')) }}
          {{  Form::select('gender', array('male' => trans('main.male'), 'female' => trans('main.female')), $user->gender, array('class' => 'form-control')) }}
          {{ $errors->first('gender', '<span class="help-block alert alert-danger">:message</span>') }}
        </div>

        <div class="form-group">
            
            <div class="row"> {{ Form::label('birthday', 'Birthday') }} </div>
            
            <div class="row">
                <div class="col-md-2">
                    {{  Form::select('month', array('--Month--' => '--Month--', 'January' => 'January', 'February' => 'February', 'March'=>'March','April'=>'April','May'=>'May','June'=>'June','July'=>'July','August'=>'August','September'=>'September','October'=>'October','November'=>'November','December'=>'December'), $user->month, array('class' => 'form-control')) }}
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="day">

                        @if ($user->day != 0)
                            <option>{{ $user->day }}</option>
                            <option>--Day--</option>

                            @for ($d=01;$d<=31;$d++)
                                <option>{{ $d }}</option>
                            @endfor
                        @else
                            <option>--Day--</option>

                            @for ($d=01;$d<=31;$d++)
                                <option>{{ $d }}</option>
                            @endfor
                        @endif
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="year">

                        @if ($user->year != 0)
                            <option>{{ $user->year }}</option>
                            <option>--Year--</option>

                            @for ($y=1930;$y<=date('Y');$y++)
                                <option>{{ $y }}</option>
                            @endfor
                        @else
                            <option>--Year--</option>

                            @for ($y=1930;$y<=date('Y');$y++)
                                <option>{{ $y }}</option>
                            @endfor
                        @endif
                    </select>
                </div>
            </div>
          	
        </div>
      
        <div class="form-group">
            {{ $errors->first('month', '<span class="help-block alert alert-danger">:message</span>') }}
            {{ $errors->first('day', '<span class="help-block alert alert-danger">:message</span>') }}
            {{ $errors->first('year', '<span class="help-block alert alert-danger">:message</span>') }}
        </div>

        <div class="form-group">
			{{ Form::label('address', 'Address') }}
          	{{  Form::textarea('address', Input::old('address'), array('class' => 'form-control')) }}
          	{{ $errors->first('address', '<span class="help-block alert alert-danger">:message</span>') }}
        </div>

        <div class="form-group">
			{{ Form::label('information', 'Info') }}
          	{{  Form::textarea('information', Input::old('information'), array('class' => 'form-control')) }}
          	{{ $errors->first('information', '<span class="help-block alert alert-danger">:message</span>') }}
        </div>

       

          <a type="button" href="{{ Helpers::url($user->username, $user->id, 'users') }}" class="btn btn-warning">
            <i class="fa fa-arrow-left"></i> {{ trans('main.back') }}
          </a>

          <button type="submit" class="btn btn-success">{{ trans('dash.update') }}</button>
         
      {{ Form::close() }}
      
      <br><br>
    </div>

  <div class="push"></div>

</section></section></section></section>

	@section("scripts")
		{{ HTML::script("assets/js/jquery.Jcrop.min.js") }}
		
		<script type="text/javascript">
			$("#image").Jcrop({
				onSelect: function(crop) {
					$("input[name=x]").val(crop.x);
					$("input[name=y]").val(crop.y);
					$("input[name=w]").val(crop.w);
					$("input[name=h]").val(crop.h);
					
					console.log(crop);
				}
			});
		</script>
	@stop

@stop