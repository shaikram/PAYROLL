$(document).ready(function(){
  //====Web Navigation Variables
  var sec1 = document.getElementById('sec1');
  var s1 = document.getElementById('s1').value;
  var fa1 = document.getElementById('fa1');


  sec1.addEventListener("click", function(){
    $("html, body").animate({
      scrollTop:$("#scroll-" + s1).offset().top
    },200);

  });

});
