<?php
    include 'head.php';
?>
<style>
    @media (max-width: 768px){
    .about_section .img-box {
        margin-top: 0px !important;
        }
    }
</style>
</head>
<body  class="sub_page">
<div class="hero_area" id="hero_area_id">
  <?php
    $page_name;
    if(basename(__FILE__) == 'index.php') {
        $page_name = 'NGS';
      }elseif(basename(__FILE__) == 'about.php'){
        $page_name = 'NGS About';
      }elseif(basename(__FILE__) == 'service.php'){
        $page_name = 'NGS Service';
      }elseif(basename(__FILE__) == 'how_we_work.php'){
        $page_name = 'NGS How We Work';
      }else{
        $page_name = 'Not_found';
      }
    include 'header.php';
    //
    // include 'slider.php';
  ?>
</div>

  <!-- about section -->
  <section class="about_section ">
    <div class="container">

        <div class="row">
            <div class="col-md-6">
              <div class="detail-box">
                <div class="heading_container">
                  <h2>
                    About Us
                  </h2>
                </div>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam nam nesciunt distinctio assumenda aperiam, eos aliquam dolorem rerum itaque et omnis vero placeat labore saepe aut, maiores, fugit neque repellendus. Nihil quidem architecto similique nostrum dolore cum. Pariatur earum voluptatum architecto sed! Quibusdam nisi odio neque reprehenderit consequatur voluptates maxime?
                </p>
              </div>
            </div>
            <div class="col-md-6">
                <div class="img-box">
                  <img src="images/my_vector.png" alt="">
                </div>
            </div>
        </div>

      <div class="row">
        <div class="col-md-6 order-2 order-md-1">
          <div class="img-box">
            <img src="images/about-img2.png" alt="">
          </div>
        </div>
        <div class="col-md-6 order-1 order-md-2">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Lorem, ipsum dolor.
              </h2>
            </div>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur vel provident nesciunt. Consequatur voluptates nulla explicabo, culpa ipsum totam, consectetur, sit suscipit reprehenderit eos tempore? Excepturi, architecto qui! Architecto saepe modi neque est! Voluptatem eligendi saepe quaerat explicabo sequi vel!
            </p>
          </div>
        </div>
      </div>



    </div>
  </section>
  <!-- end about section -->


<div class="footer_bg"
<?php
//   include 'contact.php';
  include 'foot.php';
?>