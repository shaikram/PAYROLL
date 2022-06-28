$(document).ready(function(){

  // ======================Update Form==================================//
  $('#updateForm').submit(function(e){
    e.preventDefault();

    for(var a = 1; a <= 5; a++){
      var fc = 'af'+a;
      var af_focus = document.getElementById(fc)
      var af = document.getElementById(fc).value
      var errorName = [
        "",
        "First Name",
        "Middle Name",
        "Last Name",
        "Contact No.",
        "Address"
      ];


      switch(true){
        case af.length == 0:
            alert(errorName[a] + ' is required!');
            af_focus.focus();

            return false;
            break;

        case af.length <= 2:
            alert(errorName[a] + ' must be atleast 3 or more string!');
            af_focus.focus();

            return false;
            break;

        // case af.length >= 15:
        //     alert(errorName[a] + ' maximum length must be 15!');
        //     errorName.focus();
        //
        //     return false;
        //     break;

      }

    }



    // =======After passing Validation send the data to server========/
        $.ajax({
              url:"member-update",
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


                   return false;
                 }else{
                   alert(data.message);
                   window.location = "../user-profile";
                 }


              }
         });
   //=================================================================================//

  });




});
