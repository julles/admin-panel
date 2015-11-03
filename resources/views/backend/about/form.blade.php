@extends('backend.layout')
@section('content')
    <div id="app_content">
     @if(\Session::has('message'))
            {!! \Helper::alert('success' , \Session::get('message')) !!}
    @endif

    @if(\Session::has('info'))
        {!! \Helper::alert('info' , \Session::get('info')) !!}
    @endif
    <div id="content_header">
        <h3 class="user"> {{ \Helper::labelAction() }}</h3>
    </div>
        <div id="content_body">
            <div id="station-form-wrapper">
                <!-- start form -->
                {!! Form::model($model , ['class' => 'main-editor']) !!}   
                    <!-- start element -->
                    <div id="content">
                        <div id="media-content-container" class="media-container active">
                        
                           

                            <div class="element-block-wrapper">
                                <div class="label block_left">Title</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::text('title', null) !!}</div>
                                    <div class="error">{{ $errors->first('title') }}</div>
                                </div>
                                <div class="line-break clear_left">&nbsp;</div>
                            </div>


                             <div class="element-block-wrapper">
                                <div class="label block_left">Description</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right" style="width:80%;">
                                    <div> {!!  Form::textarea('description',null, ['id' => 'ckeditor_upload']) !!}</div>
                                    <div class="error">{{ $errors->first('description') }}</div>
                                </div>
                                <div class="line-break clear_left">&nbsp;</div>
                            </div>

                                <div class="element-block-wrapper">
                                    <div class="label block_left">Banner</div>
                                    <div class="center block_separator">:</div>
                                    <div class=" block_label block_right">
                                        <div><a class="Wbutton" onclick = "return browseElfinder('banner'  , 'image' , 'elfinder_browse1')" >Browse</a></div>
                                        <div id="image" style = 'margin-top:30px;'>
                                            
                                            @if(!empty($banner->banner))
                                                <img src="{{ \Helper::assetUrl().\Helper::contents().'/'.$banner->banner }}" width="200" height="200" />
                                            @endif

                                        </div>
                                        <input type = 'hidden' name = 'banner' id = 'banner' />
                                    </div>
                                    <div class="line-break clear_left">&nbsp;</div>
                                </div>
                            
                            <div class="center no_label">&nbsp;</div>
                        
                        </div>
                        <!-- End Media Content Container --></div>
                    <!-- End ID Content -->
                    <div class="block_right" id="submit_wrapper">
                        <span>Submit</span>
                    </div>
                    <div class=" block_right" id="cancel_wrapper">
                        <button data-link="{{ \Helper::urlAction('index') }}" class="cancel-button" name="cancel_form">Cancel</button>
                    </div>

                    <div class="break8 clear_left">&nbsp;</div>
                {!! Form::close() !!}
                <!-- end of form --></div>
        </div>
    </div>
    @include('backend.popElfinder');
@endsection
@stop

