<?php
include 'compo/head.admin.php';
/************  Dont forget you have acsess to ****************
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
*/
?>
<!-- adding the search plugin  -->
<script src="<?=ROOT?>admin/compo/assets/js/jquery-search.js"></script>
<title>Admin Tools</title>
<style>
.generate_sgin_up_link{
  display: none
}
</style>
</head>
<?php
include 'compo/navbar.admin.php';
?>
<div class="container">
  <ul class="nav nav-pills flex-row  nav-fill" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Add Agent</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active text-dark mt-2 w-100" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <!-- ``, `first_name`, `last_name`,`user_name` `email`, , `phone`,`password`, 
                  `gender`, ``,      `campaign` salary   ,enter_time`, `leave_time`
                  `education`, `experience`, ``,
                  ``, ``, `, `` -->
        <a  href="#generate_sgin_up_link" id="geneeate_sgin_up_link_a" >Open ajax content in lightbox</a>
        <div id="generate_sgin_up_link"  class="generate_sgin_up_link">
          <a id="h3_link">generate_sgin_up_link</a>
        </div>

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
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">campaign :</label>
                <input type="text" id="campaign_input" class="form_input form-control" placeholder="Enter campaign">
              </div>
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">salary :</label>
                <input type="number" min="0" max="5000"id="salary_input" class="form_input form-control" placeholder="Enter salary">
              </div>
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">enter_time :</label>
                <input type="time" id="enter_time_input" class="form_input form-control" placeholder="Enter enter_time" >
              </div>
              <div class="col-md-6 col-lg-4">
                <label for="" class="form-label">leave_time :</label>
                <input type="time" id="leave_time_input" class="form_input form-control" placeholder="Enter leave_time" >
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
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" id="sginup">ADD Agent</button>
              </div>
          </div>
        </form>
        <!-- ``, `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`, `campaign`, ``, `education`, `experience`, `target`, `salary`, ``, `enter_time`, `leave_time`, `` -->

    </div>
    <div class="tab-pane fade text-dark mt-2" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <p>This is A TAB Named : profile</p>
    </div>
    <div class="tab-pane fade text-dark mt-2" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        <p>This is A TAB Named : contact</p>
    </div>
  </div>
  
<script>

$(document).ready(function(){
  // geneeate_sgin_up_link_a
    $('#geneeate_sgin_up_link_a').featherlight({
	    targetAttr: '#generate_sgin_up_link'
    });
    $('#geneeate_sgin_up_link_a').click(function(){
      // console.log('pup up is operm');
      var post_data = {
          needTo: 'create_sgin_up_token',
      };
      // Send a POST request to the server
      $.post('controlar/sgin_up.cont.admin.php', post_data).done(function(data) {
          console.log(data);
          $('.featherlight-content > div > #h3_link').text('<?=ROOT?>'+data);
      }); 
    })
  //----------------------------------------------------------------------.// geneeate_sgin_up_link_a 
  // adding agent
    $("form").submit(function(event){
        // Stop form from submitting normally
        event.preventDefault();
        // get inputs values
        
        let first_name = $('#first_name_input').val();
        let last_name = $('#last_name_input').val();
        let user_name = $('#user_name_input').val();
        let gender = $('#gender_input').val();
        let password = $('#password_input').val();
        let email = $('#email_input').val();
        let phone = $('#phone_input').val();
        let address = $('#address_input').val();

        
        let campaign = $('#campaign_input').val();
        if(campaign === ''){
          campaign = null;
        }
        let education = $('#education_input').val();
        if(education === ''){
          education = null;
        }
        let experience = $('#experience_input').val();
        if(experience === ''){
          experience = null;
        }
        let salary = $('#salary_input').val();
        if(salary === ''){
          salary = null;
        }else{
          salary = Number(salary)
        }
        let enter_time = $('#enter_time_input').val();
        if(enter_time === ''){
          enter_time = null;
        }
        let leave_time = $('#leave_time_input').val();
        if(leave_time === ''){
          leave_time = null;
        }

        // console.log(first_name,  last_name, user_name, gender,  password,  email,  phone,  address, campaign, education,  experience,  typeof salary,  enter_time,  leave_time);
      /*
        `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`, `campaign`, ``, `education`, `experience`, ``, `salary`, ``, `enter_time`, `leave_time`,
      */
        $.ajax({
            url: 'controlar/sgin_up.cont.admin.php',
            type: 'POST', 
            data: {
              // first_name,  last_name, user_name, gender,  password,  email,  phone,  address, campaign, education,  experience,   salary,  enter_time,  leave_time
              // phone, campaign, salary education,  experience, enter_time,  leave_time
              needTo: 'add_new_agent',
              first_name: first_name,
              last_name: last_name,
              email: email,
              user_name: user_name,
              gender: gender,
              phone: phone,
              address: address,
              password: password,
              campaign: campaign,
              education: education,
              experience: experience,
              salary: salary,
              enter_time: enter_time,
              leave_time: leave_time
                },  
            beforeSend: function() { 
                $body = $("body");
                // $body.addClass("loading"); 
            },
            complete: function() {
                $body = $("body");
                // $body.removeClass("loading");
                },
            success: function(data, status, xhr){
                console.log(data);
                var res = JSON.parse(data);
                if(res.state == 'good'){
                  //alertbox_success alertbox_danger
                  $('#alertbox_success').html(res.msg);
                  $('#alertbox_success').show(500);
                  setTimeout(() => {$('#alertbox_success').hide(500);}, 3000);
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
  //----------------------------------------------------------------------.// adding agent        
});      
</script>
<?php
include 'compo/foot.admin.php';
?>