<?php
include '../clasess/Users_Class.php';
include '../clasess/Token_Class.php';


if(isset($_POST['needTo'])){
    if($_POST['needTo'] === 'add_new_agent' && isset($_POST['key1']) && isset($_POST['key2'])){
        $token = $_POST['key1'];
        $token_id = $_POST['key2'];
        $token_class =  new Token_Class();
        $vaildate_token = $token_class->Validate_sgin_up_token($token,$token_id);
        if($vaildate_token === 'good'){
            $users_class = new Users_Class();
            $adding_user = $users_class->adding_user($_POST['first_name'],$_POST['last_name'],$_POST['user_name'],$_POST['gender'],$_POST['password'],$_POST['email'],$_POST['phone'],$_POST['address'],$_POST['campaign'],$_POST['salary'],$_POST['enter_time'],$_POST['leave_time'],$_POST['education'],$_POST['experience']);
            echo json_encode($adding_user);
            if(isset($adding_user['state'])){
                if($adding_user['state'] == 'good'){
                    $token_class->delete_token_admin($token_id);
                }
            }
        }else{
            $results = array('state'=> 'bad','msg'=> 'this link has been used already','url'=> '','respond'=>'');
            echo json_encode($results);
        }
        // echo json_encode($vaildate_token);
        
    }
}