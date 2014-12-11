@extends('Main.Boilerplate')

@section('bodytag')
	<body id="privacy">
@stop

@section('content')

    <section class="hbox stretch">
		<section>
			<section class="vbox">
				<section class="scrollable padder-lg" id="bjax-target">
					{{ trans('disclaimer.disclaimer') }}
				</section>
			</section>
		</section>
	</section>

@stop


