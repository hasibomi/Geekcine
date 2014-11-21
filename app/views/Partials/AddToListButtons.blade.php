<div class="bottom padder m-b-sm">

@if ( $user = Helpers::loggedInUser())
	@if( ! isset($watchlist[$r->id]))

		{{ Form::open(array('action' => 'ListsController@postAdd', 'class' => 'lists-form')) }}

			{{ Form::hidden('user', $user->id) }}
			{{ Form::hidden('title', $r->id) }}
			{{ Form::hidden('list', 'watchlist') }}
            
            
            	<button data-user="{{{ $user->id }}}" data-title="{{{ $r->id }}}" type="submit" title="{{ trans('main.add to watchlist') }}" class="btn btn-danger btn-xs lists pull-right"><i class="fa fa-plus-circle"></i></button>
            

		{{ Form::close() }}

	@else

		{{ Form::open(array('action' => 'ListsController@postRemove', 'class' => 'lists-form')) }}

		  {{ Form::hidden('user', $user->id) }}
		  {{ Form::hidden('title', $r->id) }}
		  {{ Form::hidden('list', 'watchlist') }}

		  	<button type="submit" title="{{ trans('main.remove from watchlist') }}" data-user="{{{ $user->id }}}" data-title="{{{ $r->id }}}" class="btn btn-success btn-xs lists watchlisted pull-right"><i class="fa fa-plus-circle"></i></button>
          

		{{ Form::close() }}

	@endif

	@if ( ! isset($favorites[$r->id]))

		{{ Form::open(array('action' => 'ListsController@postAdd', 'class' => 'lists-form')) }}

			{{ Form::hidden('user', $user->id) }}
			{{ Form::hidden('title', $r->id) }}
			{{ Form::hidden('list', 'favorite') }}
		  
		  		<button  type="submit" data-user="{{{ $user->id }}}" data-title="{{{ $r->id }}}" title="{{ trans('main.add to favorites') }}" class="btn btn-danger btn-xs lists"><i class="fa fa-heart-o"></i> </button>

		{{Form::close()}}

	@else

		{{ Form::open(array('action' => 'ListsController@postRemove', 'class' => 'lists-form')) }}

		  {{ Form::hidden('user', $user->id) }}
		  {{ Form::hidden('title', $r->id) }}
		  {{ Form::hidden('list', 'favorite') }}

		  	<button type="submit" title="{{ trans('main.remove from favorites') }}" data-user="{{{ $user->id }}}" data-title="{{{ $r->id }}}" class="btn btn-success btn-xs lists watchlisted"><i class="fa fa-heart-o"></i></button>

		{{ Form::close() }}


	@endif

@else

	<a href="{{ url('login') }}" title="{{ trans('main.add to watchlist') }}" class="pull-right"><i class="fa fa-plus"></i> </a>
	<a href="{{ url('login') }}" title="{{ trans('main.add to favorites') }}"><i class="fa fa-heart"></i> </a>

@endif
</div> <!-- /.bottom.padder.m-b-sm -->