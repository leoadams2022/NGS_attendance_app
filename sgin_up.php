<?php
  session_start();
  header("Content-type: text/html; charset=utf-8");
  include('compo/config.php');
  include 'clasess/Users_Class.php';
  include 'clasess/Token_Class.php';
  if(isset($_SESSION["user_name"])){
    // if sgined in dont let user go to the sgin in or sgin up page
    header('location: Dashboard.php');
       
  }else{
    if(isset($_COOKIE['remember_me'])){
      $token_class = new Token_Class();
      $userN = json_decode($_COOKIE['remember_me'])->username;
      $hashed_string = json_decode($_COOKIE['remember_me'])->hashed_string;
      $tokenID = json_decode($_COOKIE['remember_me'])->id;
      $test = $token_class->Validate_remember_me_token($hashed_string,$userN,$tokenID);
      if($test === 'good'){
        // session_start();
        $usercalss = new Users_Class;
        $user = $usercalss->get_by_useranme($userN);
        $user = array_merge(...$user);
        $_SESSION["id"] = $user['id'];
        $_SESSION["first_name"] = $user['first_name'];
        $_SESSION["last_name"] = $user['last_name'];
        $_SESSION["email"] = $user['email'];
        $_SESSION["user_name"] = $user['user_name'];
        $_SESSION["gender"] = $user['gender'];
        $_SESSION["phone"] = $user['phone'];
        $_SESSION["address"] = $user['address'];
        $_SESSION["password"] = $user['password'];
        $_SESSION["campaign"] = $user['campaign'];
        $_SESSION["rank"] = $user['rank'];
        $_SESSION["education"] = $user['education'];
        $_SESSION["experience"] = $user['experience'];
        $_SESSION["created_at"] = $user['created_at'];
        $id =  $_SESSION["id"];
        $first_name = $_SESSION["first_name"] ;
        $last_name = $_SESSION["last_name"] ;
        $email = $_SESSION["email"];
        $user_name = $_SESSION["user_name"];
        $gender = $_SESSION["gender"];
        $phone = $_SESSION["phone"] ;
        $address = $_SESSION["address"];
        $password =  $_SESSION["password"];
        $rank = $_SESSION["rank"];
        $campaign = $_SESSION['campaign'];
        $education = $_SESSION["education"];
        $experience = $_SESSION["experience"];
        $created_at = $_SESSION["created_at"];
        header('location: Dashboard.php');
      }
    }else{
    }
  }
?>
<!-- <!doctype html> -->
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!-- page icon  -->
    <link rel="icon" type="image/x-png" href="https://i.postimg.cc/FHhcxPQW/NGSLogo-removebg-White.png">
    <!--bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- jquery js  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jquery.dataTables js -->
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <!-- jquery.dataTables css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <!-- for the nav bar -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <!-- popup lib  css -->
    <link href="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css" type="text/css" rel="stylesheet" />
    <!-- popup lib  js -->
    <script src="//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
    <!-- for the nav bar -->
    <style>
          ::-webkit-scrollbar {
            width: 8px;
          }

          /* Track */
          ::-webkit-scrollbar-track {
            background: #f1f1f1;
          }

          /* Handle */
          ::-webkit-scrollbar-thumb {
            background: #888;
          }

          /* Handle on hover */
          ::-webkit-scrollbar-thumb:hover {
            background: #555;
          }

          @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

          :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: #4723D9;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
          }

          *,
          ::before,
          ::after {
            box-sizing: border-box
          }

          body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
          }

          a {
            text-decoration: none
          }

          
        /* Start by setting display:none to make this hidden.
        Then we position it in relation to the viewport window
        with position:fixed. Width, height, top and left speak
        speak for themselves. Background we set to 80% white with
        our animation centered, and no-repeating */
      .modal_loading {
          display:    none;
          position:   fixed;
          z-index:    1000;
          top:        0;
          left:       0;
          height:     100%;
          width:      100%;
          background: rgba( 255, 255, 255, .8 ) 
                      url('https://media.tenor.com/joLYNfFQGDgAAAAi/loading.gif') 
                      50% 50% 
                      no-repeat;
      }

      /* When the body has the loading class, we turn
        the scrollbar off with overflow:hidden */
      body.loading {
          overflow: hidden;   
      }

      /* Anytime the body has the loading class, our
        modal element will be visible */
      body.loading .modal {
          display: block;
      }
      
      /**----------------------- */
	  </style>
<title>Sgin up</title>
 <!-- Custom styles for this template -->
 <link href="assets/css/sign-in.css" rel="stylesheet">
<style>
      @media screen and (min-width: 768px){
        body{
          padding: 0px !important;
        }
      }   
</style>

</head>
<body class="text-center">
<div class="container">
 <!--
  ----------------------------------------------------------------------------------------
-->
<main class="form-signin w-100 m-auto">
<form action="">
          <div class="row">
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">first_name :<span class="required_span ms-2 text-danger fs-5">*</span></label>
                <input type="text" id="first_name_input" class="form_input form-control" placeholder="Enter first_name" required>
              </div>
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">last_name :<span class="required_span ms-2 text-danger fs-5">*</span></label>
                <input type="text" id="last_name_input" class="form_input form-control" placeholder="Enter last_name" required>
              </div>
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">user_name :<span class="required_span ms-2 text-danger fs-5">*</span></label>
                <input type="text" id="user_name_input" class="form_input form-control" placeholder="Enter user_name" required>
              </div>
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">gender :<span class="required_span ms-2 text-danger fs-5">*</span></label>
                <select type="text" id="gender_input" class="form_input form-control" placeholder="Enter gender" required>
                  <option value="">--</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">password :<span class="required_span ms-2 text-danger fs-5">*</span></label>
                <input type="password" id="password_input" class="form_input form-control" placeholder="Enter password" required>
              </div>
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">email :<span class="required_span ms-2 text-danger fs-5">*</span></label>
                <input type="email" id="email_input" class="form_input form-control" placeholder="Enter email" required>
              </div>
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">phone :<span class="required_span ms-2 text-danger fs-5">*</span></label>
                <input type="number" min="0" id="phone_input" class="form_input form-control" placeholder="Enter phone" required>
              </div>
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">address :<span class="required_span ms-2 text-danger fs-5">*</span></label>
                <input type="text" id="address_input" class="form_input form-control" placeholder="Enter address" required>
              </div>
              <div class="col-md-12 col-lg-6">
                <label for="" class="form-label">education :</label>
                <textarea type="text" id="education_input" class="form_input form-control" placeholder="Enter education"></textarea>
              </div>
              <div class="col-md-12 col-lg-6">
                <label for="" class="form-label">experience :</label>
                <textarea type="text" id="experience_input" class="form_input form-control" placeholder="Enter experience"></textarea>
              </div>
              <div class="col-md-12">
                <!-- alertbox_success alertbox_danger -->
                <div class="alert alert-danger" id="alertbox_danger" style='display:none;' role="alert"></div>
                <div class="alert alert-success" id="alertbox_success" style='display:none;' role="alert"></div>
              </div>
              <div class="col-md-12">
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" id="sginup">Sgin Up</button>
              </div>
          </div>
</form>
</main>

<script>
$(document).ready(function(){
<?php
  if(isset($_GET['key1'])&&isset($_GET['key2'])){
  echo 'let key1 = "'.$_GET['key1'].'",key2 = '.$_GET['key2'].';';
  }else{
    echo 'let key1 = null,key2 = null;';
  }
?>


if(typeof key1 === "undefined" || typeof key2 === "undefined" ){
  $('body').html('')
  alert('this link is not valid');
}else if(key1 === null ||  key2 === null){
  $('body').html('')
  alert('this link is not valid');
}
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        // geting form data
        let first_name = $('#first_name_input').val();
        let last_name = $('#last_name_input').val();
        let user_name = $('#user_name_input').val();
        let gender = $('#gender_input').val();
        let password = $('#password_input').val();
        let email = $('#email_input').val();
        let phone = $('#phone_input').val();  
        let address = $('#address_input').val();

        let education = $('#education_input').val();
        if(education === ''){
          education = null;
        }
        let experience = $('#experience_input').val();
        if(experience === ''){
          experience = null;
        }

      

        // Send the form data using post
        $.ajax({
        // the url
        url: 'controlar/sgin_up.cont.php',
        // http method
        type: 'POST', 
        // data to submit
        data: {
              needTo: 'add_new_agent',
              key1: key1,
              key2: Number(key2),

              first_name: first_name,
              last_name: last_name,
              user_name: user_name,
              gender: gender,
              password: password,
              email: email,
              phone: phone,
              address: address,
              education: education,
              experience: experience,

              campaign: null,
              salary:  null,
              enter_time: null,
              leave_time: null
            },  
        beforeSend: function() { 
            $body = $("body");
            $body.addClass("loading"); 
        },
        complete: function() {
            $body = $("body");
            $body.removeClass("loading");
            },
        success: function(data, status, xhr){
          var res = JSON.parse(data);
          // console.log(res);
            if(res.state == 'good'){
              //alertbox_success alertbox_danger
              $('#alertbox_success').html(res.msg);
              $('#alertbox_success').show(500);
              setTimeout(() => {
                $('#alertbox_success').hide(500);
                window.location.href = '<?=ROOT?>'+'sgin_in.php';
              }, 2000);
            }else{
              $('#alertbox_danger').html(res.msg);
              $('#alertbox_danger').show(500);
              setTimeout(() => {$('#alertbox_danger').hide(500);}, 3000);
            }     
            },
        error: function (Xhr, textStatus, errorMessage) {
            console.log('Error' + errorMessage + ' status: '+ textStatus);
            }                                       
      });
    });
});
</script>
<?php
include 'compo/foot.php';
?>
