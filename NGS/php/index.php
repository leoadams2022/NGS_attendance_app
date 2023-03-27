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

    include 'head.php';
?>
</head>
<body>
<div class="hero_area" id="hero_area_id">
  <?php
    include 'header.php';
    //
    include 'slider.php';
  ?>
</div>


  <!-- about section -->
  <section class="about_section" id="about_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img2.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
            Communication is one of the most important aspects of any business looking to have good relations with its customers. That is why we at Norma Global solutions we use our experience and knowledge to make sure that your customers are always satisfied. We take the pressure of dealing with your customers on daily basis and we are confident we are able to deliver quality customer service services.
            </p>
            <a href="about.php">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->


  <!-- service section -->
  <section class="service_section layout_padding" id="service_section">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          Our Services
        </h2>
        <p>
          All your business needs in one place NGS.
        </p>
      </div>

      <div class="service_container">
        <div class="box">
          <div class="img-box">
            <img src="images/headphone.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
            Customer service
            </h5>
            <p>
            Norma Global solutions guarantee optimum results from our all-inclusive customer service facilities.
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/growth.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
            Telemarketing
            </h5>
            <p>
              We  will promote your product and increase your revenues by being one of the most powerful resources for your business.
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/brand-engagement.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
            Customer Acquisition
            </h5>
            <p>
            Direct selling, Up-Selling, Cross-Selling, and Retaining Customers are in our seasoned agents’ hands.
            </p>
          </div>
        </div>
        <!-- <div class="box">
          <div class="img-box">
            <img src="images/s-4.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Lorem, ipsum dolor.
            </h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            </p>
          </div>
        </div> -->

        <div class="box d-none">
          <div class="img-box">
            <img src="images/s-5.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              Lorem ipsum dolor sit.
            </h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            </p>
          </div>
        </div>

      </div>
      <div class="btn-box">
        <a href="service.php">
          Read More
        </a>
      </div>
    </div>
  </section>
  <!-- end service section -->

  <!-- work section -->
  <section class="work_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          We Work With
        </h2>
        <p>
          We Proudly Serve :
        </p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="detail_container">
            <div class="box b-1">
              <div class="top-box">
                <div class="icon-box">
                  <img src="images/world.png" alt="">
                </div>
                <h5>
                  TRAVEL & HOSPITALITY
                </h5>
              </div>
              <div class="bottom-box">
                <p>
                All businesses that provide accommodation, meals and drinks services and businesses such as hotels, motels, resorts, cafes, restaurants, clubs and casinos.
                </p>
              </div>
            </div>
            <div class="box b-1">
              <div class="top-box">
                <div class="icon-box">
                  <img src="images/healthcare.png" alt="">
                </div>
                <h5>
                HEALTH CARE
                </h5>
              </div>
              <div class="bottom-box">
                <p>
                All types of Health care organizations and Health insurance and  medical and pharmaceutical services
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail_container">
            <div class="box b-1">
              <div class="top-box">
                <div class="icon-box">
                  <img src="images/logistics.png" alt="">
                </div>
                <h5>
                LOGISTICS & SHIPPING
                </h5>
              </div>
              <div class="bottom-box">
                <p>
                Tracking the availability of items making sure there is enough stock for customer demand. Planning and coordinating the movement of goods from one location to another.
                </p>
              </div>
            </div>
            <div class="box b-1">
              <div class="top-box">
                <div class="icon-box">
                  <img src="images/networking.png" alt="">
                </div>
                <h5>
                Networking
                </h5>
              </div>
              <div class="bottom-box">
                <p>
                interacting and engaging with customers and provide you with advice. share the knowledge and skills to help your businesse, which will strengthen your relationships with customers.
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-6">
          <div class="img-box">
            <img src="images/work-img.png" alt="">
          </div>
        </div> -->
      </div>

      <div class="btn-box">
        <a href="how_we_work.php">
          Read More
        </a>
      </div>
    </div>
  </section>
  <!-- end work section -->

  <!-- team section -->
  <section class="team_section layout_padding2-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Meet The Team
        </h2>
        <p>
          consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>
    </div>
    <div class="team_container">
      <div class="box b-1">
        <div class="img-box team_img_box" id="">
          <img src="images/t-1.png" alt="">
        </div>
        <div class="detail-box">
          <h5>
            Yokit Den
          </h5>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
          </p>
          <div class="social_box">
            <a href="" class="a_i_in">
              <!-- <img src="images/fb.png" alt=""> -->
              <i class='bx bxl-facebook'></i>
            </a>
            <a href="" class="a_i_in">
              <!-- <img src="images/twitter.png" alt=""> -->
              <i class='bx bxl-twitter'></i>
            </a>
            <a href="" class="a_i_in">
              <!-- <img src="images/linkedin.png" alt=""> -->
              <i class='bx bxl-linkedin-square'></i>
            </a>
            <a href="" class="a_i_in">
              <!-- <img src="images/insta.png" alt=""> -->
              <i class='bx bxl-instagram-alt'></i>
            </a>
          </div>
        </div>
      </div>
      <div class="box b-2">
        <div class="img-box team_img_box" id="">
          <img src="images/t-2.png" alt="">
        </div>
        <div class="detail-box">
          <h5>
            Morde Den
          </h5>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
          </p>
          <div class="social_box">
            <a href="" class="a_i_in">
              <!-- <img src="images/fb.png" alt=""> -->
              <i class='bx bxl-facebook'></i>
            </a>
            <a href="" class="a_i_in">
              <!-- <img src="images/twitter.png" alt=""> -->
              <i class='bx bxl-twitter'></i>
            </a>
            <a href="" class="a_i_in">
              <!-- <img src="images/linkedin.png" alt=""> -->
              <i class='bx bxl-linkedin-square'></i>
            </a>
            <a href="" class="a_i_in">
              <!-- <img src="images/insta.png" alt=""> -->
              <i class='bx bxl-instagram-alt'></i>
            </a>
          </div>
        </div>
      </div>
      <div class="box b-3">
        <div class="img-box team_img_box" id="">
          <img src="images/t-3.png" alt="">
        </div>
        <div class="detail-box">
          <h5>
            Marry Doki
          </h5>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
          </p>
          <div class="social_box">
            <a href="" class="a_i_in">
              <!-- <img src="images/fb.png" alt=""> -->
              <i class='bx bxl-facebook'></i>
            </a>
            <a href="" class="a_i_in">
              <!-- <img src="images/twitter.png" alt=""> -->
              <i class='bx bxl-twitter'></i>
            </a>
            <a href="" class="a_i_in">
              <!-- <img src="images/linkedin.png" alt=""> -->
              <i class='bx bxl-linkedin-square'></i>
            </a>
            <a href="" class="a_i_in">
              <!-- <img src="images/insta.png" alt=""> -->
              <i class='bx bxl-instagram-alt'></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end team section -->

  <!-- client section -->
  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Testimonial
        </h2>
        <p>
          consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Normal distribution
                </h6>
                <p>
                  It is a long established fact that a reader will be distracted by the readable content of a page when
                  looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of
                  letters, as opposed to using 'Content here, content here', making it look
                </p>
                <!-- <img src="images/quote.png" alt=""> -->
                <span class="coma">&#10078;</span>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Normal distribution
                </h6>
                <p>
                  It is a long established fact that a reader will be distracted by the readable content of a page when
                  looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of
                  letters, as opposed to using 'Content here, content here', making it look
                </p>
                <!-- <img src="images/quote.png" alt=""> -->
                <span class="coma">&#10078;</span>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="container">
            <div class="box">
              <div class="img-box">
                <img src="images/client.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  Normal distribution
                </h6>
                <p>
                  It is a long established fact that a reader will be distracted by the readable content of a page when
                  looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                  distribution of
                  letters, as opposed to using 'Content here, content here', making it look
                </p>
                <!-- <img src="images/quote.png" alt=""> -->
                <span class="coma">&#10078;</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel_btn-container">
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

  </section>
  <!-- end client section -->




<div class="footer_bg"
<?php
  include 'contact.php';
  include 'foot.php';
?>