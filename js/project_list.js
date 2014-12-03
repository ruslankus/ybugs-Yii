$(document).ready(function(e) {
    
	$(".prj-del").click(function(e) {
       var projectId  = $(this).data('prj');
       var prefix = $(this).data('prefix');
       loadDeleteModal(prefix,projectId);
       
       return false;
    });
	
});


function loadDeleteModal(prefix,projectId){
     $('.modal-dialog').load('/'+ prefix +'/projects/del/'+ projectId);
     $('.modal').modal('show');
}//loadDeleteModal