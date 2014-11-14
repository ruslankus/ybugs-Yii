$(document).ready(function(e) {
    
    $('.action > a').click(function(e) {
        var userId = $(this).data('user');
        var action = $(this).data('action');
        console.log(action);
        loadModal(userId,action);
        return false;
    });
	
});


function loadModal(id,action){
    $('.modal-dialog').load('/users/chuser'+ action + '/',{id:id});
    $('#changeStatus').modal();
}