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
            <table id="table" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr style = 'background-color:#089;color:black;'>
                        <td class="">No</td>
                        <td class="">Parent</td>
                        <td class="">Title</td>
                        <td class="">Controller</td>
                        <td class="">Permalink</td>
                        <td class="">Order</td>
                        <td class="">Icon</td>
                        <td class="">Action</td>
                    </tr>
                </thead>
                <tbody class="row-group">
                    @yield($no = 0)
                    
                    @foreach($model->whereParentId(0)->orderBy('order' , 'asc')->get() as $parent)
                    
                    @yield($no++)

                    @yield($countChild = $model->whereParentId($parent->id)->count())

                    <tr style = 'background-color:#ccc;color:black;'>
                        <td class="">{{ $no }}</td>
                        <td>This Parent</td>
                        <td>{{ $parent->title }}</td>
                        <td>{{ $parent->controller }}</td>
                        <td>{{ $parent->permalink }}</td>
                        <td>{{ $parent->order }}</td>
                        <td>{{ $parent->icon }}</td>
                        <td class="cell action">
                           {!! \Helper::buttonUpdate($parent->id) !!}
                           {!! \Helper::buttonDelete($parent->id) !!}

                           @if($countChild < 1)
                            {!! \Helper::buttonView($parent->id) !!}
                           @endif
                           
                        </td>
                    </tr>
                        @yield($noC = 0)
                        @foreach($model->whereParentId($parent->id)->orderBy('order','asc')->get() as $child)
                        @yield($noC++)
                            <tr style="">
                                <td class="">{{ $no.".".$noC }}</td>
                                <td>{{ $parent->title }}</td>
                                <td>{{ $child->title }}</td>
                                <td>{{ $child->controller }}</td>
                                <td>{{ $child->permalink }}</td>
                                <td>{{ $child->order }}</td>
                                <td>{{ $child->icon }}</td>
                                <td class="cell action">
                                   {!! \Helper::buttonUpdate($child->id) !!}
                                   {!! \Helper::buttonDelete($child->id) !!}
                                   {!! \Helper::buttonView($child->id) !!}
                                </td>
                            </tr>

                        @endforeach

                    @endforeach
                </tbody>
            </table>
            <div class="tabular-pagination"></div>
        </div>

    </div>
@endsection
@stop

