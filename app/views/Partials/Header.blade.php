<header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
    <div class="navbar-header aside bg-info dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
            <i class="icon-list"></i>
        </a>
        <a href="/" class="navbar-brand text-lt">
            <img src="{{ asset('assets/images/K1TFYQqZG9jHHHpXaNOp.png') }}" alt="." style="width: 80%; margin: auto;">
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
            <i class="icon-settings"></i>
        </a>
    </div>
    <ul class="nav navbar-nav hidden-xs">
        <li>
            <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
                <i class="fa fa-indent text"></i>
                <i class="fa fa-dedent text-active"></i>
            </a>
        </li>
    </ul>
    
    {{ Form::open(array('url' => Str::slug(trans('main.search')), 'method' => 'GET', 'class'=>'navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs', 'role'=>'search')) }}
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
                </span>
                {{ Form::text('q', null, array('id' => 'auto-complete', 'class' => 'form-control input-sm no-border rounded', 'placeholder' => trans('main.search placeholder'), 'data-url' => url('typeahead'))) }}
            </div>
        </div>
    {{ Form::close() }}
    
    <div class="navbar-right ">
        <ul class="nav navbar-nav m-n hidden-xs nav-user user">
            
            @if( ! Sentry::check())
                <li><a href="/login">Login <i class="icon icon-login"></i></a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
                        <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                            <img src="{{ Helpers::smallAvatar() }}" alt="...">
                        </span>
                        {{{ Helpers::loggedInUser()->first_name ? Helpers::loggedInUser()->first_name : Helpers::loggedInUser()->username }}} <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight">
                        <li>
                            <a href="{{ Helpers::profileUrl() }}">Profile</a>
                        </li>
                        <li>
                            <a href="#">
                            <span class="badge bg-danger pull-right">3</span>
                            Notifications
                        </a>
                        </li>
                        <li>
                            <a href="docs.html">Help</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ action('SessionController@logOut') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    <!-- /.navbar-right -->
</header>