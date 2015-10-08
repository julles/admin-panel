
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
            <div id="create-button">
                <a href="{{ \Helper::urlAction('create') }}"><span>Create Navigation</span></a>
            </div>
            <div class="clear break20"></div>
            <table id="role-table" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td class="">Role</td>   
                        <td class="">Action</td>
                    </tr>
                </thead>
            </table>
            <div class="tabular-pagination"></div>
        </div>

    </div>
@endsection
@stop

