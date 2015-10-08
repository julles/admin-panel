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
            {!! \Helper::buttonCreate() !!}
            <div class="clear break20"></div>
            <table id="action-table" class="display" cellspacing="0" width="100%">
               
                <thead>
                    <tr>
                        <td class="">Action</td>
                        <td class="">Title</td>
                        <td class="">Option</td>
                    </tr>
                </thead>
                
            </table>
            <div class="tabular-pagination"></div>
        </div>

    </div>
@endsection
@stop

