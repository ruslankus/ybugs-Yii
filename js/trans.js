$(document).ready(function(e) {
 
    $('#translation').on('change','#lng_sel',function(){
         if($(this).val() == ''){
            return false;
         }   
		 select(this);
	});
	
    //$('a.add-label').click(function(e){});
    
    
     $('#translation').on('click','a.add-label',function(){
         var prefix = $(this).data('prefix');
         loadModal(prefix);
        
     });
     
      $('.modal-dialog').on('click','button.submit',function(){
        var value = $('#label-input').val();
        var prefix = $(this).data('prefix');

        if(value == ''){
            $('#label-input').next().css('display','block');
            return false;
        } 
        else
        {
            var link = '/'+ prefix +'/languages/UniqueCeckLabel';
            $.ajaxSetup({async:false});
            $.ajax({ type: "post",url:link,data:{label:value}}).done(function(data){
                
                obj = jQuery.parseJSON(data);

                if(obj.status=="success")
                {        

                }
               
                if(obj.status=="error")
                {
                    console.log(obj);
                   $('.duplicate').html(obj.err_txt);
                   $('#label-input').next().css('display','block');

                   return false;
                    
                }
               
            });

            
        }
        

       if(obj.status =='error'){
          return false;
       }
       
      });
      
      
      $('#translation').on('click','a.lbl-delete',function(){
         var prefix = $(this).data('prefix');
         var labelId = $(this).data('id');
         var labelName = $(this).data('label');
         
         loadDeleteModal(prefix,labelId,labelName);
        
     });
     
     $('#translation').on('click','.btn-save-lbl',function(){
        var search = $("#search_label").val();
        if(search != '' ){
            fakeInput(this,search)
        }
       
     });
     
	
});


function select(obj){
    
    lng = $(obj).val();
    prefix = $(obj).data('prefix');
    search_val = $('#search_label').val();  
    
    $(".table-holder").load('/'+ prefix +'/languages/list',{lng : lng, search_val : search_val});
}//select


function loadModal(prefix){
    $('.modal-dialog').load('/'+ prefix +'/languages/addlabel');
    $('.modal').modal('show');

}//loadModal

function loadDeleteModal(prefix,labelId,labelName){
     $('.modal-dialog').load('/'+ prefix +'/languages/dellabel',{id : labelId, name: labelName});
     $('.modal').modal('show')
}//loadDeleteModal

function fakeInput(obj,search){
    var nodeInput = "<input type='hidden' name='search-text' value='"+ search +"' />" ;
    var formObj = $(obj).parent().parent();
    $(formObj).append(nodeInput);
    
  
}
