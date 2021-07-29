$(document).ready(function(){

  // ======================Update Form==================================//
  $('#updateC').submit(function(e){
    e.preventDefault();


    // =======After passing Validation send the data to server========/
        $.ajax({
              url:"../client-update",
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
                 if(data.condition == 'false'){
                   alert(data.message);
                   pos.focus();

                   return false;
                 }else{
                   alert("Successfully Updated");
                   var cid = data.message;
                   window.location = "../"+ cid +"/client-profile";
                 }


              }
         });
   //=================================================================================//

  });

});
