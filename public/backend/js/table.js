$(document).ready(function(){
	$.fn.dataTableExt.oStdClasses["sFilter"] = "dataTables_filter search";
	
	$("#table").DataTable({
		"bSort": false
	});

	$('#action-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: urlAction("data"),
        columns: [
            { data: 'action', name: 'action' },
            { data: 'title', name: 'title' },
            { data: 'option', name: 'option' , class :'cell action' },
            
        ]
    });

    $('#role-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: urlAction("data"),
        columns: [
            { data: 'role', name: 'role' },
            { data: 'action', name: 'action' , class :'cell action' },
            
        ]
    });

    $('#user-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: urlAction("data"),
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'role', name: 'roles.role' },
            { data: 'fullname', name: 'fullname' },
            { data: 'action', name: 'action' , class :'cell action' },
            
        ]
    });

     $('#history-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: urlAction("data"),
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'values', name: 'values'},
            
        ]
    });

});