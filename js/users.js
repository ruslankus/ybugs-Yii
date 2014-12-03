$(document).ready(function(e) {
    
    $('a.user-act').click(function(e) {
        var userId = $(this).data('user');
        var action = $(this).data('action');
        console.log(action);
        loadModal(userId,action);
        return false;
    });
    
    
    $('.btn-add-prj').click(function(){
        var project = $(this).data('prj');
        if($('#pr_' + project).length > 0 ){
            return false;
        }
        
    });
	
});


function loadModal(id,action){
    $('.modal-dialog').load('/users/chuser'+ action + '/',{id:id});
    $('#changeStatus').modal();
}