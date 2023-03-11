<?php
include 'compo/head.php';
?>
<title>Sgin UP</title>
</head>
<?php
// include 'compo/navbar.php';
?>
<div class="">
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
            <label for="" class="form-label">email :</label>
            <input type="email" id="email_input" class="form_input form-control" placeholder="Enter email">
        </div>
        <div class="col-md-6 col-lg-4">
            <label for="" class="form-label">phone :</label>
            <input type="text" id="phone_input" class="form_input form-control" placeholder="Enter phone">
        </div>
        <div class="col-md-6 col-lg-4">
            <label for="" class="form-label">address :</label>
            <input type="text" id="address_input" class="form_input form-control" placeholder="Enter address">
        </div>
        <div class="col-md-6 col-lg-4">
            <label for="" class="form-label">campaign :</label>
            <input type="text" id="campaign_input" class="form_input form-control" placeholder="Enter campaign">
        </div>
        <div class="col-md-6 col-lg-4">
            <label for="" class="form-label">salary :</label>
            <input type="number" id="salary_input" class="form_input form-control" placeholder="Enter salary">
        </div>
        <div class="col-md-6 col-lg-4">
            <label for="" class="form-label">enter_time :</label>
            <input type="time" id="enter_time_input" class="form_input form-control" placeholder="Enter enter_time">
        </div>
        <div class="col-md-6 col-lg-4">
            <label for="" class="form-label">leave_time :</label>
            <input type="time" id="leave_time_input" class="form_input form-control" placeholder="Enter leave_time">
        </div>
        <div class="col-md-12 col-lg-6">
            <label for="" class="form-label">education :</label>
            <input type="text" id="education_input" class="form_input form-control" placeholder="Enter education">
        </div>
        <div class="col-md-12 col-lg-6">
            <label for="" class="form-label">experience :</label>
            <input type="text" id="experience_input" class="form_input form-control" placeholder="Enter experience">
        </div>
        <div class="col-md-12">
            <div class="alert alert-danger" id="alertbox" style='display:none;' role="alert">
            </div>
            <div class="col-md-12">
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" id="sginup">ADD Agent</button>
            </div>
        </div>
</form>
<?php
include 'compo/foot.php';
?>