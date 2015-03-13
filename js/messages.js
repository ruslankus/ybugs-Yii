$(document).ready(function(e) {

      $('.modal-dialog').on('click','button.submit',function(){

        var value = $('#label-input').val();

        var prefix = $(this).data('prefix');

        if(value == ''){
            $('#label-input').next().css('display','block');
            return false;
        } 
        else
        {
            var link = '/'+ prefix +'/languages/UniqueCeckMessage';
            $.ajaxSetup({async:false});
            $.ajax({ type: "post",url:link,data:{label:value}}).done(function(data){
                
                obj = jQuery.parseJSON(data);
                console.log(obj);
                if(obj.status=="success")
                {        

                }
               
                if(obj.status=="error")
                {
                  
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
     
      

/* Messages translation events by Maxim */

    $('#translation').on('change','#lng_sel_mes',function(){
         if($(this).val() == ''){
            return false;
         }   
         selectMes(this);
    });

    //$('a.add-mes').click(function(e){});
    
    
     $('#translation').on('click','a.add-mes',function(){
         var prefix = $(this).data('prefix');
         loadModalMes(prefix);
        
     });


      $('#translation').on('click','a.mes-delete',function(){

         var prefix = $(this).data('prefix');
         var labelId = $(this).data('id');
         var labelName = $(this).data('label');
         
         loadDeleteModalMes(prefix,labelId,labelName);
        
     });

/* Messages translation events End  by Maxim */      
    
});




function fakeInput(obj,search){
    var nodeInput = "<input type='hidden' name='search-text' value='"+ search +"' />" ;
    var formObj = $(obj).parent().parent();
    $(formObj).append(nodeInput);
    
  
}


/* Messages translation functions by Maxim */

function loadModalMes(prefix){
    $('.modal-dialog').load('/'+ prefix +'/languages/AddMes');
    $('.modal').modal('show');

}//loadModal Add Message

function loadDeleteModalMes(prefix,labelId,labelName){
     $('.modal-dialog').load('/'+ prefix +'/languages/DelMes',{id : labelId, name: labelName});
     $('.modal').modal('show')
}//loadDeleteModal

function selectMes(obj){    
    lng = $(obj).val();
    prefix = $(obj).data('prefix');
    search_val = $('#search_label').val();  
    
    $(".table-holder").load('/'+ prefix +'/languages/listMes',{lng : lng, search_val : search_val});
}//select

/* Messages translation functions End  by Maxim */