@extends('backend.layout')
@section('content')
    <div id="app_content">
    <div id="content_header">
        <h3 class="user"> {{ \Helper::labelAction() }}</h3>
    </div>
        <div id="content_body">
            <h3 class="title-page">"{{ $model->role }}" Roles</h3>

            <div style="width: 100px;" class="fl">Total User</div>
            <div style="width: 15px;" class="fl">:</div>
            <div class="fl">{{ $countUser }}</div>

            <div class="line-break clear">&nbsp;</div>

            <div style="width: 100px;" class="fl">Create Time</div>
            <div style="width: 15px;" class="fl">:</div>
            <div class="fl">{{ date("d-m-Y" ,  strtotime($model->created_at)) }}</div>

            <div class="line-break clear">&nbsp;</div>
            <div class="break20"></div>
            <h3 class="title-page">Permissions</h3>
            <span>Check/uncheck the checkbox under status column, to change role permission</span>
            <div class="break15"></div>

            <div class="tabular">
            <div class="header">
                <div class="cell">Permissions</div>
                <div style="width:250px" class="cell">Status</div>
            </div>
            <div class="row-group">
                 
                @foreach($menu->whereParentId(0)->get() as $parent)

                        <div style="background-color:#ddd;" class="row">
                            <div style="font-weight:bold;color:#000;" class="cell">{{ $parent->title }}</div>
                            <div class="cell no-border-left center">
                                <table width="100%">
                                <tbody>
                                <tr>
                                    <td width="49%" style="text-align:right;">
                                        Check All &nbsp;&nbsp; 
                                        <input type="radio" style="margin-top:5px;float:right;" onclick = 'insertRightEach("{{ $model->id }}","{{ $parent->id }}" , "insert")' >
                                    </td>
                                    <td width="49%" style="text-align:left;padding-left:2%;">
                                        <input type="radio" style="margin-top:5px;float:left;" onclick = 'insertRightEach("{{ $model->id }}","{{ $parent->id }}" , "delete")' >&nbsp;&nbsp;Uncheck All
                                    </td>
                                </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>

                    @foreach($menu->whereParentId($parent->id)->get() as $child)                                            
                            
                            @foreach($menuAction->whereMenuId($child->id)->get() as $action)
                                
                                <?php
                                
                                    $cek = $right->select('id')->whereRoleId($model->id)->whereMenuId($child->id)->whereActionId($action->action_id)->first();
                                   
                                    if(!empty($cek->id))
                                    {
                                        $checked = 'checked';

                                    }else{
                                        $checked = '';

                                    }
                                
                                ?>

                                <div class="row pink">
                                    <div class="cell">{{ $action->action->title }} {{ $child->title }}</div>
                                    <div class="cell center">
                                      <input {{ $checked }} type="checkbox" onclick = "insertRights('{{ $model->id }}','{{ $child->id }}' , '{{ $action->action_id }}' ,'{{ $action->id }}')" name="action[]" id = 'action_id{{ $action->id }}' />
                                    </div>
                                </div>
                            
                            @endforeach

                    @endforeach

                @endforeach
            </div>

        </div>

        </div>
    </div>
@endsection
@stop

