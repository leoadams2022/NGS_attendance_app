<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title><?=$page_name?></title>
  <!-- page icon  -->
  <link rel="icon" type="image/x-png" href="https://i.postimg.cc/FHhcxPQW/NGSLogo-removebg-White.png">
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- box iconx  -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    
    .logo_svg_path{
      stroke-width: 2px;
      stroke: var(--logo_outline_color);/*rgb(255, 255, 255);*Out line color */
    }
    .logo_path_1{
      stroke-dashoffset: 509.231px;
      stroke-dasharray: 509.231px;
      animation: 5.3s linear 0s infinite normal none running logo_svg-text-anim;
    }
    .logo_path_2{
      stroke-dashoffset: 419.182px;
      stroke-dasharray: 419.182px;
      animation: 5.3s linear 1.1s infinite normal none running logo_svg-text-anim;
    }
    .logo_path_3{
      stroke-dashoffset: 363.329px;
      stroke-dasharray: 363.329px;
      animation: 5.3s linear 2.2s infinite normal none running logo_svg-text-anim;
    }
    @-webkit-keyframes logo_svg-text-anim {
       40% {
          stroke-dashoffset: 0;
          fill: transparent;
        }
        60% {
          stroke-dashoffset: 0;
          fill: var(--logo_fill_color);/*#ffffff; *logo fill color */
        }
        100% {
          stroke-dashoffset: 0;
          fill: var(--logo_fill_color);/*#ffffff; *logo fill color */
        }
        
    }
    /* Most browsers */
    @keyframes logo_svg-text-anim {
       40% {
          stroke-dashoffset: 0;
          fill: transparent;
        }
        60% {
          stroke-dashoffset: 0;
          fill: var(--logo_fill_color);/*#ffffff; *logo fill color */
        }
        100% {
          stroke-dashoffset: 0;
          fill: var(--logo_fill_color);/*#ffffff; *logo fill color */
        }
        
    }
  </style>
