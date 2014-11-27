$(document).ready(function(e) {
    
	$('#lng_sel').change(function(e) {
        lng = $(this).val();
        prefix = $(this).data('prefix'); 
        
        $(".table-holder").load('/'+ prefix +'/languages/list',{lng : lng})
    });
	
});