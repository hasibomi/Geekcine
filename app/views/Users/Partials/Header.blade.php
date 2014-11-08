<div class="row"> @include('Partials.Response') </div>

<header class="header bg-light lt">
    <ul class="nav nav-tabs nav-white">
        <li class="{{ ! Request::segment(3) ? 'active' : '' }}"><a href="{{ Helpers::url($user->username, $user->id, 'users') }}">{{ trans('users.watchlist') }}</a></li>
        <li class="{{ Request::segment(3) == 'favorites' ? 'active' : '' }}"><a href="{{ Helpers::url($user->username, $user->id, 'users') . '/favorites' }}">{{ trans('users.favorites') }}</a></li>
        <li class="{{ Request::segment(3) == 'reviews' ? 'active' : '' }}"><a href="{{ Helpers::url($user->username, $user->id, 'users') .'/reviews' }}">{{ trans('users.reviews') }}</a></li>
        @if(Helpers::isUser($user->username))
            <li class="{{ Request::segment(3) == 'settings' ? 'active' : '' }}"><a href="{{ Helpers::url($user->username, $user->id, 'users') . '/settings' }}">{{ trans('users.settings') }}</a></li>
        @endif
        <li class="{{ Request::segment(3) == 'friends' ? 'active' : '' }}"><a href="{{ Helpers::url($user->username, $user->id, 'users') .'/friends' }}">{{ trans('users.friend list') }}</a></li>
    </ul>
</header>