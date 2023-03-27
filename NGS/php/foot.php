>




    <!-- info section -->
    <section class="info_section layout_padding2">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="info_logo">
              <h3>
                Norma Global Solutions
              </h3>
              <p>
                Lorem ipsum dolor sit.
              </p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_links">
              <h4>
                BASIC LINKS
              </h4>
              <ul class="  ">
                <li class=" <?php echo ($page_name == 'NGS') ? "active" : "";?>">
                  <a class="" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="<?php echo ($page_name == 'NGS About') ? "active" : "";?>">
                  <!-- onclick="scrollTo_('#about_section') service_section  contactLink-->
                  <a class="" <?php echo ($page_name != 'NGS') ? 'href="about.php"':'onclick="scrollTo_(\'#about_section\')"';?>> About</a>
                </li>
                <li class="<?php echo ($page_name == 'NGS Service') ? "active" : "";?>">
                  <a class="" <?php echo ($page_name != 'NGS') ? 'href="service.php"':'onclick="scrollTo_(\'#service_section\')"';?>> Services </a>
                </li>
                <li class="<?php echo ($page_name == '') ? "" : "";?>">
                  <a class="" <?php echo ($page_name != 'NGS') ? 'href="index.php#contactLink"':'onclick="scrollTo_(\'#contactLink\')"';?>>Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <h4>
                CONTACT DETAILS
              </h4>
              <a href="tel:1151866622">
                <div class="img-box">
                  <!-- <img src="images/telephone-white.png" width="12px" alt=""> -->
                  <i class='bx bx-mobile' ></i>
                </div>
                <p>
                    1151866622
                </p>
              </a>
              <a href = "mailto:demo@gmail.com">
                <div class="img-box">
                  <!-- <img src="images/envelope-white.png" width="18px" alt=""> -->
                  <i class='bx bxs-envelope' ></i>
                </div>
                <p>
                  demo@gmail.com
                </p>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_form ">
              <h4>
                NEWSLETTER
              </h4>
              <form action="">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
              <div class="social_box">
                <a href="">
                  <!-- <img src="images/info-fb.png" alt=""> -->
                  <i class='bx bxl-facebook' ></i>
                </a>
                <a href="">
                  <!-- <img src="images/info-twitter.png" alt=""> -->
                  <i class='bx bxl-twitter' ></i>
                </a>
                <a href="">
                  <!-- <img src="images/info-linkedin.png" alt=""> -->
                  <i class='bx bxl-linkedin' ></i>
                </a>
                <a href="">
                  <!-- <img src="images/info-youtube.png" alt=""> -->
                  <i class='bx bxl-youtube' ></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end info_section -->


    <!-- footer section -->
    <section class="container-fluid footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          NGS
        </p>
      </div>
    </section>
    <!-- footer section -->

</div><!-- this is for the footer -->

    <!-- jquery-3.4.1.min.js -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- bootstrap.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/HexToRgb.js"></script>
    <script type="text/javascript">
    // Leo Adams add Js 
    function scrollTo_(selector) {
        document.querySelector(selector).scrollIntoView({ behavior: 'smooth' })
    }

    // to get current year
    function getYear() {
        var currentDate = new Date();
        var currentYear = currentDate.getFullYear();
        document.querySelector("#displayYear").innerHTML = currentYear;
    }
    getYear();

    </script>  
</body>

</html>