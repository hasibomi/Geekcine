<style type="text/css">
    .movie-link, .movie-link:hover {
        background-color: #E9E9E8; 
		color: #4D4D4D;
        font-weight: bold;		
		border-color: #EDEDED;
		box-shadow: 0px 0px 5px 0px rgba(119, 119, 119, 0.54);
        -moz-box-shadow: 0px 0px 5px 0px rgba(119, 119, 119, 0.54);
        -webkit-box-shadow: 0px 0px 5px 0px rgba(119, 119, 119, 0.54);
        box-shadow: inset 0px 0px 5px 0px rgba(119, 119, 119, 0.54);
        -moz-box-shadow: inset 0px 0px 5px 0px rgba(119, 119, 119, 0.54);
        -webkit-box-shadow: inset 0px 0px 5px 0px rgba(119, 119, 119, 0.54);

    }
</style>
<section class="row">

    <div class="col-sm-10">
        <h3 class="row" style="margin-top: 0px;">Watch {{ $data->getTitle() }}</h3>
        <hr style="margin-top: 0px;">
        
        @if($movie_links = $data->getMovieLinks())
        @foreach($movie_links as $index => $links)
        

        <div class="row" >
            <div class="col-sm-2">
                <img src="{{url(str_replace('.png','_big.png',$languages[$index]->icon))}}" data-title="{{$languages[$index]->name}}" />
            </div>
            <div class="col-sm-10">
                <div class="row" >
                    <div class="col-sm-1"></div>
                    @foreach($links as $key => $link)
                    @if($key!=0 && ($key%10==0))
                    <div class="col-sm-1"></div></div><div class="row" style="padding-top: 15px; "><div class="col-sm-1"></div>    
                    @endif
                    <?php
                    $user = $link->user;
                    $userpage = url('/users') . '/' . $user->id . '-' . $user->username;
                    $quality = ($link->quality? $link->quality : 'dvd');
                    ?>
                    <div class="col-sm-1" style="position:relative">
                      <a class="btn btn-default movie-link" data-id="{{$link->id}}" data-username="{{$user->username}}" data-userpage="{{$userpage}}" href="javascript:void(0)">
                        <img src="http://www.google.com/s2/favicons?domain={{ $link->url}}" style="background-color: #efefef; margin:5px;">
                        <br>  
                        {{$key + 1}}
                    </a>                
                    <span class="badge" style="position:absolute; top:-8px; left:42px; background-color:transparent;"><img src="{{url('assets/images/icon_'.$quality.'.png')}}" width="30"></span>
                    </div>
                    @endforeach
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </div>
    
    @if($index!=1)  
    <hr>
    @endif

    @endforeach
    @endif

    <div class="modal fade" id="play-link-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="modal-close" aria-hidden="true" data-dismiss="modal" type="button"></button>
                    <h4 class="modal-title">
                        <strong>{{$data->getTitle()}}</strong>
                        <span id="reported" class="pull-right">
                            <input type="hidden" id="link-id">
                            <a href="javascript:void(0)" id="report">
                                <img src="{{url('assets/images/report_link.png')}}" width="24" />
                                Dead Link
                            </a>
                            (<span id="reported-number"></span>)
                        </span>
                    </h4>
                </div>
                <div class="modal-body row">
                    <p id="movie-iframe"></p>
                    <p>
                        <span class="pull-left">
                            <strong>Added by:</strong> <a id="username"></a>
                        </span>
                        <span class="pull-right">
                            <strong><span id="views"></span> Views</strong>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="col-sm-1">

</div>
<div class="col-sm-1">
    @if(Sentry::check())
    <button type="button" class="btn btn-danger btn-add-link">
        <span><i class="fa fa-plus-square"></i>Add Link</span>
    </button>
    <div class="modal fade" id="add-link-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="modal-close" aria-hidden="true" data-dismiss="modal" type="button"></button>
                    <h4 class="modal-title"><strong>Add New Link</strong></h4>
                </div>
                <div class="modal-body row form-horizontal">
                    <div class="col-md-6">
                        <div class="fixed-height">
                            <div class="alert alert-success hidden">Success</div>
                            <div class="alert alert-danger hidden"></div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('movie-title', 'Movie', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                <input type="text" readonly value="{{$data->getTitle()}}" class="form-control" id="movie-title"/>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('link-language', 'Language', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                <?php
                                $options = array();
                                foreach ($languages as $lang) {
                                    $options[$lang->id] = $lang->name;
                                }
                                ?>
                                {{ Form::select('link-language', $options, null, array('class' => 'form-control'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('link-quality', 'Quality', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                <?php
                                    $options = array('dvd'=>'DVD', 'hd'=>'HD');
                                ?>
                                {{ Form::select('link-quality', $options, null, array('class' => 'form-control'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('link-url', 'New Link', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('link-url', null, array('class' => 'form-control'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('captcha', 'Captcha', array('class' => 'col-md-4 control-label')) }}
                            <div class="col-md-8">
                                {{ Form::text('captcha', null, array('class' => 'form-control', 'id' => 'captcha'))}}
                                <a href="javascript:void(0)" id="reload-captcha">Reload captcha</a>
                                <img id="captcha-img" width="100%" />
                                {{ Form::hidden('captcha_id', null, array('id' => 'captcha-id'))}}
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-danger col-md-4" id="add-link" data-loading-text="Adding...">Add Link</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @include('Partials.AddLinkTerm')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>



</section>
