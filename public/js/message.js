$(document).ready(function(){
  $('#inqForm').submit(function(e){
    e.preventDefault();
    var errorP = document.getElementById('errorP');
    var errorD = document.getElementById('errorD');

      for (var i = 1; i < 4; i++) {
        var inp = 'inp'+i;
        var focus = document.getElementById(inp);
        var val = document.getElementById(inp).value;
        var error = ["", "Email", "Name", "Subject", "Message"];

          switch(true){
            case val.length == 0:
                errorD.innerHTML = "";
                errorD.innerHTML += error[i] + ' is required!';
                errorP.style.display = "none";
                errorD.style.display = "block";
                focus.focus();

                return false;
                break;

            case val.length <= 2:
                errorD.innerHTML = "";
                errorD.innerHTML += error[i] + ' must be atleast 3 or more string!';
                errorP.style.display = "none";
                errorD.style.display = "block";
                focus.focus();

                return false;
                break;
          }


      }

      // =======After passing Validation send the data to server========/
          $.ajax({
                url:"message-store",
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
                     errorP.innerHTML = "";
                     errorP.innerHTML += data.message;
                     errorD.style.display = "none";
                     errorP.style.display = "block";
                     $('#inp1').val('');
                     $('#inp2').val('');
                     $('#inp3').val('');
                     $('#inp4').val('');
                     return true;
                   }else{
                     errorD.innerHTML = "";
                     errorD.innerHTML += data.message;
                     errorP.style.display = "none";
                     errorD.style.display = "block";
                     return false;
                   }
                }
           });
     //=================================================================================//
  });
});
