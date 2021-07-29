//JQuery
     $(document).ready(function(){
       var imageName = ["images/slideGreet1.png","images/slideGreet2.png","images/slideGreet3.png","images/slideGreet4.png","images/slideGreet5.png","images/slideGreet6.png"];
       var imageTitle = [""];
       var counter = 0;

       var clickaway =
           function go(){
             $("#picture").fadeOut(300,function(){
               $("#picture").attr("src",imageName[counter]);
               //alert(imageName[counter])
               $("#imageCaption").text(imageTitle[counter]);
               counter++;
               if(counter > 5 ){ counter = 0;}
               $("#picture").fadeIn(500).delay(5000);
               go();
             });
           }
           clickaway();
           //$("#picture").click(clickAway);
     });//end of document Ready;

     $(function(){
       $('#web_preload').fadeOut(500,function(){
         $('#content').fadeIn(500);
       });
     });
