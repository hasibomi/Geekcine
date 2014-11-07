@extends('Main.Boilerplate')

@section('bodytag')
	<body>
@stop


@section('content')

<section class="hbox stretch">
	<section>
		<section class="vbox">
			<section class="scrollable padder-lg w-f-md" id="bjax-target">

				{{-- Pagigntaion --}}
                <div class="row pagination-top">{{ $data->appends(array())->links() }}
            
                    @if(Helpers::hasAccess('titles.create'))	
                        <a style="margin-bottom:10px" href="{{ url(Str::slug(trans('main.movies')) . '/create') }}" class="pull-right hidden-xs btn btn-success">{{ trans('main.create new') }}</a>
                    @endif
                
              </div>
              {{-- End Pagigntaion --}}
              
              @include('Partials.FilterBar', array('action' => Str::slug(head(Request::segments()))))
              
              <br>

              <div class="row"> @include('Partials.Response') </div>
              
              {{-- Movie Start --}}
              
              @if ( ! $data->isEmpty())
                  <div class="row row-sm">
                        @foreach($data as $k => $r)
                            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2" data-filter-class='{{ Helpers::genreFilter($r->genre) }}' data-popularity="{{ $r['mc_num_of_votes'] ? $r['mc_num_of_votes'] : ($r['imdb_votes_num'] ? $r['imdb_votes_num'] : $r['tmdb_popularity'])}}" data-name="{{{ $r->title }}}" data-release="{{{ $r->year }}}">
                                <div class="item">
                                    <div class="pos-rlt"><!-- /.bottom -->
                                        <div class="item-overlay opacity r r-2x bg-black">
                                        	<div class="text-info padder m-t-sm text-sm">
                                            	@if ($r['mc_critic_score'])
                                                    <span class="pull-right">{{ substr($r['mc_critic_score'], 0, -1) . '/10' }}</span>
                                                @elseif ($r['imdb_rating'])
                                                    <span class="pull-right">{{ ! str_contains($r['imdb_rating'], '.') ? $r['imdb_rating'] . '.0' : $r['imdb_rating'] . '/10'}} </span>
                                                @elseif ($r['tmdb_rating'])
                                                    <span class="pull-right">{{ ! str_contains($r['tmdb_rating'], '.') ? $r['tmdb_rating'] . '.0' : $r['tmdb_rating'] . '/10'}}</span>
                                                @endif
                                            </div> <!-- /.text-info.padder.m-t-sm.text-sm -->
                                            <div class="center text-center m-t-n">
                                                <a href="{{Helpers::url($r['title'], $r['id'], $r['type'])}}"><i class="icon-control-play i-2x"></i></a>
                                            </div> <!-- /.center.text-center.m-t-n -->
                                            
                                            @include('Partials.AddToListButtons')
                                            
                                        </div> <!-- /.item-overlay.opacity.r.r-2x.bg-black -->
                                        <a href="{{Helpers::url($r['title'], $r['id'], $r['type'])}}"><img src="{{str_replace('w185', 'w342', $r->poster) }}" alt="{{{ $r['title'] }}}" class="r r-2x img-full" title="{{{ $r->title }}}"></a> <!-- Image -->
                                    </div> <!-- /.pos-rlt -->
                                    <div class="padder-v">
                                        <a href="{{Helpers::url($r['title'], $r['id'], $r['type'])}}">{{  Helpers::shrtString($r['title']) }}</a>
                                    </div> <!-- /.padder-v -->
                                </div> <!-- /.item -->
                            </div> <!-- /.col-xs-6.col-sm-4.col-md-3.col-lg-2 -->
                        @endforeach
                    </div>
                @else
                    <div><h3 class="reviews-not-released"> {{ trans('main.no results') }}</h3></div>
                @endif
                {{-- End Movie--}}

			</section>
		</section>
	</section>
</section>

@stop
