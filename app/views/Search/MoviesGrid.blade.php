@if ( isset($data) && ! $data->isEmpty() )
<section class="hbox stretch">    
    <section>
    <section class="scrollable padder-lg">
        <div class="row row-sm">
            
	<div id="grid" class="browse-grid">

	@foreach($data->slice(0,12) as $k => $r)

		@if ($r->type == 'movie')

			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2" data-filter-class='{{ Helpers::genreFilter($r->genre) }}' data-popularity="{{ ($r['imdb_votes_num'] ? $r['imdb_votes_num'] : $r['tmdb_popularity']) }}" data-name="{{{ $r->title }}}" data-release="{{{ $r->year }}}">
                <div class="item">
                    <div class="pos-rlt">
                        <a href="{{Helpers::url($r['title'], $r['id'], $r['type'])}}">
                            <img class ="img-responsive" src="{{str_replace('w185', 'w342', $r->poster) }}" alt="{{{ $r['title'] }}}">
                        </a> <!-- Image -->
                        
                        <div class="item-overlay opacity r r-2x bg-black">
                            <div class="text-info padder m-t-sm text-sm">
                                @include('Partials.AddToListButtons')

                                @if ($r['imdb_rating'])
                                    <span class="pull-right">{{ ! str_contains($r['imdb_rating'], '.') ? $r['imdb_rating'] . '.0' : $r['imdb_rating'] }}</span>
                                @elseif ($r['tmdb_rating'])
                                    <span class="pull-right">{{ ! str_contains($r['tmdb_rating'], '.') ? $r['tmdb_rating'] . '.0' : $r['tmdb_rating'] }}</span>
                                @endif
                            </div>
                        </div>
                        
                    </div> <!-- /.pos-rlt -->
                    <div class="padder-v">
                        <a href="{{Helpers::url($r['title'], $r['id'], $r['type'])}}"> {{  Helpers::shrtString($r['title']) }} </a>
                    </div> <!-- /.padder-v -->
                </div> <!-- /.item -->
            </div> <!-- /.col-xs-6.col-sm-4.col-md-3.col-lg-2 -->

		@endif

	@endforeach

</div>

@else

	<div><h3 class="reviews-not-released">{{ trans('main.no movies found') }}</h3></div>

@endif

    </div>
</section>
    </section>
    </section>