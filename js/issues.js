$(document).ready(function(e) {
    
    $(".del-res").click(function(){
        
        var resId = $(this).data('res');
        var lng = $(this).data('lng');
        var issue = $(this).data('issue');
        loadModal(lng, resId, issue);
        return false;
    });
});


function loadModal(lng, resId, issue){
    $('.modal-dialog').load('/'+ lng +'/issues/delres/'+ resId,{ 'issue': issue});
    $('.modal').modal();
}