@extends('backend.layout')
    
    @section('content')

            <div style = 'width:100%;'>

                <div style="width:70%;float:left;">
                        <div id="app_content">
                            <div id="content_header">
                                <h3 class="user">Dashboard Activity</h3>
                            </div>
                            <div id="content_body">
                                
                                <div id = 'chart'>

                                &nbsp;
                                </div>

                                <div class="tabular-pagination"></div>
                            </div>
                        </div>
            
                </div>
                <div style="width:30%;float:right;">

                <div id="app_content">
                    <div id="content_header">
                        <h3 class="user">Lates Activities</h3>
                    </div>
                        <div id="content_body">
                            <div id="station-form-wrapper">
                                <!-- start form -->
                                    <!-- start element -->
                                    <div id="content">
                                        <div class="media-container active" id="media-content-container">
                                            
                                            <table width="100%;">
                                               
                                            <tbody>
                                            @foreach($model as $row)

                                            <?php
                                            (!empty($row->menu_id)) ? $menu = $row->menu->title : $menu = '';
                                            ?>
                                                <tr>
                                                    <td>{{ date("d F Y h:i:s", strtotime($row->created_at)) }}
                                                    <br>
                                                    {{ $row->user->name }}
                                                    
                                                    {{ $row->action.' '.$menu }}                                                 <hr>
                                                    </td>
                                                </tr>

                                            @endforeach
                                                
                                            </tbody>
                                            </table>
                                        
                                            <div class="center no_label">&nbsp;</div>
                                        
                                        </div>
                                        <!-- End Media Content Container --></div>
                                    <!-- End ID Content -->
                                  
                                   

                                    <div class="break8 clear_left">&nbsp;</div>
                                
                                <!-- end of form --></div>
                        </div>
                    </div>
                    
            
            </div>

            </div>

            

    @endsection
    
@stop