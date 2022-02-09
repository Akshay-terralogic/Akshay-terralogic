<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme_name
 */

get_header();
$t_options = get_option('tp_opt');
global $gdir;
?>

<main class="zw-topspace8">
  <section class="zw-resources-tabs zw-section-paddingb90">
    <div class="container"> 
      <div class="row"> 
        <div class="col-md-12"> 
          <div class="zw-heading-container pb-md-5 pt-4 pb-4">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo get_site_url(); ?>/press-release/"> Press release</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo get_site_url(); ?>/media-coverage/">Media coverage</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo get_site_url(); ?>/case-studies/">Case studies</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="<?php echo get_site_url(); ?>/blog/">Blogs</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link active" href="<?php echo get_site_url(); ?>/media-assets/">Media Assets</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

              <div class="row justify-content-between"> 
                <div class="col-md-4 col-lg-2">
                  <div class="ui dropdown c-media-dropdown">
                    <input type="hidden" name="sort">
                    <div class="default text">Videos</div><i class="dropdown icon"></i>
                    <div class="menu menu--resDropdown">
                      <div class="item" data-value="1" data-id="vedio-wrp">Videos</div>
                      <div class="item" data-value="0" data-id="photo-wrp">Photo</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="m-card-wrp">
                <div class="vedio-wrp resource-media-wrap active">
                  <div class="row m-card-wrp__container"> 
                    <div class="col-6 col-md-4 m-card-wrp__card">
                      <a class="text-decoration-none w-100" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticvideo"> 
                        <div class="m-card-wrp__img-wrp"> 
                          <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/v-img04.png" alt="">
                          <div class="vedio-play"><img src="<?php echo $gdir; ?>/img/resources/media-assets/vedio-play.svg" alt=""></div>
                        </div>
                        <div class="m-card-wrp__card__body">
                          <h4 class="fnt-gow-bold h3 fnt-14-resp"> Zetwerk Dialogues with Suresh Prabhu</h4>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="photo-wrp resource-media-wrap">
                  <div class="zw-heading-container pb-md-5 pb-3">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link nav-link--small active" id="pills-home-Rmedia-tab" data-bs-toggle="pill" data-bs-target="#pills-home-Rmedia" type="button" role="tab" aria-controls="pills-home-Rmedia" aria-selected="true">Key Projects</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link nav-link--small" id="pills-profile-Rmedia-tab" data-bs-toggle="pill" data-bs-target="#pills-profile-Rmedia" type="button" role="tab" aria-controls="pills-profile-Rmedia" aria-selected="false">Zetwerk Workspace</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link nav-link--small" id="pills-photos-Rmedia-tab" data-bs-toggle="pill" data-bs-target="#pills-photos-Rmedia" type="button" role="tab" aria-controls="pills-photos-Rmedia" aria-selected="false">Founders</button>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home-Rmedia" role="tabpanel" aria-labelledby="pills-home-Rmedia-tab"> 
                      <div class="row m-card-wrp__container"> <a class="col-6 col-md-4 m-card-wrp__card js-modal-popup" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/Aerospace &amp; Defence 2.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Building an Antenna Deployment Rig</h4>
                            <p class="info">A critical hinge mount part, ready for assembly. This small part plays an important role in the hinge ... </p>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/Apparel 3.jpeg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">State-of-the-art Machinery</h4>
                            <p class="info">Sophisticated machinery at work, at a critical Zetwerk partner facility...</p>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/Apparel 4.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Garments Galore</h4>
                            <p class="info">A glimpse into the hustle and bustle of the shop floor...</p>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop3"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/Consumer Goods 2.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">To The Small Screen</h4>
                            <p class="info">LED television production at Zetwerk’s partner facility in Coimbatore...</p>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop4"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/oil-gas1.png" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Marine Unloading Arms Installation</h4>
                            <p class="info">A marine unloading arms installation in an LPG terminal as part of a critical LPG import terminal project in Kerala.</p>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop5"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/oil-gas2.png" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Building the Nation’s Oil & Gas Assets</h4>
                            <p class="info">The fabrication and erection of above ground utility and process piping in an oil refinery...</p>
                          </div></a></div>
                    </div>
                    <!-- Zetwork workplace-->
                    <div class="tab-pane fade" id="pills-profile-Rmedia" role="tabpanel" aria-labelledby="pills-profile-Rmedia-tab">
                      <div class="row m-card-wrp__container"> <a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticphotos1"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-coverage/wokplace/1.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">The newly inaugurated workspace, Zetwerk's second office building</h4>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticphotos2"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-coverage/wokplace/2.jpeg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">The apparel product showroom in a quaint corner of the new office building</h4>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticphotos3"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-coverage/wokplace/3.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Zetwerk team celebrating Festivals at our workspace wearing ethnic clothing</h4>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticphotos4"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/careers/team-pic.webp" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Zetwerk team get together from a recent off-site to celebrate several milestones</h4>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticphotos5"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-coverage/wokplace/5.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Another team bonding exercise conducted earlier in 2021</h4>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticphotos6"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-coverage/wokplace/6.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Another glimpse of the airy, spacious new office</h4>
                          </div></a></div>
                    </div>
                    <div class="tab-pane fade" id="pills-photos-Rmedia" role="tabpanel" aria-labelledby="pills-photos-Rmedia-tab"> 
                      <div class="row m-card-wrp__container"><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticfounder1"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/team-members/Amrit.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Amrit Acharya</h4>
                            <p class="info">Co-founder & CEO</p>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticfounder2"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/team-members/SrinathRamakkrushnan.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Srinath Ramakkrushnan</h4>
                            <p class="info">Co-founder</p>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticfounder3"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/team-members/RahulSharma.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Rahul Sharma</h4>
                            <p class="info">Co-founder</p>
                          </div></a><a class="col-6 col-md-4 m-card-wrp__card" href="" type="button" data-bs-toggle="modal" data-bs-target="#staticfounder4"> 
                          <div class="m-card-wrp__img-wrp"> <img class="card-img" src="<?php echo $gdir; ?>/img/resources/media-assets/team-members/Vishal Chaudhary.jpg" alt=""></div>
                          <div class="m-card-wrp__card__body">
                            <h4 class="fnt-gow-bold h3 fnt-14-resp">Vishal Chaudhary</h4>
                            <p class="info">Co-founder</p>
                          </div></a></div>
                    </div>
                  </div>
                </div>
              </div>
              <!--model-->
              <div class="modal fade c-model" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header d-block">
                      <div class="main-head"> 
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="sub-head mt-2"> 
                        <h3 class="c-head">Building an Antenna Deployment Rig</h3>
                        <p class="c-desc">A critical hinge mount part, ready for assembly. This small part plays an important role in the hinge arm assembly, for an Antenna Deployment Rig. Zetwerk provides world-class solutions to customers across the Aerospace & Defense sector.</p>
                      </div>
                    </div>
                    <div class="modal-body p-0"> 
                      <div class="c-img"><img src="<?php echo $gdir; ?>/img/resources/media-assets/Aerospace &amp; Defence 2.jpg" alt=""></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
