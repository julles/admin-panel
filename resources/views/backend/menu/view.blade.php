@extends('backend.layout')
@section('content')
    <div id="app_content">
    <div id="content_header">
        <h3 class="user"> {{ \Helper::labelAction() }}</h3>
    </div>
        <div id="content_body">
            <h3 class="title-page">"MENU" {{ $model->title }}</h3>
            <div class="tabular">
                <div class="header">
                    <div class="cell">Action</div>
                    <div style="width:250px" class="cell">Status</div>
                </div>
                <div class="row-group">
                    @foreach($modelAction->all() as $row)

                    <?php
                        $cekMenuAction = $modelMenuAction->select('id')->whereActionId($row->id)->whereMenuId($model->id)->first();
                        if(!empty($cekMenuAction->id))
                        {
                            $checked = 'checked';
                        }else{
                            $checked = '';
                        }
                    ?>
                       <div class="row pink">
                            <div class="cell">{{ $row->title }}</div>
                            <div class="cell center">
                            
                                    <input {{ $checked }} type="checkbox" value = "{{ $row->id }}" id = 'action_id{{$row->id}}' onclick = 'return insertMenuAction("{{ $row->id }}","{{ $model->id }}")' />
                            
                            </div>
                        </div>
                     @endforeach     
                 </div>
                                                                               
            </div>

        </div>


        </div>
    </div>
@endsection
@stop

