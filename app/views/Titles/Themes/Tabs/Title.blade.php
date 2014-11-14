@extends('Main.Boilerplate')

@section('title')
  <title>{{{ $data->getTitle() }}} - {{ trans('main.brand') }}</title>
@stop

@section('assets')

  @parent
  
  <meta name="title" content="{{{ $data->getTitle() . ' - ' . trans('main.brand') }}}">
  <meta name="description" content="{{{ $data->getPlot() }}}">
  <meta name="keywords" content="{{ trans('main.meta title keywords') }}">
  <meta property="og:title" content="{{{ $data->getTitle() . ' - ' . trans('main.brand') }}}"/>
  <meta property="og:url" content="{{ Request::url() }}"/>
  <meta property="og:site_name" content="{{ trans('main.brand') }}"/>
  <meta property="og:image" content="{{str_replace('w342', 'original', asset($data->getPoster()))}}"/>

@stop

@section('bodytag')
	<body>
@stop

@section('content')

<section class="vbox">
    <section class="hbox stretch bg-black dker">
        <aside class="col-sm-5 no-padder" id="sidebar">
            <section class="vbox animated fadeInUp">
                <section class="scrollable">
                   @include('Partials.Response')
                    <div class="m-t-n-xxs item pos-rlt">
                        <div class="bottom gd bg-info wrapper-lg">
                               <h2>{{ $data->getTitle() }}</h2>
                        </div> {{-- /.bottom.gd.bg-info.wrapper-lg --}}
                        <img class="img-full" src="{{{ asset($data->getPoster()) }}}" alt="{{{ $data->getTitle() }}}" alt="...">
                    </div> {{-- /.m-t-n-xxs.item.pos-rlt --}}
                    
                    <div class="row">
                       <div class="col-md-12">
                            @if ($data->getTrailer())
                                <button type="button" class="btn btn-info trailer-trigger" data-trailer="{{{ $data->getTrailer() }}}">
                                    <span><i class="fa fa-play"></i> {{ trans('main.play trailer') }}</span>
                                </button>
                                <a target="_blank" href="{{{ $data->getBuyLink() }}}" class="btn btn-success trans-button">
                                    <span><i class="fa fa-money"></i> {{ trans('main.buy now') }}</span>
                                </a>
                            @endif
                            
                            @if ( Helpers::hasAccess('titles.edit') )
                              <div class="col-md-3">
                               <div class="dropdown">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                       <i class="fa fa-edit"></i> {{ trans('main.edit') }}
                                        <span class="caret"></span>
                                    </button>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupDrop1">
                                        <li><a href="{{ Helpers::url($data->getTitle(), $data->getid(), $data->getType()) . '/edit' }}">{{ trans('main.edit main') }}</a></li>
                                        <li><a href="{{ Helpers::url($data->getTitle(), $data->getid(), $data->getType()) . '/edit-cast' }}">{{ trans('dash.edit cast') }}</a></li>
                                        <li><a href="{{ Helpers::url($data->getTitle(), $data->getid(), $data->getType()) . '/edit-images' }}">{{ trans('main.edit images') }}</a></li>
                                        @if ($data->getType() == 'series')
                                          <li><a href="{{ Helpers::url($data->getTitle(), $data->getid(), 'series') . '/seasons/create' }}">{{ trans('main.edit seasons') }}</a></li>
                                        @endif
                                      </ul>
                                </div>
                            @endif
                            
                            </div>
                            
                            
                            <div class="col-md-12">
                               <br>
                               
                                {{ $data->getPlot(300) }}
                                
                                <br>
                            </div>
                            
                            <div class="col-md-12">

                               <h2>{{ trans('main.details') }}</h2>

                                @if ($directors = $data->getDirectors())

                                    <dt>{{ trans('main.directors') }}:</dt>
                                    <dd>
                                        @foreach($directors as $d)
                                            {{{ $d['name'] }}},
                                        @endforeach
                                    </dd>

                                @endif

                                @if ($writers = $data->getWriters())

                                    <dt>{{ trans('main.writing') }}:</dt>
                                    <dd>
                                        @foreach($writers as $w)
                                            {{{ $w['name'] }}},
                                        @endforeach
                                    </dd>


                                @endif

                            </div>
                            
                            <div class="col-md-12">
                                @if ($stars = array_slice($data->getCast(), 0, 3))

                                    <dt>{{ trans('main.stars') }}:</dt>
                                    <dd>
                                        @foreach($stars as $s)
                                            <a href="{{ Helpers::url($s['name'], $s['id'], 'people') }}">{{{ $s['name'] }}}</a>,
                                        @endforeach
                                    </dd>

                                @endif
                                
                                @if ($country = $data->getCountry())
                                    <div class="title-dt-group">
                                        <dt>{{ trans('main.country') }}:</dt>
                                        <dd>{{{ $country }}}</dd>               
                                    </div>
                                @endif

                                @if ($language = $data->getLanguage())
                                    <div class="title-dt-group">
                                        <dt>{{ trans('main.lang') }}:</dt>
                                        <dd>{{{ $language }}}</dd>              
                                    </div>
                                @endif

                                @if ($data->getRating())

                                    <h3>{{ trans('main.ratings') }}</h3>

                                @endif
                                
                                <div class="title-ratings">
                                    @if ($imdb = $data->getImdbRating())
                                        <dt>IMDb {{ trans('main.rating') }}:</dt>           
                                        <dd id="imdb-rate"><strong class="pull-right">({{ $imdb }}/10)</strong></dd>
                                    @endif          
                                </div>

                                <div class="title-ratings">
                                    @if ($mcUser = $data->getMcUserRate())
                                        <dt>Metacritic {{ trans('main.user') }}:</dt>           
                                        <dd id="mc-user-rate"><strong class="pull-right">({{ $mcUser }}/10)</strong></dd>
                                    @endif
                                </div>

                                <div class="title-ratings">
                                    @if ($mcCritic = $data->getMcCriticRate())
                                        <dt>Metacritic {{ trans('main.critic') }}:</dt>         
                                        <dd id="mc-critic-rate"><strong class="pull-right">({{ $mcCritic }}/10)</strong></dd>
                                    @endif
                                    <div class="raty"></div>
                                </div>

                                <div class="title-ratings">
                                    @if ($tmdb = $data->getTmdbRating() && Carbon\Carbon::parse($data->getReleaseDate()) < Carbon\Carbon::now()->toDateString())
                                        <dt>TMDB {{ trans('main.rating') }}:</dt>           
                                        <dd id="tmdb-rate"><strong class="pull-right">({{ $tmdb }}/10)</strong></dd>
                                    @endif
                                </div>

                                @if ($data->getBudget() || $data->getRevenue())
                                    <h3>{{ trans('main.box office') }}</h3>
                                @endif

                                @if ($budget = $data->getBudget())
                                    <div class="title-ratings">         
                                        <dt>{{ trans('main.budget') }}:</dt>            
                                        <dd><strong class="pull-right">{{ $budget }}</strong></dd>              
                                    </div>
                                @endif

                                @if ($revenue = $data->getRevenue())
                                    <div class="title-ratings">         
                                        <dt>{{ trans('main.revenue') }}:</dt>           
                                        <dd><strong class="pull-right">{{ $revenue }}</strong></dd>             
                                    </div>
                                @endif
                                
                                
                            </div>
                            
                        </div>
                    </div>
                    
                </section> {{-- /section.scrollable --}}
            </section> {{-- /section.vbox.animated.fadeInUp --}}
        </aside> {{-- /aside#sidebar.col-sm-5.no-padder --}}

        <section class="col-sm-4 no-padder bg">
            <section class="vbox">
                <section class="scrollable hover">
                    <div class="btn-group">
                        <ul class="nav-tabs nav">
                            @if(Request::segment(3) == 'seasons' && Request::segment(4))
                              <li class="active"><a href="#episodes" class="btn btn-default no-bord-left" data-toggle="tab">{{ trans('main.eps') }}</a></li>
                              <li><a href="#description" class="btn btn-default no-bord-left" data-toggle="tab"><i class="visible-xs fa fa-tasks"></i><span class="hidden-xs">{{ trans('main.description') }}</span></a></li>
                            @endif
                            <li class="active"><a id="trigger" href="#cast" class="btn btn-default" data-toggle="tab"><i class="fa visible-xs fa-users"></i>{{ trans('main.cast') }} &amp; {{ trans('main.crew') }}</a></li>
                            <li><a href="#reviews" class="btn btn-default" data-toggle="tab"><i class="fa visible-xs fa-thumbs-up"></i><span class="hidden-xs">{{ trans('main.reviews') }}</span></a></li>
                              @if(Request::segment(3) == 'seasons' && Request::segment(4) && Helpers::hasAccess('titles:edit'))
                              <li><a class="btn btn-default" href='{{ url(Str::slug(trans("main.series")) . "/" . $data->getId() . "/seasons/$num/episodes/create") }}'><i class="fa fa-video-camera visible-xs"></i><strong class="hidden-xs">{{ trans('main.create new epi') }}</strong></a></li>
                              @endif
                            <li><a id="trigger2" href="#similar" class="btn btn-default" data-toggle="tab"><i class="fa fa-video-camera visible-xs"></i><span class="hidden-xs">{{ trans('main.moviesseries') }}</span></a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="cast">
                                <br>
                                @include('Titles.Themes.Tabs.Cast')
                            </div>

                            <div class="tab-pane fade" id="reviews">
                                <br>
                                @include('Titles.Themes.Tabs.Reviews')
                            </div>

                            <div class="tab-pane fade" id="similar">
                                <br>
                                @include('Titles.Themes.Tabs.Similar')
                            </div>
                        </div> {{-- /.tab-content --}}
                    </div>
                </section> {{-- /sectrion.scrollable.hover --}}
            </section> {{-- /section.vbox --}}
        </section> {{-- /section.col-sm-4.no-padder.bg --}}

        <section class="col-sm-3 no-padder lt">
            <section class="vbox">
                <section class="scrollable hover">
                    <div class="m-t-n-xxs">
                        <div class="item pos-rlt">
                            
                        </div> {{-- /.item.pos-rlt --}}
                    </div> {{-- /.m-t-n-xxs --}}
                </section> {{-- /section.scrollable.hover --}}
            </section> {{-- /section.vbox --}}
        </section> {{-- /section.col-sm-3.no-padder.lt --}}

    </section> {{-- /section.hbox.stretch.bg-black.dker --}}
</section> {{-- /section.vbox --}}

@section('scripts')

<script>
    $(document).ready(function() {
        @if(Sentry::check() and $data->getType() == 'movie')
        // Open add link modal
        $('.btn-add-link').click(function() {
            $('#link-url, #captcha').val('');

            // Get captcha
            $.ajax({
                type: 'Get',
                url: '{{url("/getCaptcha")}}'
            }).done(function(response) {
                $('#captcha-img').attr('src', response.image);
                $('#captcha-id').val(response.captcha_id);
                $('#add-link-modal').modal('show');
            });
        });

        // Reload captcha
        $('#reload-captcha').click(function() {
            $.ajax({
                type: 'Get',
                url: '{{url("/getCaptcha")}}',
                beforeSend: function() {
                    $('#captcha-img').removeAttr('src');
                }
            }).done(function(response) {
                $('#captcha-img').attr('src', response.image);
                $('#captcha-id').val(response.captcha_id);
            });
        });

        $('#add-link').click(function() {
            var title_id = {{$data->getId()}},
                language_id = $('#link-language').val(),
                quality = $('#link-quality').val(),
                url = $('#link-url').val(),
                captcha = $('#captcha').val(),
                captcha_id = $('#captcha-id').val(),
                that = this;

            $.ajax({
                type: 'Post',
                url: '{{url("/links/add")}}',
                dataType: 'Json',
                data: {
                    title_id: title_id,
                    language_id: language_id,
                    quality: quality,
                    url: url,
                    captcha: captcha,
                    captcha_id: captcha_id
                },
                beforeSend: function() {
                    $('.alert').addClass('hidden');
                    $(that).button('loading');
                }
            }).done(function(response) {
                if(response.status == 'success') {
                    $('.alert-success').removeClass('hidden');
                    window.location.reload();
                } else if(response.status == 'error') {
                    var html = '';
                    for(key in response.error_msg) {
                        html += '<li>' + response.error_msg[key] + '</li>';
                    }

                    $('.alert-danger').html(html).removeClass('hidden');
                }
            }).always(function() {
                $(that).button('reset');
            });
        });

        $('#report').click(function() {
            var id = $('#link-id').val();

            $.ajax({
                type: 'Post',
                url: '{{url("links/report")}}',
                dataType: 'Json',
                data: {
                    id: id
                }
            }).done(function(response) {
                if(response.status == 'error') {
                    alert(response.error_msg);
                } else {
                    $('#reported-number').text(response.reported);
                    
                    if(response.reported == 20) {
                        window.location.reload();
                    }
                }
            });
        });
        @endif

        $('.movie-link').click(function() {
            var id = $(this).data('id'),
                username = $(this).data('username'),
                userpage = $(this).data('userpage');
            $.ajax({
                type: 'Get',
                url: '{{url()}}' + '/links/detail/' + id,
            }).done(function(response) {
                if(response.status == 'error') {
                    alert(response.error_msg);
                } else if(response.status == 'success') {
                    $('#movie-iframe').html(response.result.embed_code);
                    $('#username').attr('href', userpage).text(username);
                    $('#reported-number').text(response.result.reported);
                    $('#link-id').val(response.result.id);
                    $('#views').text(response.result.views);

                    $('#play-link-modal').modal('show');
                }
            });
        });
    });

(function ($){

  $('#imdb-rate').raty({
    readOnly: true, 
    score: '{{ $data->getImdbRating() }}', 
    path: '../assets/images',
    halfShow : true,
    number: 10,
    width: 260,
  });

  $('#mc-user-rate').raty({
    readOnly: true, 
    score: '{{ $data->getMcUserRate() }}', 
    path: '../assets/images',
    halfShow : true,
    number: 10,
    width: 260,
  });

  $('#tmdb-rate').raty({
    readOnly: true, 
    score: '{{ $data->getTmdbRating() }}', 
    path: '../assets/images',
    halfShow : true,
    number: 10,
    width: 260,
  });

   $('#mc-critic-rate').raty({
    readOnly: true, 
    score: '{{ $data->getMcCriticRate("convert") }}', 
    path: '../assets/images',
    halfShow : true,
    number: 10,
    width: 260,
  });

})(jQuery);

   //add 0 comments to jumbotron if not already there.
  (function ($){
   
    if ( ! $('.disqus-link').text().trim().length)
    {
      $(".disqus-link").text('0 {{ trans("main.comments") }}');
    }

  })(jQuery);

</script>

@stop

<noscript>{{ trans('main.enable js') }}</noscript>  
 
@stop