<?php
include '../../clasess/Users_Class.php';
include '../../clasess/Token_Class.php';

/*
// required must not be empty
$_POST['first_name']  //only latter's length less than 10
$_POST['last_name'] //only latter's length less than 10
$_POST['user_name'] // latter's numbers no speaces  length between 9 and 15 must start with @
$_POST['gender']  // only tow options male or female
$_POST['password'] // latter's numbers no speaces  length between 8 and 20

// accepts empty
$_POST['email'] //email length less than 30
$_POST['phone'] // only numbers length must be 10
$_POST['address'] // length less tha 375 = 50 words
$_POST['campaign'] // length must be less than 20
$_POST['salary'] // numbers only value less than 50,000
$_POST['enter_time'] // time format
$_POST['leave_time'] // time format
$_POST['education']  // length less tha 3850 = 500 words
$_POST['experience'] // length less tha 3850 = 500 words
// total is 14 vars
Validate_sgin_up($first_name,$last_name,$user_name,$gender,$password,$email,$phone,$address,$campaign,$salary,$enter_time,$leave_time,$education,$experience)

*/

if(isset($_POST['needTo'])){
    if($_POST['needTo'] === 'add_new_agent'){
     $users_class = new Users_Class();

     $adding_user = $users_class->adding_user($_POST['first_name'],$_POST['last_name'],$_POST['user_name'],$_POST['gender'],$_POST['password'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['campaign'],$_POST['salary'],$_POST['enter_time'],$_POST['leave_time'],$_POST['education'],$_POST['experience']);

    //  $adding_user = $users_class->adding_user($_POST['first_name'],$_POST['last_name'],$_POST['user_name'],$_POST['gender'],$_POST['password'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['campaign'],$_POST['salary'],$_POST['enter_time'],$_POST['leave_time'],$_POST['education'],$_POST['experience']);
    //  print_r(json_encode($validat));
     echo json_encode($adding_user);
    }elseif($_POST['needTo'] === 'create_sgin_up_token'){
        $token_class = new Token_Class();
        $data = $token_class->add_sgin_up_token();
        if($data != "bad"){
            echo $data;
        }else{
            print_r('something went wrong');
        }
    }
}