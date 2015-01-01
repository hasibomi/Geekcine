<section class="hbox">

    <section>

        <section class="scrollable padder-lg" id="bjax-target">



            <div class="row row-sm" style="float: left;">

                @foreach($data->getCast() as $k => $actor)

                
                <div class="col-sm-4" data-order="{{{ $k }}}" style="float: left;">

                    <div class="item" style="float: left;">

                        <div class="pos-rlt">

                            <a href="{{ Helpers::url($actor['name'], $actor['id'], 'people') }}">

                        <img src="{{{ asset($actor['image']) }}}" class="r r-2x img-full" alt="{{ 'Picture of ' . $actor['name'] }}" width="100" height="200">
                        </a>

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