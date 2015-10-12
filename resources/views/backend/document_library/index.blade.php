
@extends('backend.layout')

@section('content')
    <div id="app_content">
        @if(\Session::has('message'))
            {!! \Helper::alert('success' , \Session::get('message')) !!}
        @endif

        @if(\Session::has('info'))
            {!! \Helper::alert('info' , \Session::get('info')) !!}
        @endif
        
        <p>
            &nbsp;
        </p>
        
        <div id="content_header">
            <h3 class="user"> {{ \Helper::labelAction() }}</h3>
        </div>
        
        <div id="content_body">
                
                <div style="width:100%;" id = 'elfinder_document'>

                        

                </div>   
        
        </div>

    </div>
@endsection
@stop

