{{-- Navigation Page --}}
@include('dashboard/nav1')
{{-- Content --}}

<section class="content content_div">
  <div class="container gfContainer">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 p-2">
        <button type="button" class="btn btn-outline-primary" id="gallery_btn">
            <i class="fa fa-plus"></i> <b>Add Photo</b>
        </button>
      </div>
    </div>
    <form class="row gfrmDiv" id="gallery_col" action="upload-photo" method="post" enctype="multipart/form-data">
      @csrf
      {{ csrf_field() }}
      @if(session()->has('success'))
          <div class="alert alert-success">
              {{ session()->get('success') }}
          </div>
      @endif
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfHeader">
        <i class="fa fa-image fa-lg text-success"></i> Upload Picture
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        Choose Section <span class="text-danger">*</span><br>
        <select class="form-control" name="section" required>
          <option value="Showforce">Showforce</option>
          <option value="Meetings">Meetings</option>
          <option value="Accreditation">Accreditation</option>
          <option value="Vehicles">Vehicles</option>
        </select>
        <input type="hidden" name="uploader" value="{{ $row->userId }}">
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv">
        Choose photo <span class="text-danger">*</span><br>
        <input type="file" class="form-control" name="images[]" accept="image/png, image/jpg, image/jpeg" required multiple>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12 gfdiv gfDivBtn">
        <input type="submit" class="btn btn-outline-primary" name="" value="UPLOAD">
        <input type="reset" class="btn btn-outline-secondary" name="" value="CANCEL">
      </div>
    </form>
    <div class="row gallerySection">
      <div class="col-sm-12 col-md-12 col-lg-12">
        <br><br><br>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h2>SHOWFORCE</h2>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
          @foreach ($showforce as $res)
            <div class="col-sm-12 col-md-4 col-lg-3 imgFrame">
              <a class="fancybox-thumbs" data-fancybox-group="thumb" title="SHOWFORCE" href="{{URL::asset('photo/'.$res->image)}}">
                <img src="{{URL::asset('photo/'.$res->image)}}" class="albumImg" alt="">
              </a>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h2>MEETINGS</h2>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
          @foreach ($meetings as $res)
            <div class="col-sm-12 col-md-4 col-lg-3 imgFrame">
              <a class="fancybox-thumbs" data-fancybox-group="thumb" title="MEETINGS" href="{{URL::asset('photo/'.$res->image)}}">
                <img src="{{URL::asset('photo/'.$res->image)}}" class="albumImg" alt="">
              </a>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h2>ACCREDITAION</h2>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
          @foreach ($accrreditation as $res)
            <div class="col-sm-12 col-md-4 col-lg-3 imgFrame">
              <a class="fancybox-thumbs" data-fancybox-group="thumb" title="ACCREDITAION" href="{{URL::asset('photo/'.$res->image)}}">
                <img src="{{URL::asset('photo/'.$res->image)}}" class="albumImg" alt="">
              </a>
            </div>
          @endforeach
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <h2>VEHICLES</h2>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="row">
          @foreach ($vehicles as $res)
            <div class="col-sm-12 col-md-4 col-lg-3 imgFrame">
              <a class="fancybox-thumbs" data-fancybox-group="thumb" title="VEHICLES" href="{{URL::asset('photo/'.$res->image)}}">
                <img src="{{URL::asset('photo/'.$res->image)}}" class="albumImg" alt="">
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>
</section>

{{-- Scripts --}}
@include('dashboard/script')
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




























                                                                                                                                                                                                                                   {{--  --}}
