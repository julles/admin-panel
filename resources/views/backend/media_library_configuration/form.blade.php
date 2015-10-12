@extends('backend.layout')
@section('content')
    <div id="app_content">
     @if(\Session::has('message'))
        {!! \Helper::alert('success' , \Session::get('message')) !!}
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
                                <div class="label block_left">Image Thumbnail Widht</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::text('image_thumbnail_width', null) !!}</div>
                                    <div class="error">{{ $errors->first('image_thumbnail_width') }}</div>
                                </div>
                                <div class="line-break clear_left">&nbsp;</div>
                            </div>

                            <div class="element-block-wrapper">
                                <div class="label block_left">Image Thumbnail Height</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::text('image_thumbnail_height', null) !!}</div>
                                    <div class="error">{{ $errors->first('image_thumbnail_height') }}</div>
                                </div>
                                <div class="line-break clear_left">&nbsp;</div>
                            </div>

                            <div class="element-block-wrapper">
                                <div class="label block_left">Allowed Image Extension</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::text('allowed_image_extension', null) !!}</div>
                                    <div class="error">{{ $errors->first('allowed_image_extension') }}</div>
                                    <div class="element-information">separate width (semicolon) (;)</div>
                                </div>

                                <div class="line-break clear_left">&nbsp;</div>

                            </div>

                            <div class="element-block-wrapper">
                                <div class="label block_left">Allowed Video Extension</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::text('allowed_video_extension', null) !!}</div>
                                    <div class="error">{{ $errors->first('allowed_video_extension') }}</div>
                                    <div class="element-information">separate width (semicolon) (;)</div>
                                </div>

                                <div class="line-break clear_left">&nbsp;</div>

                            </div>

                            <div class="element-block-wrapper">
                                <div class="label block_left">Allowed Document Extension</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::text('allowed_document_extension', null) !!}</div>
                                    <div class="error">{{ $errors->first('allowed_document_extension') }}</div>
                                    <div class="element-information">separate width (semicolon) (;)</div>
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
@endsection
@stop

