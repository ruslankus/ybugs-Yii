$(document).ready(function(e) {
 
    $('#translation').on('change','#lng_sel',function(){
         if($(this).val() == ''){
            return false;
         }   
		 select(this);
	});
	
	
});


function select(obj){
    
    lng = $(obj).val();
    prefix = $(obj).data('prefix'); 
    
    $(".table-holder").load('/'+ prefix +'/languages/list',{lng : lng});
}