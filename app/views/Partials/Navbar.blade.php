<section class="w-f-md scrollable">
  <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">

    <!-- nav -->                 
    <nav class="nav-primary">
      <ul class="nav bg clearfix">
        <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
          Discover
        </li>
        <li>
          <a href="{{ url(Str::slug(trans('main.movies'))) }}">
            <i class="icon-film icon text-primary"></i>
            <span class="font-bold">{{ trans('main.movies-menu') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ url(Str::slug(trans('main.series'))) }}">
            <i class="icon-screen-desktop icon text-info"></i>
            <span class="font-bold">{{ trans('main.series-menu') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ url(Str::slug(trans('main.news'))) }}">
            <i class="icon-drawer icon text-primary-lter"></i>
            <span class="font-bold">{{ trans('main.news-menu') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ url(Str::slug(trans('main.people'))) }}">
            <i class="fa fa-star text-success-dker"></i>
            <span class="font-bold">{{ trans('main.people-menu') }}</span>
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

                <span>{{ trans('users.profile') }}</span>
              </a>
            </li>
            @endif
            <li >
              <a href="disclaimer" class="auto">                                                        
                <i class="fa fa-angle-right text-xs"></i>

                <span>Timeline</span>
              </a>
            </li>
            <li >
              <a href="privacy" class="auto">                                                        
                <i class="fa fa-angle-right text-xs"></i>
                <span>Privacy Policy</span>
              </a>
            </li>
            <li>
              <a href="tos" class="auto">
                <i class="fa fa-angle-right text-xs"></i>
                <span>Terms Of Service</span>
              </a>
            </li>
            <li>
              <a href="contact" class="auto">
                <i class="fa fa-angle-right text-xs"></i>
                <span>Contact Us</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- / nav -->
  </div>
</section>