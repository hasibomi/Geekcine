<div class="row">
  @if (date('Y-m-d', strtotime($data->getReleaseDate())) < Carbon\Carbon::now()->toDateString() || strlen($data->getReleaseDate()) <= 4)

<section class="col-sm-12">

  <div class="bordered-heading hidden-sm" style="width:90%;margin:auto;">
    <span class="text-border-top"> <i class="fa fa-thumbs-o-up"></i> {{ trans('main.user reviews') }}</span>

    {{--display modal button if user review found--}}
    @if ( $data->getUserReviews())

      <a href="#" type="button" data-toggle="modal" data-target="#review-modal" class="pull-right btn btn-info btn-xs"><i class="fa fa-pencil"></i> {{ trans('main.write one') }}</a>

      @include('Titles.Partials.FormModal')

    @endif
    
  </div>

  {{--display form if no user reviews found--}}
  @if ( ! $data->getUserReviews() )

   <div class="hidden-sm" style="width:90%;margin:auto;"> @include('Titles.Partials.ReviewForm') </div>

  {{--if found review display them and pop up modal with form--}}  
  @else

      @foreach(array_slice($data->getUserReviews(), 0, 10) as $k => $r)

         @if ($k == 4)
          @if($ad = $options->getTitleUserAd())
              <div class="row ads-row" style="width:90%;margin:auto;">{{ $ad }}</div>
              <hr>
          @endif
         @endif

        <div class="row review-info" style="width:90%;margin:auto;">
          <span class="review-score">{{{ $r['score'] . '.0' }}}</span> {{ trans('main.by') }} <strong><a href="{{{ Helpers::url($r['author'], $r['user_id'], 'users') }}}">{{{ $r['author'] }}}</a></strong> - <strong>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($r['created_at']))->diffForHumans() }}</strong>

          {{--delete review button--}}
          @if (Helpers::hasAccess('reviews.delete'))

            {{ Form::open(array('url' => Request::url() . '/reviews/' . $r['id'], 'class' => 'trash-ico-user', 'method' => 'delete')) }}

              {{ Form::hidden('id', $data->getId()) }}

              <button style="margin-left:5%" type = "submit" title="{{ trans('dash.delete') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </button>

            {{ Form::close() }}

          @endif

        </div> 

        <p class="review-body" style="width:90%;margin:auto;">{{{ $r['body'] }}}</p>
      
        <hr> 

    @endforeach

  @endif

</section>

<section class="col-sm-12">
    <br/>
  <div class="bordered-heading" style="width:90%;margin:auto;"><span class="text-border-top"><i class="fa fa-thumbs-o-down"></i> {{ trans('main.critic reviews') }}</span>
      
  
    @if (Helpers::hasAccess('reviews.update'))

      {{ Form::open(array('url' => 'private/update-reviews', 'class' => 'pull-right')) }}
        {{ Form::hidden('id', $data->getId()) }}
        <button style="margin-left:5%" type = "submit" title="{{ trans('dash.delete') }}" class="btn btn-info btn-xs pull-left"><i class="fa fa-refresh"></i> {{ trans('main.update') }}</button>
      {{ Form::close() }}

    @endif

  </div>
    @if ($data->getCriticReviews())

      @foreach(array_slice($data->getCriticReviews(), 0, 10) as $k => $r)

         @if ($k == 4)
          @if($ad = $options->getTitleCriticAd())
              <div class="row ads-row" style="width:90%;margin:auto;">{{ $ad }}</div>
              <hr>
          @endif
         @endif

        <div class="row review-info" style="width:90%;margin:auto;">
          <span class="review-score"><span>{{{ $r['score'] }}}</span></span> {{ trans('main.by') }} 

          @if ($r['author'])
            <strong style="width:90%;margin:auto;">{{{ $r['author'] }}}</strong> -
          @endif

          <strong style="width:90%;margin:auto;">{{{ $r['source'] }}}</strong>
        </div>

        <p class="review-body" style="width:90%;margin:auto;">{{{ $r['body'] }}}</p>

        <p class="row review-full"style="width:90%;margin:auto;">
          <a target="_blank" href="{{{ $r['link'] }}}">{{ trans('main.full review') }} <i class="icon-share-alt"></i></a>
          
          @if(Helpers::hasAccess('reviews.delete'))

            {{ Form::open(array('url' => Request::url() . '/reviews/' . $r['id'], 'class' => 'trash-ico-critic', 'method' => 'delete')) }}
              {{ Form::hidden('id', $data->getId()) }}
              <button style="margin-left:5%" type = "submit" title="{{ trans('dash.delete') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </button>
            {{ Form::close() }}

          @endif

        </p>

        <hr> 

      @endforeach
    @else
      <strong>{{ trans('main.no critic reviews') }}</strong>
    @endif
    
    {{--display form if no user reviews found--}}
  @if ( ! $data->getUserReviews() )

   <div class="hidden-sm" style="width:90%;margin:auto;"> @include('Titles.Partials.ReviewForm') </div>

  {{--if found review display them and pop up modal with form--}}  
  @else

      @foreach(array_slice($data->getUserReviews(), 0, 10) as $k => $r)

         @if ($k == 4)
          @if($ad = $options->getTitleUserAd())
              <div class="row ads-row" style="width:90%;margin:auto;">{{ $ad }}</div>
              <hr>
          @endif
         @endif

        <div class="row review-info" style="width:90%;margin:auto;">
          <span class="review-score" style="width:90%;margin:auto;">{{{ $r['score'] . '.0' }}}</span> {{ trans('main.by') }} <strong><a href="{{{ Helpers::url($r['author'], $r['user_id'], 'users') }}}">{{{ $r['author'] }}}</a></strong> - <strong>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($r['created_at']))->diffForHumans() }}</strong>

          {{--delete review button--}}
          @if (Helpers::hasAccess('reviews.delete'))

            {{ Form::open(array('url' => Request::url() . '/reviews/' . $r['id'], 'class' => 'trash-ico-user', 'method' => 'delete')) }}

              {{ Form::hidden('id', $data->getId()) }}

              <button style="margin-left:5%" type = "submit" title="{{ trans('dash.delete') }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> </button>

            {{ Form::close() }}

          @endif

        </div> 

        <p class="review-body" style="width:90%;margin:auto;">{{{ $r['body'] }}}</p>
      
        <hr> 

    @endforeach

  @endif
</section>

@else

<div class="row" style="margin-left: 5%;width:90%;margin:auto;"><h3 class="reviews-not-released"><i class="fa fa-clock-o"></i> {{ trans('main.will be released') . ' ' . $data->getReleaseDate() . ' ...'}}</h3></div>

@endif
</div>