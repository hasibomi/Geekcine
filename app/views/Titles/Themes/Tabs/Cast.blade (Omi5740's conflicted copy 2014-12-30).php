<section class="hbox">
    <section>
        <section class="scrollable padder-lg" id="bjax-target">

            <div class="row row-sm">
                @foreach($data->getCast() as $k => $actor)
                
                <div class="col-md-4" data-order="{{{ $k }}}">
                    <div class="item">
                        <div class="pos-rlt">
                            <a href="{{ Helpers::url($actor['name'], $actor['id'], 'people') }}">
                        <img src="{{{ asset($actor['image']) }}}" class="img-responsive" alt="{{ 'Picture of ' . $actor['name'] }}">
                        </div>
                        <div class="padder-v">
                            <a href="{{ Helpers::url($actor['name'], $actor['id'], 'people') }}">{{{ $actor['name'] }}}</a> <br>

                            {{{ $actor['pivot']['char_name'] }}}
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
    
        </section>
    </section>
</section>  