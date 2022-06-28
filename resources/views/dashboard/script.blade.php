<script type="text/javascript" src={{ asset("js/jquery-3.5.1.min.js") }}></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src={{ asset("js/addForm.js") }}></script>
<script type="text/javascript" src={{ asset("js/addEmployee.js") }}></script>
<script type="text/javascript" src={{ asset("js/editClient.js") }}></script>



<script>
  $(document).ready(function(){
    $("#reply_btn").click(function(){
      $("#reply_col").toggle();
    });
    $("#client_btn").click(function(){
      $("#client_col").toggle();
    });
    $("#gallery_btn").click(function(){
      $("#gallery_col").toggle();
    });
  });
</script>
