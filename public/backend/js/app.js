$(document).ready(function(){

	$("#submit_wrapper").click(function(){
		$(".main-editor").submit();
	});

	$("#span_en").click(function(){
		$(".main-editor").submit();
	});



	$("#content_english").hide();

	$("#content_banner").hide();

	$( "#datepicker" ).datepicker({
	  	  	changeYear: true,
	  	  	changeMonth: true,
	  	  	dateFormat: "dd-mm-yy"

  	  });
	$( "#datepicker2" ).datepicker({
	  	  	changeYear: true,
	  	  	changeMonth: true,
	  	  	dateFormat: "dd-mm-yy"

  	  });

	
	$("#status_gallery").change(function(){

		if($(this).val() == 'v')
		{
			
			$("#content_video").show();
			$("#content_picture").hide();

		}else{

			$("#content_video").hide();
			$("#content_picture").show();

		}

	});

	
});

function activeBahasa()
{
	$("#tab_bahasa").addClass('active');
	$("#tab_english").removeClass('active');
	$("#tab_banner").removeClass('active');

	$("#content_bahasa").show();
	$("#content_english").hide();
	$("#content_banner").hide();
}

function activeEnglish()
{
	$("#tab_bahasa").removeClass('active');
	$("#tab_english").addClass('active');
	$("#tab_banner").removeClass('active');

	$("#content_bahasa").hide();
	$("#content_english").show();
	$("#content_banner").hide();
}

function activeBanner()
{
	$("#tab_bahasa").removeClass('active');
	$("#tab_english").removeClass('active');
	$("#tab_banner").addClass('active');

	$("#content_bahasa").hide();
	$("#content_english").hide();
	$("#content_banner").show();
}


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

