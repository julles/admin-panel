$(document).ready(function(){

	$("#submit_wrapper").click(function(){
		$(".main-editor").submit();
	});
	
});

function showChild(id)
{
	$("ul.child_menu[id!=child"+ id +"]").hide();
	$("#child" + id).show();
}

function insertMenuAction(action_id , menu_id)
{
	var check;
	
	if($("#action_id" + action_id).prop('checked') == true){
    
    	check = 'insert';
    		
    }else{
    	check = 'delete';
	}

	$.ajax({
		type: 'get',
		url : urlAction("insertmenuaction"),
		data: {
			'_token': $("meta[name='_token']").attr('content'),
			action_id : action_id , 
			menu_id : menu_id,
			check : check,
		}
	});
}

function insertRights(role_id , menu_id , action_id , menu_action_id)
{
	if($("#action_id" + menu_action_id).prop('checked') == true){
    
    	check = 'insert';
    		
    }else{
    	check = 'delete';
	}

	
	$.ajax({
		type: 'get',
		url : urlAction("insertrights"),
		data: {
			'_token': $("meta[name='_token']").attr('content'),
			role_id : role_id,
			menu_id : menu_id , 
			action_id : action_id , 
			check : check,
		}
	});
}

function insertRightEach(role_id , parent_id , check)
{
	swal({
		  title: "Are you sure?",
		  text: "Are you sure to allow  for these permissions?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes",
		  cancelButtonText: "No",
		  closeOnConfirm: true,
		  closeOnCancel: true,
		},
		function(isConfirm){
		  if (isConfirm) {
				
			$.ajax({
				type: 'get',
				url : urlAction("insertrighteach"),
				data: {
					'_token': $("meta[name='_token']").attr('content'),
					role_id:role_id,
					parent_id : parent_id,
					check : check,
				},
				success : function()
				{

					document.location.href = thisUrl();
				}
			});		  		

		  }
		

		});
}