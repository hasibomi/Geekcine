@extends('Main.Boilerplate')

@section('bodytag')
	<body>
@stop


@section('content')

<section class="hbox stretch">
	<section>
		<section class="vbox">
			<section class="scrollable padder-lg" id="bjax-target">

				{{-- Pagigntaion --}}
                <div class="row pagination-top">{{ $data->appends(array())->links() }}
            
                    @if(Helpers::hasAccess('titles.create'))	
                        <a style="margin-bottom:10px; margin-top: 15px" href="{{ url(Str::slug(trans('main.movies')) . '/create') }}" class="pull-right hidden-xs btn btn-success">{{ trans('main.create new') }}</a>
                    @endif
                
              </div>
              {{-- End Pagigntaion --}}
              
              @include('Partials.FilterBar', array('action' => Str::slug(head(Request::segments()))))
              
              <br>

              <div class="row"> @include('Partials.Response') </div>
              
              {{-- Movie Start --}}
              
				@if ( ! $data->isEmpty())
					<div class="browse-grid" id="grid">
                        @foreach($data as $k => $r)
                            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 picture-item" data-groups='{{ Helpers::genreFilter($r->genre) }}' data-popularity="{{ $r['mc_num_of_votes'] ? $r['mc_num_of_votes'] : ($r['imdb_votes_num'] ? $r['imdb_votes_num'] : $r['tmdb_popularity'])}}" data-name="{{{ $r->title }}}" data-release="{{{ $r->year }}}">
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
                                        <a href="{{Helpers::url($r['title'], $r['id'], $r['type'])}}"><img src="{{str_replace('w185', 'w342', $r->poster) }}" alt="{{{ $r['title'] }}}" class="r r-2x img-full" title="{{{ $r->title }}}" width='100' height='250'></a> <!-- Image -->
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

@section("scripts")
	{{ HTML::script("assets/js/modernizr.custom.min.js") }}
	{{ HTML::script("assets/js/jquery.shuffle.min.js") }}
	
	<script type="text/javascript">

	$(".btn-sort").click(function() {
		var $mylist = $('#grid'),
			$btn = $(this);
			
		if($btn.attr("data-group") === "popularity" && ! $btn.hasClass("active")) {
			$("button[data-group=name]").removeClass("active");
			$btn.addClass("active");
			
			var $listitems = $mylist.children('div[data-popularity]').get();
			
			$listitems.sort(function(a, b) {
				return $(b).attr("data-popularity").localeCompare($(a).attr("data-popularity"));
			});

			$.each($listitems, function(index, item) {
				$mylist.append(item); 
			});
		} else if($btn.attr("data-group") === "name" && ! $btn.hasClass("active")) {
			$btn.addClass("active");
			$("button[data-group=popularity]").removeClass("active");
			
			var $listitems = $mylist.children('div[data-name]').get();
			
			$listitems.sort(function(a, b) {
				return $(a).attr("data-name").localeCompare($(b).attr("data-name"));
			});

			$.each($listitems, function(index, item) {
				$mylist.append(item);
			});
		}
		
	});

	</script>
@stop

@stop