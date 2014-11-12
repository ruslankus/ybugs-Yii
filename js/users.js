$(document).ready(function(e) {
    
    $('.role > a').click(function(e) {
        var userId = $(this).data('id');
        loadModal(userId);
    });
	
});


function loadModal(id){
    $('.modal-dialog').load('/users/chuserstatus/');
    $('#changeStatus').modal();
}