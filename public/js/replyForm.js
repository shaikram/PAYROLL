$(document).ready(function(){
  $('#replyForm').submit(function(e){
    e.preventDefault();
    // =======After passing Validation send the data to server========/
        $.ajax({
              url:"../../reply-store",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type:"post",
              async:false,
              data:new FormData(this),
              dataType: 'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function(data){
                 // console.log(Response);
                 if(data.condition == 'true'){
                   alert(data.message);
                   $('#replyText').val('');
                   return true;
                 }else{
                   alert(data.message);
                   return false;
                 }
              }
         });
   //=================================================================================//

  });
  setInterval(function(){
    var messageId = $('#messageId').val();
      $.ajax({
         url:"../../showReply",
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         type:"post",
         async:false,
         data:{
           "messageId":messageId
         },
         success: function(data){
           $('#inboxRows').html(data);
         }
       });
  },1000);
});
