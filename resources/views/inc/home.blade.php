<div class="container-fluid homepage">
  <center>
      <div class="centerdiv">
        <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                  <div class="row rowstyle ">
                    <div class="col-sm-12 col-md-12 col-lg-12 searchdiv">
                      <div class="d-flex">
                        <div class="p-2 bardiv">
                          <a href="javascript:void(0);" id="ham_bar" onclick="mobilebar()">
                            <i class="fa fa-bars fa-2x fabars"></i>
                          </a>
                        </div>
                        <div class="p-2 ml-auto srchdiv">
                           <form class="input-group" action="search" method="post">
                             @csrf
                             {{ csrf_field() }}
                              <div class="form-outline">
                                <input type="search" name="search" id="form1" placeholder="Search..." class="form-control" required/>

                              </div>
                              <button type="submit" class="btn btn-primary">
                                GO
                              </button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row rowstyle">
                    <div class="col-sm-12 col-md-12 col-lg-4 logodiv">
                      <div class="d-flex justify-content-center">
                        <img src="{{ asset("images/SFSA_LOGO.png") }}" class="logoSFSA">
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8 align-items-center navdiv hideonmobile">
                      <ul class="ul_nav">
                        <a href="/">
                          <li class="navs1">HOME</li>
                        </a>
                        <a href="profile">
                          <li>PROFILE</li>
                        </a>
                        <a href="services">
                          <li>SERVICES</li>
                        </a>
                        <a href="equipment">
                          <li>EQUIPMENT</li>
                        </a>
                        <a href="clients">
                          <li>CLIENT</li>
                        </a>
                        <a href="management">
                          <li>MANAGEMENT</li>
                        </a>
                        <a href="gallery">
                          <li>GALLERY</li>
                        </a>
                      </ul>
                    </div>
                  </div>
                  <div class="row rowstyle">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="d-flex justify-content-center slidediv">
                             <h2 id="imageCaption"></h2>
                             <img src="{{ asset("images/slideGreet1.png") }}" class="slider-img" id="picture" alt="strawberry"/>

                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 ">
                      <div class="d-flex justify-content-center linediv">
                             <div class="logoline"></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 ">
                      <div class="d-flex justify-content-center linediv">
                         <article class="article-1">
                           <p>Providing security in Business, VIP's, Private Properties or any kind of Company that is  reliable and efficient to give a protection on any calamities.</p>
                         </article>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="d-flex justify-content-center timediv">
                        <div id='homeTime' class="homeTime">
                          <?php
                            $today = date('F jS Y'.', '.'g'.':'.'i'.':'.'s a');
                            echo "".$today."";
                          ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="d-flex justify-content-center arrowdiv">
                        <input type="hidden" id="s1" value="section1"></input>
                        <img src="images/arrowdown1.gif" id="sec1" class="arrowdown"/>
                      </div>

                    </div>
                  </div>
                </div>
        </div>
      </div>
  </center>
</div>
