@extends('layout.app')
@section('title')
CLIENT | SHOWFORCE SECURITY AGENCY
@endsection
@section('links')
  @include('require/links')
  <style media="screen">
    .navs5{
      padding: 5px 10px 5px 10px;
      background: #1491d2;
      border-radius: 20px;
      margin-top: -5px;
      color:#fff;
    }
  </style>
@endsection
@section('content')
  @include('require/bars')
  <div class="content">
    @include('require/nav')
    @include('require/containerc')
    @include('require/footer')
  </div>
@endsection
@section('scripts')
  @include('require/scripts')
  <!-- Add mousewheel plugin (this is optional) -->
  <script type="text/javascript" src={{ asset('fancy/lib/jquery.mousewheel.pack.js?v=3.1.3') }}></script>
  <!-- Add fancyBox main JS and CSS files -->
  <script type="text/javascript" src={{ asset("fancy/source/jquery.fancybox.pack.js?v=2.1.5") }}></script>
  <!-- Add Thumbnail helper (this is optional) -->
  {{-- <script type="text/javascript" src={{ asset("fancy/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7") }}></script> --}}
  <script type="text/javascript">
  $(document).ready(function(){
    $('.fancybox').fancybox();
    /*
     *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
     */
      $('[data-fancy]').fancybox({
        animationEffect : "slide",
        transitionEffect: "circular"
      });
     // Change title type, overlay closing speed
        $(".fancybox-effects-a").fancybox({
          helpers: {
            title : {
              type : 'outside'
            },
            overlay : {
              speedOut : 0
            }
          }
        });

        // Disable opening and closing animations, change title type
        $(".fancybox-effects-b").fancybox({
          openEffect  : 'none',
          closeEffect	: 'none',

          helpers : {
            title : {
              type : 'over'
            }
          }
        });

        // Remove padding, set opening and closing animations, close if clicked and disable overlay
        $(".fancybox-effects-d").fancybox({
          padding: 0,

          openEffect : 'elastic',
          openSpeed  : 150,

          closeEffect : 'elastic',
          closeSpeed  : 150,

          closeClick : true,

          helpers : {
            overlay : null
          }
        });

        /*
         *  Button helper. Disable animations, hide close button, change title type and content
         */

        $('.fancybox-buttons').fancybox({
          openEffect  : 'none',
          closeEffect : 'none',

          prevEffect : 'none',
          nextEffect : 'none',

          closeBtn  : false,

          helpers : {
            title : {
              type : 'inside'
            },
            buttons	: {}
          },

          afterLoad : function() {
            this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
          }
        });

    $('.fancybox-thumbs').fancybox({
      prevEffect : 'none',
      nextEffect : 'none',

      closeBtn  : false,
      arrows    : false,
      nextClick : true,

      helpers : {
        thumbs : {
          width  : 50,
          height : 50
        }
      }
    });
    // ================================================//
  });
  </script>
@endsection
