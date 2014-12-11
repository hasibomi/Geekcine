<header class="header bg-light lt">
    <ul class="nav nav-tabs nav-white">
        <li style="margin-right: 11%;" class="{{ ! Request::segment(3) ? 'active' : '' }}"><a href="{{ Helpers::url($user->username, $user->id, 'users') }}">{{ trans('users.watchlist') }}</a></li>
        <li style="margin-right: 11%;" class="{{ Request::segment(3) == 'favorites' ? 'active' : '' }}"><a href="{{ Helpers::url($user->username, $user->id, 'users') . '/favorites' }}">{{ trans('users.favorites') }}</a></li>
        <li style="margin-right: 11%;" class="{{ Request::segment(3) == 'reviews' ? 'active' : '' }}"><a href="{{ Helpers::url($user->username, $user->id, 'users') .'/reviews' }}">{{ trans('users.reviews') }}</a></li>
        
        <li style="margin-right: 11%;" class="{{ Request::segment(3) == 'friends' ? 'active' : '' }}"><a href="{{ Helpers::url($user->username, $user->id, 'users') .'/friends' }}">{{ trans('users.friend list') }}</a></li>
		
		@if(Helpers::isUser($user->username))
	        <li class="dropdown">
	        	<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	        		<span class="fa fa-bars"></span> 
	        		More
	        	</a>
	        	<ul class="dropdown-menu" role="menu">
	        		<li><a href="{{ Helpers::url($user->username, $user->id, 'users') . '/settings' }}">{{ trans('users.settings') }}</a></li>
	        	</ul>
	    	</li>
    	@endif
    </ul>
</header>

