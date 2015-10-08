@extends('backend.layout')
@section('content')
    <div id="app_content">
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
                                <div class="label block_left">Parent</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::select('parent_id', $parents) !!}</div>
                                    <div class="error">{{ $errors->first('parent_id') }}</div>
                                </div>
                                <div class="line-break clear_left">&nbsp;</div>
                            </div>

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
                                <div class="label block_left">Controller</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::text('controller', null) !!}</div>
                                    <div class="error">{{ $errors->first('controller') }}</div>
                                </div>
                                <div class="line-break clear_left">&nbsp;</div>
                            </div>

                            <div class="element-block-wrapper">
                                <div class="label block_left">Permalink</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::text('permalink', null) !!}</div>
                                    <div class="error">{{ $errors->first('permalink') }}</div>
                                </div>
                                <div class="line-break clear_left">&nbsp;</div>
                            </div>

                            <div class="element-block-wrapper">
                                <div class="label block_left">Order</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::text('order', null) !!}</div>
                                    <div class="error">{{ $errors->first('order') }}</div>
                                </div>
                                <div class="line-break clear_left">&nbsp;</div>
                            </div>

                            <div class="element-block-wrapper">
                                <div class="label block_left">Icon</div>
                                <div class="center block_separator">:</div>
                                <div class=" block_label block_right">
                                    <div> {!!  Form::text('icon', null) !!}</div>
                                    <div class="error">{{ $errors->first('icon') }}</div>
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
                        <button data-link="{{ Helper::urlAction('index') }}" class="cancel-button" name="cancel_form">Cancel</button>
                    </div>

                    <div class="break8 clear_left">&nbsp;</div>
                {!! Form::close() !!}
                <!-- end of form --></div>
        </div>
    </div>
@endsection
@stop

