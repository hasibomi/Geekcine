@extends('Main.Boilerplate')

@section('bodytag')
	<body>
@stop

@section('nav')
	@include('Partials.Navbar')
@stop

@section('content')

<section class="hbox stretch">
	
    <section>
    	
        <section class="vbox">
        	<section class="scrollable padder-lg">
            	<div class="row pagination-top">{{ $actors->links() }}
                 	@if(Helpers::hasAccess('people.create'))	
                    	<a href="{{ route(Str::slug(trans('main.people')) . '.create') }}" class="pull-right btn btn-success" style="margin-top: 1%">{{ trans('main.create new') }}</a>
                	@endif
                </div>
                    
                    <h3 class="font-thin">{{ trans('main.popular actors') }}</h3>
                    <!-- Actors -->
                    @if (isset($actors) && ! $actors->isEmpty())
                        <div class="row">
                          <div class="col-md-12">
                            <div class="row row-sm">
                                @foreach($actors as $k => $v)
                                    <div class="col-xs-6 col-sm-2">
                                        <div class="item">
                                          <div class="pos-rlt">
                                            <a href="{{ Helpers::url($v['name'], $v['id'], 'people') }}">
                                                <img src="{{{ asset($v['image']) }}}" class="r r-2x img-full" alt="{{ 'Poster of ' . $v['name'] }}" width="100" height="250">
                                            </a>
                                          </div>
                                          <div class="padder-v">
                                            <a class="text-ellipsis" href="{{ Helpers::url($v['name'], $v['id'], 'people') }}">{{{ $v['name'] }}}</a>
                                          </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                          </div>
                          <!-- Actors end -->
                        </div>
                    @endif
            </section>
            <!-- /section#bjax-target.scrollable.padder-lg -->
        </section>
        <!-- /section.vbox -->
        
    </section>
    <!-- /section -->
    
</section>
<!-- /section.hbox-stretch -->

@stop