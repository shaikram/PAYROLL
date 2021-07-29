$(document).ready(function(){
                                                                                                                                                                                         //
    $('#addEmployee').submit(function(e){
      e.preventDefault();
      var errorDiv = document.getElementById('empError');

            for(var a = 1; a <= 10; a++){
              var inp = 'inp'+a;
              var focus = document.getElementById(inp)
              var value = document.getElementById(inp).value
              var errorName = [
                "",
                "First Name",
                "Middle Name",
                "Last Name",
                "Designation",
                "Contact No.",
                "Address",
                "SSS Number",
                "Pag-ibig Number",
                "Philhealth Number",
                "TIN Number"
              ];


              switch(true){
                case value.length == 0:
                    errorDiv.innerHTML = "";
                    errorDiv.innerHTML += errorName[a] + ' is required!';
                    errorDiv.style.display = "block";
                    focus.focus();

                    return false;
                    break;

                case value.length <= 2:
                    errorDiv.innerHTML = "";
                    errorDiv.innerHTML += errorName[a] + ' must be atleast 3 or more string!';
                    errorDiv.style.display = "block";
                    focus.focus();

                    return false;
                    break;

              }

            }
            errorDiv.style.display = "none";
            var input1 = document.getElementById('inp1');

            // =======After passing Validation send the data to server========/
                $.ajax({
                      url:"employee-store",
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
                           errorDiv.innerHTML = "";
                           errorDiv.innerHTML += data.message;
                           errorDiv.style.display = "block";
                           input1.focus();

                           return false;
                         }else{
                           errorDiv.innerHTML = "";
                           errorDiv.style.display = "none";

                             for(var i = 1; i <= 10; i++){
                               if(i == 4){

                               }else{
                                 $('#inp'+i).val('');
                               }

                             }
                           window.location = "member-list";
                         }


                      }
                 });
           //=================================================================================//

    });



});
