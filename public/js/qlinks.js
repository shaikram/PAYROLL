function qlinks(a){
  $("html, body").animate({
    scrollTop:$("#scroll" + a).offset().top
  },200);
}
