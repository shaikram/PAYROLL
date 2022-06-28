$(document).ready(function(){

    $('#addForm').submit(function(e){
      e.preventDefault();

      for(var a = 1; a <= 9; a++){
        var fc = 'af'+a;
        var af_focus = document.getElementById(fc)
        var af = document.getElementById(fc).value
        var errorName = [
          "",
          "First Name",
          "Middle Name",
          "Last Name",
          "Address",
          "Position",
          "Contact No.",
          "Email",
          "Password",
          "Confirm password"
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

      var pass = document.getElementById('af8');
      var cpass = document.getElementById('af9');
      var pass_val = document.getElementById('af8').value;
      var cpass_val = document.getElementById('af9').value;
      var cont = document.getElementById('af6');
      var cont_val = document.getElementById('af6').value;
      var pos = document.getElementById('af5');

      if(cont_val.length >= 12){
        alert(cont_val+"Contact number maximum length is 11!");
        cont.focus();
        return false;
      }

      if(pass_val != cpass_val){
        alert("Password doesn't match!");
        pass.style.border = "1px solid red";
        cpass.style.border = "1px solid red";
        pass.focus();
        cpass.focus();
        return false;
      }

      // =======After passing Validation send the data to server========/
          $.ajax({
                url:"member-store",
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
                     alert(data.message);
                     window.location = "member-list";
                   }


                }
           });
     //=================================================================================//

    });



});
