<?php
$introduce = $get_introduce->row_array();
$about_us = $get_aboutus->row_array();
$products = $get_products->result_array();
$client_head = $get_client_head->row_array();
$system = $get_system->row_array();
$clients = $get_clients->result_array();
$social = $get_social->result_array();
$team = $get_team->result_array();
?>
<!-- floating -->
<ul id="menu" class="mfb-component--tr mfb-zoomin" data-mfb-toggle="hover">
  <li class="mfb-component__translate">
    <div class="mfb-component__button--translate">
      <?php
      echo form_open(site_url() . 'frontend/languages/', array('name' => 'langForm', 'id' => 'langForm'));

      $id = $this->uri->segment(3);
      ?>
      <input type="hidden" name="dlang" id="dlang">
      <input type="hidden" name="det" id="det" value="<?php echo $id; ?>">
      <input type="hidden" name="current" id="current" value="<?php echo substr(uri_string(), 1, strlen(uri_string())); ?>">
      <button class="btn btn-sm ml-1 mb-3 p-0" type="button" data-mfb-label-tl="Indonesia">
        <img style="box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 0 4px 8px rgba(0, 0, 0, 0.28);" src="<?php echo site_url() ?>assets/images/in.jpg" onClick="lanfTrans('id');" width="20">
      </button>
      <button class="btn btn-sm mb-3 p-0" type="button" data-mfb-label-tl="English">
        <img style="box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 0 4px 8px rgba(0, 0, 0, 0.28);" src="<?php echo site_url() ?>assets/images/en.jpg" onClick="lanfTrans('en');" width="20">
      </button>
      <button class="btn btn-sm mb-3 p-0" type="button" data-mfb-label-tl="Chinese">
        <img style="box-shadow: 0 0 4px rgba(0, 0, 0, 0.14), 0 4px 8px rgba(0, 0, 0, 0.28);" src="<?php echo site_url() ?>assets/images/zh-CN.jpg" onClick="lanfTrans('zh-CN');" width="20">
      </button>
      <?php
      echo form_close();
      ?>
    </div>
  </li>
</ul>
<ul id="menu" class="mfb-component--br mfb-zoomin" data-mfb-toggle="hover">
  <li class="mfb-component__wrap">
    <a href="#" class="mfb-component__button--main ">
      <i class="mfb-component__main-icon--resting fa fa-fw fa-comments"></i>
      <!-- <i class="mfb-component__main-icon--resting ion-plus-round"></i> -->
      <i class="mfb-component__main-icon--active ion-close-round"></i>
    </a>
    <ul class="mfb-component__list">
      <li>
        <a href="whatsapp://send?phone=6281380077386&text=Hello%2C%20Inasea%20team!%2C%20Please%20help%20me%2C%20how%20to%20order%20your%20product%3F" data-mfb-label="Send on Whatsapp" class="mfb-component__button--child">
          <i class="mfb-component__child-icon fab fa-whatsapp"></i>
        </a>
      </li>
      <li>
        <a href="tel:6281380077386" data-mfb-label="Call us" class="mfb-component__button--child">
          <i class="mfb-component__child-icon fa fa-fw fa-fw fa-phone"></i>
        </a>
      </li>
      <li>
        <a href="mailto:panjiforlak@gmail.com?body=Hello%2C%20Inasea%20team!%2C%20Please%20help%20me%2C%20how%20to%20order%20your%20product%3F" data-mfb-label="Send on Mail" class="mfb-component__button--child">
          <i class="mfb-component__child-icon fa fa-fw fa-envelope"></i>
        </a>
      </li>
    </ul>
  </li>
</ul>
<!-- end floating -->
<div class="row">
  <nav id="tmSidebar" class="tm-bg-blue-transparent tm-sidebar">
    <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="tm-sidebar-sticky">
      <div class="tm-brand-box">
        <div class="tm-double-border-1">
          <div class="tm-double-border-2">
            <h1 class="tm-brand text-uppercase">
              <img src="<?php echo base_url('uploads/system/' . $system['company_logo']); ?>" alt="Our Work Image" class="img-fluid">
            </h1>
          </div>
        </div>
      </div>

      <ul id="tmMainNav" class="nav flex-column text-uppercase text-right tm-main-nav">
        <li class="nav-item">
          <a href="#intro" class="nav-link active">
            <span class="d-inline-block mr-3" style="font-size: 13pt;"><?php echo translatetext('Home', $lang); ?></span>
            <span class="d-inline-block " style="font-size: 13pt;"><i class="tm-white-rect fas fa-fw fa-home"></i></span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#about" class="nav-link">
            <span class="d-inline-block mr-3" style="font-size: 13pt;"><?php echo translatetext('About', $lang); ?></span>
            <span class="d-inline-block tm-white-rect" style="font-size: 13pt;"><i class="fas fa-fw fa-address-card"></i></span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#work" class="nav-link">
            <span class="d-inline-block mr-3" style="font-size: 13pt;"><?php echo translatetext('Product', $lang); ?></span>
            <span class="d-inline-block tm-white-rect" style="font-size: 13pt;"><i class="fas fa-fw fa-fish"></i></span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#clients" class="nav-link">
            <span class="d-inline-block mr-3" style="font-size: 13pt;"><?php echo translatetext('Our Clients', $lang); ?></span>
            <span class="d-inline-block tm-white-rect" style="font-size: 13pt;"><i class="fas fa-fw fa-hand-holding-heart"></i></span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#talk" class="nav-link">
            <span class="d-inline-block mr-3" style="font-size: 13pt;"><?php echo translatetext("Let's Talk", $lang); ?> </span>
            <span class="d-inline-block tm-white-rect" style="font-size: 13pt;"><i class="fas fa-paper-plane"></i></span>
          </a>
        </li>
      </ul>
      <ul class="nav flex-row tm-social-links">
        <?php foreach ($social as $sc) : ?>
          <?php if ($sc['social_name'] == "Facebook") : ?>
            <li class="nav-item">
              <a href="<?php echo $sc['url']; ?>" class="nav-link tm-social-link">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
          <?php elseif ($sc['social_name'] == 'Twitter') : ?>
            <li class="nav-item">
              <a href="<?php echo $sc['url']; ?>" class="nav-link tm-social-link">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
          <?php elseif ($sc['social_name'] == 'Instagram') : ?>
            <li class="nav-item">
              <a href="<?php echo $sc['url']; ?>" class="nav-link tm-social-link">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          <?php elseif ($sc['social_name'] == 'Linkedin') : ?>
            <li class="nav-item">
              <a href="<?php echo $sc['url']; ?>" class="nav-link tm-social-link">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          <?php else : ?>
            No Social media
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
      <footer class="text-center text-white small">
        <p class="mb--0 mb-2"><?php echo $system['copyright']; ?></p>
      </footer>
    </div>
  </nav>

  <main role="main" class="ml-sm-auto col-12">
    <?php if ($introduce['banner'] == null) : ?>
      <div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url('uploads/introduce/banner/default-banner.jpg'); ?>">
      <?php else : ?>
        <div class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url('uploads/introduce/banner/' . $introduce['banner']); ?>">
        <?php endif; ?>
        <div class="tm-section-wrap">
          <section id="intro" class="tm-section">
            <div class="tm-bg-black-transparent tm-intro">
              <h2 class="tm-section-title mb-5 text-uppercase tm-color-white font-weight-bold">
                <?php echo translatetext($introduce['title'], $lang); ?>
              </h2>
              <p class="tm-color-danger">
                <?php echo translatetext($introduce['description'], $lang); ?>
              </p>
            </div>
          </section>
        </div>
        </div>

        <div class="tm-section-wrap bg-white" style="border-style: dotted; border-top:1px;border-right:1px;border-left:1px;border-color:maroon;">
          <section id="about" class="row tm-sectio">
            <div class="col-xl-6">
              <div class="tm-section-half">
                <div><i class="fas fa-6x fa-users mb-5 tm-section-icon"></i></div>
                <h2 class="tm-section-title tm-color-primary mb-5"><?php echo translatetext('About Us', $lang); ?></h2>
                <p class="mb-5">
                  <?php echo translatetext($about_us['about'], $lang); ?>
                </p>

              </div>
            </div>
            <div class="col-xl-6">
              <div class="tm-section-half">
                <div><i class="fa fa-6x fa-balance-scale mb-5 tm-section-icon"></i></div>
                <h2 class="tm-section-title tm-color-primary mb-5"><?php echo translatetext('Vision & Mission', $lang); ?></h2>
                <p class="mb-5">
                  <?php echo translatetext($about_us['vision'], $lang); ?>
                </p>
                <p>
                  <?php echo translatetext($about_us['mission'], $lang); ?>
                </p>
              </div>
            </div>
          </section>
          <section id="team" class="row tm-section">
            <div class="col-12 tm-section-pad">
              <div class="tm-flex-item-left">
                <div class="tm-w-100">
                  <h2 class="tm-color-primary tm-section-title mb-1 text-center"><?php echo translatetext("Our Team", $lang); ?></h2>
                  <p class="mb-5 text-center">
                    Know More About Us
                  </p>
                </div>
                <div class="tm-w-100">
                  <div class="text-center">
                    <?php foreach ($team as $t) : ?>
                      <figure class="figure">
                        <img src="<?php echo base_url('uploads/team/' . $t['photo']); ?>" class="cover" alt="Team Image">
                        <figcaption class="figure-caption">
                          <a class="btn btn-sm btn-primary p-0 px-1" href="<?php echo $t['social_link']; ?>"><i class="fab fa-linkedin-in"></i></a>
                        </figcaption>
                        <figcaption class="figure-caption">
                          <?php echo $t['name']; ?>
                        </figcaption>
                      </figure>
                    <?php endforeach; ?>
                  </div>
                </div>

              </div>
            </div>
          </section>
          <section id="value" class="row tm-section">
            <div class="col-12 tm-section-pad">
              <div class="tm-flex-item-left">
                <div class="tm-w-100">
                  <h2 class="tm-color-primary tm-section-title mb-1 text-center"><?php echo translatetext("Our Value", $lang); ?></h2>
                  <!-- <p class="mb-5"> -->
                  <?php echo $client_head['desc_client']; ?>
                  <!-- </p> -->
                </div>
                <div class="row tm-clients-images">
                  <?php foreach ($clients as $cli) : ?>
                    <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 tm-img-wrap">
                      <a href="https://google.com">
                        <img src="<?php echo base_url('uploads/clients/thumbnails/' . $cli['client_image']); ?>" alt="Client Image" class="img-fluid tm-client-img" />
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </section>
        </div>
        <div class="tm-section-wrap  bg-white" style="border-style: dotted; border-top:1px;border-right:1px;border-left:1px;border-color:maroon">
          <section id="work" class="row tm-section">
            <div class="col-12">
              <div class="w-100 tm-double-border-1 tm-border-gray">
                <div class="tm-double-border-2 tm-border-gray tm-box-pad">
                  <div class="tm-gallery-wrap">
                    <h2 class="tm-color-primary tm-section-title mb-4 ml-2"><?php echo translatetext('Our Product', $lang); ?></h2>
                    <div class="tm-gallery">
                      <?php foreach ($products as $prod) : ?>
                        <div class="tm-gallery-item">
                          <figure class="effect-bubba">
                            <img src="<?php echo base_url('uploads/product/thumbnails/' . $prod['image_thumbnail']); ?>" alt="Our Work Image" class="img-fluid">
                            <figcaption>
                              <h2><?php echo translatetext($prod['product_name'], $lang); ?></h2>
                              <p><?php echo translatetext($prod['short_description'], $lang); ?></p>
                              <a href="<?php echo base_url('uploads/product/images/' . $prod['image_large']); ?>">View more</a>
                            </figcaption>
                          </figure>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>


        <div class="tm-section-wrap bg-white" style="border-style: dotted; border-top:1px;border-right:1px;border-left:1px;border-color:maroon">
          <section id="clients" class="row tm-section">
            <div class="col-12 tm-section-pad">
              <div class="tm-flex-item-left">
                <div class="tm-w-80">
                  <h2 class="tm-color-primary tm-section-title mb-4"><?php echo translatetext('Our Clients', $lang); ?></h2>
                  <!-- <p class="mb-5"> -->
                  <?php echo translatetext($client_head['desc_client'], $lang); ?>
                  <!-- </p> -->
                </div>

                <div class="row tm-clients-images">
                  <?php foreach ($clients as $cli) : ?>
                    <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6 tm-img-wrap">
                      <a href="https://google.com">
                        <img src="<?php echo base_url('uploads/clients/thumbnails/' . $cli['client_image']); ?>" alt="Client Image" class="img-fluid tm-client-img" />
                      </a>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div class="tm-section-wrap bg-white">
          <section id="talk" class="row tm-section">
            <div class="col-xl-6 mb-5">
              <div class="tm-double-border-1 tm-border-gray">
                <div class="tm-double-border-2 tm-border-gray tm-box-pad">
                  <h2 class="tm-color-primary tm-section-title mb-4"><?php echo translatetext('Talk to Us', $lang); ?></h2>
                  <p class="mb-4">
                    <?php echo translatetext($system['desc_talk_to_us'], $lang); ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 mb-5">
              <div class="tm-contact-form-wrap">
                <form action="" method="POST" class="tm-contact-form">
                  <div class="form-group">
                    <input type="text" id="contact_name" name="contact_name" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="<?php echo translatetext('Your Name', $lang); ?>" required="" />
                  </div>
                  <div class="form-group">
                    <input type="email" id="contact_email" name="contact_email" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="<?php echo translatetext('Your Email', $lang); ?>" required="" />
                  </div>
                  <div class="form-group">

                    <input type="tel" id="phone" name="phone" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="<?php echo translatetext('Your Phone', $lang); ?>" required="" />
                  </div>
                  <div class="form-group">
                    <input type="company" id="contact_company" name="contact_company" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="<?php echo translatetext('Your Company', $lang); ?>" required="" />
                  </div>
                  <div class="form-group">
                    <textarea rows="4" id="contact_message" name="contact_message" class="form-control rounded-0 border-top-0 border-right-0 border-left-0" placeholder="<?php echo translatetext('Message...', $lang); ?>" required=""></textarea>
                  </div>

                  <div class="form-group mb-0">
                    <button type="submit" class="btn rounded-0 d-block ml-auto tm-btn-primary">
                      <?php echo translatetext('SEND', $lang); ?>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
  </main>
</div>