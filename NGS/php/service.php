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
<style>
   .img{
        width: 200px;
        height: 200px;
        background-color: whitesmoke;
        border-radius: 10px;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
    }
</style>
</head>
<body  class="sub_page">
<div class="hero_area" id="hero_area_id">
  <?php
    include 'header.php';
    //
    // include 'slider.php';
  ?>
</div>


 <!-- service section -->
 <section class="service_section " id="service_section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12 mt-3 mb-3">
                <div class="row align-items-center justify-content-center box">
                    <div class="col-md-3 img ">
                        <img src="images/s-1.png" alt="">
                    </div>
                    <div class="col-md-9 text mt-3">
                        <h3>Lorem, ipsum.</h3>
                        <p class="text-md-left">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, aspernatur! Nisi inventore odit delectus ducimus excepturi laboriosam officia nesciunt fuga molestias ratione debitis animi tenetur quis sit, illo totam dolor veritatis labore ad quia fugiat cum porro! Quae reprehenderit fugiat exercitationem tenetur nostrum! Commodi, quaerat aperiam tempora perspiciatis hic esse?
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="row align-items-center justify-content-center box">
                    <div class="col-md-3 img order-md-2 order-sm-1">
                        <img src="images/s-2.png" alt="">
                    </div>
                    <div class="col-md-9 text order-md-1 order-sm-2 mt-3">
                        <h3>Lorem, ipsum.</h3>
                        <p class="text-md-left">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, aspernatur! Nisi inventore odit delectus ducimus excepturi laboriosam officia nesciunt fuga molestias ratione debitis animi tenetur quis sit, illo totam dolor veritatis labore ad quia fugiat cum porro! Quae reprehenderit fugiat exercitationem tenetur nostrum! Commodi, quaerat aperiam tempora perspiciatis hic esse?
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="row align-items-center justify-content-center box">
                    <div class="col-md-3 img ">
                        <img src="images/s-3.png" alt="">
                    </div>
                    <div class="col-md-9 text mt-3">
                        <h3>Lorem, ipsum.</h3>
                        <p class="text-md-left">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, aspernatur! Nisi inventore odit delectus ducimus excepturi laboriosam officia nesciunt fuga molestias ratione debitis animi tenetur quis sit, illo totam dolor veritatis labore ad quia fugiat cum porro! Quae reprehenderit fugiat exercitationem tenetur nostrum! Commodi, quaerat aperiam tempora perspiciatis hic esse?
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="row align-items-center justify-content-center box">
                    <div class="col-md-3 img order-md-2 order-sm-1">
                        <img src="images/s-4.png" alt="">
                    </div>
                    <div class="col-md-9 text order-md-1 order-sm-2 mt-3">
                        <h3>Lorem, ipsum.</h3>
                        <p class="text-md-left">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, aspernatur! Nisi inventore odit delectus ducimus excepturi laboriosam officia nesciunt fuga molestias ratione debitis animi tenetur quis sit, illo totam dolor veritatis labore ad quia fugiat cum porro! Quae reprehenderit fugiat exercitationem tenetur nostrum! Commodi, quaerat aperiam tempora perspiciatis hic esse?
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3 mb-3">
                <div class="row align-items-center justify-content-center box">
                    <div class="col-md-3 img ">
                        <img src="images/s-5.png" alt="">
                    </div>
                    <div class="col-md-9 text mt-3">
                        <h3>Lorem, ipsum.</h3>
                        <p class="text-md-left">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, aspernatur! Nisi inventore odit delectus ducimus excepturi laboriosam officia nesciunt fuga molestias ratione debitis animi tenetur quis sit, illo totam dolor veritatis labore ad quia fugiat cum porro! Quae reprehenderit fugiat exercitationem tenetur nostrum! Commodi, quaerat aperiam tempora perspiciatis hic esse?
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end service section -->


<div class="footer_bg"
<?php
//   include 'contact.php';
  include 'foot.php';
?>