$(document).ready(function(e) {
    
	$(".prj-del").click(function(e) {
       var projectId  = $(this).data('prj');
       
       loadDeleteModal()
       
       return false;
    });
	
});


function loadDeleteModal(prefix,projectId){
     $('.modal-dialog').load('/'+ prefix +'/project/del',{id : projectId});
     $('.modal').modal('show')
}//loadDeleteModal