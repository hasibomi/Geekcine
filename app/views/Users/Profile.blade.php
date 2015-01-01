@extends('Main.Boilerplate')



@section('title')



	<title>{{{ $user->username }}} - {{ trans('users.profile') }}</title>



@stop



@section('bodytag')

	<body>

@stop



@section('content')

        

<section class="vbox">

  <section class="scrollable padder-lg" id="bjax-target" style="padding: 0">

    <section class="hbox stretch">

    	

      @include('Users.Partials.Timeline')



      <aside class="bg-white">

        <section class="vbox">

          

            @include ('Users.Partials.Header')

          

          <section class="scrollable">

            <div class="tab-content">

              <div class="tab-pane active" id="activity">

              

              	<br>



                  <div class="container row" style="width: 99%; margin: auto;"> @include('Partials.Response') </div>



                  @include('Partials.FilterBar', array('action' => Helpers::url($user->username, $user->id, 'users') . '/' .Request::segment(3)))



                  <div class="row row-sm" style="width: 98%; margin: auto;" id="grid">



                    @foreach (Request::segment(3) == 'favorites' ? $favorite : $watchlist as $w)

	

  			<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3" data-filter-class='{{ Helpers::genreFilter($w['genre']) }}' data-popularity="{{{ $w['imdb_votes_num'] }}}" data-name="{{{ $w['title'] }}}" data-release="{{{ $w['year'] }}}" style="float: left;">

                        <div class="item">

                          <div class="pos-rlt">

                              <a href="{{Helpers::url($w['title'], $w['id'], $w['type'])}}">

                                <img class ="r r-2x img-full" src="{{{ $w['poster'] ? asset($w['poster']) : asset('assets/images/imdbnoimage.jpg') }}}" alt="{{{ $w['title'] }}}" width="60" height="300">

                              </a> <!-- Image -->

                          </div> <!-- /.pos-rlt -->

                          <div class="padder-v">

                            <a href="{{Helpers::url($w['title'], $w['id'], $w['type'])}}"> {{  Helpers::shrtString($w['title']) }} </a>

                              @if(Helpers::isUser($user->username))

                      

                                {{ Form::open(array('url' => 'lists/remove', 'class' => 'trash-ico pull-right')) }}



                                  {{ Form::hidden('title', $w['id']) }}

                                  {{ Form::hidden('user', $user->id) }}

                                  {{ Form::hidden('list', Request::segment(3) == 'favorites' ? 'favorite' : 'watchlist') }}

                                  {{ Form::hidden('name', $w['title']) }}



                                  <button type = "submit" title="{{ trans('dash.remove') }}" class="btn btn-danger btn-xs"><i class="fa fa-times"></i> </button> 

                                {{ Form::close() }}

                              @endif

                          </div> <!-- /.padder-v -->

                        </div> <!-- /.item -->

                      </div> <!-- /.col-xs-6.col-sm-4.col-md-3.col-lg-3 -->

                      

                    @endforeach

                    @if (Request::segment(3) == 'favorites')

                      {{ $favorite->appends(array())->links() }}

                    @else

                      {{ $watchlist->appends(array())->links() }}

                    @endif

                  </div>

              </div>

            </div>

          </section>

        </section>

      </aside>

    </section>

    <!-- /section.hbox.stretch -->

  </section>

  <!-- /section#bjax-target.scrollable.padder-lg.w-f-md -->

</section>

<!-- /section.vbox -->



@section ('scripts')



	<script>



		$('#moreInfo').click(function() {

			$('#less').hide();

			$('#more').show();

			$('#lessInfo').show();

			$('#moreInfo').hide();

		});



		$('#lessInfo').click(function() {

			$('#less').show();

			$('#more').hide();

			$('#moreInfo').show();

			$('#lessInfo').hide();

		});

		

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



@section('ads')

@stop