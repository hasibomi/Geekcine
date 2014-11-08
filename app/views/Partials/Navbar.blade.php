<section class="w-f-md scrollable">
  <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">

    <!-- nav -->                 
    <nav class="nav-primary">
      <ul class="nav bg clearfix">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
          Discover
        </li>
        @if(Helpers::hasAccess('super'))
            @if (isset($options->options['logo']) && Str::length($options->options['logo']) > 4)
                <li><a href="{{ url('dashboard') }}">{{ trans('dash.dash') }}</a></li>
            @else
                <li><a href="{{ url('dashboard') }}">{{ trans('main.dashboard') }}</a></li>
            @endif
        @endif
        <li>
          <a href="/movies">
            <i class="icon-film icon text-primary"></i>
            <span class="font-bold">Movie</span>
          </a>
        </li>
        <li>
          <a href="/series">
            <i class="icon-screen-desktop icon text-info"></i>
            <span class="font-bold">Series</span>
          </a>
        </li>
        <li>
          <a href="/news">
            <i class="icon-drawer icon text-primary-lter"></i>
            <span class="font-bold">News</span>
          </a>
        </li>
        <li>
          <a href="/people">
            <i class="icon-list icon  text-success-dker"></i>
            <span class="font-bold">People</span>
          </a>
        </li>
        <li class="m-b hidden-nav-xs"></li>
      </ul>
      <ul class="nav" data-ride="collapse">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
          Interface
        </li>
        <li >
          <a href="#" class="auto">
            <span class="pull-right text-muted">
              <i class="fa fa-angle-left text"></i>
              <i class="fa fa-angle-down text-active"></i>
            </span>
            <i class="icon-grid icon">
            </i>
            <span>Pages</span>
          </a>
          <ul class="nav dk text-sm">
          	@if ( Sentry::check() )
            <li >
              <a href="{{ Helpers::profileUrl() }}" class="auto">                                                        
                <i class="fa fa-angle-right text-xs"></i>

                <span>Profile</span>
              </a>
            </li>
            @endif
            <li >
              <a href="blog" class="auto">                                                        
                <i class="fa fa-angle-right text-xs"></i>

                <span>Timeline</span>
              </a>
            </li>
            <li >
              <a href="invoice" class="auto">                                                        
                <i class="fa fa-angle-right text-xs"></i>

                <span>Privacy Policy</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- / nav -->
  </div>
</section>