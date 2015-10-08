@extends('backend.layout')
	
	@section('content')

			<div id="app_content">
                <div id="content_header">
                    <h3 class="user">Recent Activity</h3>
                </div>
                <div id="content_body">
                    <div class="tool-wrapper">
                        <div class="item-tool search">
                            <form action="http://localhost:94/wcms/admin-cp/user/history" method="post" accept-charset="utf-8">
                                Search : <input type="text" name="tool[search]" value=""/><input type="submit" name="Go" value="Go"/>
                            </form>
                        </div>
                    </div>
                    <div class="clear break20"></div>
                    <div class="tabular">
                        <div class="header">
                            <div class='cell numbering '>#</div>
                            <div class="cell"style="width:300px;">Actor</div>
                            <div class="cell">Activity</div>
                            <div class="cell create-time">Create Time</div>
                        </div>
                        <div class="row-group">
                            <div class="row blue">
                                <div class="cell numbering">1</div>
                                <div class="cell"style="width:300px;">superadmin</div>
                                <div class="cell">
                                    <span class="action">login</span>
                                </div>
                                <div class="cell create-time">Aug 07, 2015 14:13:11</div>
                            </div>
                        </div>
                    </div>
                    <div class="tabular-pagination"></div>
                </div>
            </div>

	@endsection
	
@stop