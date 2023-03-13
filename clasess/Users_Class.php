<?php
require_once 'Crud.class.php';

class Users_Class extends Crud {

 
public function __construct(){
    $this->test();
}

// get user -------------
public function get_by_id($id,$fields= array('id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password','campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'enter_time', 'leave_time', 'created_at')){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        $data = $this->find('all', array(
            'table'      => 'users',
            'fields'     => $fields, // 
            'conditions' => array('id' => $id) //
            )
        );
        return($data);
}

public function get_by_useranme($username,$fields= array('id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password','campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'enter_time', 'leave_time', 'created_at')){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        $data = $this->find('all', array(
            'table'      => 'users',
            //`id`, `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`, `campaign`, `rank`, `education`, `experience`, `created_at`
            'fields'     => $fields, // 
            'conditions' => array('user_name' => $username) //
            )
        );
        return($data);
}
    
public function get_by_email($email){
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        $data = $this->find('all', array(
            'table'      => 'users',
            'fields'     => array('id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password', 'campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'enter_time', 'leave_time', 'created_at'), // 
            'conditions' => array('email' => $email) //
            )
        );
        return($data);
}
//------------- get user 

public function Validate_sgin_up($firstName,$lastName,$email,$userName,$gender,$phone,$address,$password){
    if(empty($firstName)||empty($lastName)||empty($email)||empty($userName)||empty($gender)||empty($phone)||empty($address)||empty($password)){
        return 'empty filed';
        end();
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return 'Invalid email format';
        end();
    }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$firstName)||!preg_match("/^[a-zA-Z-' ]*$/",$lastName)){
        return 'Only letters and white space allowed as a first and last name';
        end();
    }elseif(!is_numeric($phone)){
        return 'Only Numbers are allowed for the phone number';
        end();
    }elseif(!preg_match('/^[a-zA-Z0-9]{5,}$/', $userName)){
        return 'Invalid username format';
        end();
    }else{
        return 'allGood';
        end();
    }
}

public function Validate_sgin_in($userName,$password){
    if(empty($userName)||empty($userName)){
        return 'empty filed';
        end();
    }elseif(!preg_match('/^[a-zA-Z0-9]{5,}$/', $userName)){
        return 'Invalid username format';
        end();
    }else{
        return 'allGood';
        end();
    }
}

public function username_exist($userName){
    $getRes = $this->get_by_useranme($userName);
    if(empty($getRes)){
          return false;
    }else{
          return true;
    }
}

public function email_exist($email){
    $getRes = $this->get_by_email($email);
    if(empty($getRes)){
          return false;
    }else{
          return true;
    }
}


public function Validate_update_profile($phone,$address,$email,$education,$experience){
    if(empty($email)||empty($education)||empty($phone)||empty($address)||empty($experience)){
        return 'empty filed';
        end();
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return 'Invalid email format';
        end();
    // }elseif(!preg_match("/^[a-zA-Z-' ]*$/",$firstName)||!preg_match("/^[a-zA-Z-' ]*$/",$lastName)){
    //     return 'Only letters and white space allowed as a first and last name';
    //     end();
    }elseif(!is_numeric($phone)){
        return 'Only Numbers are allowed for the phone number';
        end();
    // }elseif(!preg_match('/^[a-zA-Z0-9]{5,}$/', $userName)){
    //     return 'Invalid username format';
    //     end();
    }else{
        return 'allGood';
        end();
    }
}

public function update_profile($user_id,$phone,$address,$email,$education,$experience){
    if($this->Validate_update_profile($phone,$address,$email,$education,$experience) === 'allGood'){
    //Updating DATA
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        // `id`, `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`, `campaign`, `rank`, `education`, `experience`, `created_at`

        //'id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password','campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'enter_time', 'leave_time', 'created_at'
        $update = $this->save(array(
            'table'  => 'users',
            'id'  => $user_id, // you need to pass a id (int)
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'education' => $education,
            'experience' => $experience
            )
        );
        if($update !==FALSE){
            // up dateing the sessin vars
            $user = $this->get_by_id($user_id,array('email','phone', 'address','campaign','education', 'experience','created_at'));
            $user = array_merge(...$user);
                            // $_SESSION["id"] = $user['id'];
                            // $_SESSION["first_name"] = $user['first_name'];
                            // $_SESSION["last_name"] = $user['last_name'];
                            $_SESSION["email"] = $user['email'];
                            // $_SESSION["user_name"] = $user['user_name'];
                            // $_SESSION["gender"] = $user['gender'];
                            $_SESSION["phone"] = $user['phone'];
                            $_SESSION["address"] = $user['address'];
                            // $_SESSION["password"] = $user['password'];
                            $_SESSION["campaign"] = $user['campaign'];
                            // $_SESSION["rank"] = $user['rank'];
                            $_SESSION["education"] = $user['education'];
                            $_SESSION["experience"] = $user['experience'];
                            $_SESSION["created_at"] = $user['created_at'];
            return array('state'=>'good','msg'=>"successfully updated data",'data'=>$user); // data is updated successfully
        }
    }else{
        return  array('state'=>'bad','msg'=>$this->Validate_update_profile($phone,$address,$email,$education,$experience),'data'=>'');
    }
}

public function get_all_agints($fields= array('id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password','campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'enter_time', 'leave_time', 'created_at')){
    // $Crud =  new Crud("user-registration","root",'');
    $data = $this->find('all', array(
            'table'      => 'users',
		'fields'     => $fields, // 
		'conditions' => array('rank' => 'agint') //
		)
	);
    return $data;
}

//CTSD stands for => campaign	target	salary	dedication in_time out_time
public function Validate_CTSD($valus){
    extract($valus);
    if(isset($campaign)&&isset($target)&&isset($salary)&&isset($dedication)&&isset($in_time)&&isset($out_time)){
        if(empty($campaign)){
            return 'empty campaign';//.' target= '.$target.' salary= '.$salary.' dedication= '.$dedication
            end();
        }elseif(!is_numeric($target)||!is_numeric($salary)){
            return 'Only Numbers are allowed for the target	salary	dedication';
            end();
        }elseif($target < 0 || $salary < 0 || $dedication < 0){
            return 'Only positive numbers accepted';
            end();
        }
        
        else{
            return 'allGood';
            end();
        }
    }else{
        return 'one or more of the CTSD is not set';
    }

}

//$valus=['campaign'=> 'value','target'=> 'value','salary'=> 'value','dedication'=> 'value']
public function update_agint_CTSD($user_id,$valus){
   $valid = $this->Validate_CTSD($valus);
   if($valid === 'allGood'){
        extract($valus);
        // $Crud =   new Crud(DATA_BASE,USER,PASSWORD);
        //`enter_time`, `leave_time`,
            $update = $this->save(array(
                'table'  => 'users',
                'id'  => $user_id, // you need to pass a id (int)
                'campaign' => $campaign,
                'target' => $target,
                'salary' => $salary,
                'enter_time' => $in_time,
                'leave_time' => $out_time,
                'dedication' => $dedication
                )
            );
        return 'successfully updated data ';//$old_dedicaton[0]['dedication'];//'successfully updated data '.
        
   }else{
    return $valid;
   }
}

public function get_cards_data($user_id){
   $data = $this->get_by_id($user_id);
   if(!empty($data)){
       $data = array_merge(...$data);
       //'id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password', 'campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'created_at'
       $data_arr = array('target'=> $data['target'],'salary'=> $data['salary'],'dedication'=> $data['dedication']);
       return $data_arr;
   }else{
        $data_arr = array('msg'=>'unvalid user id');
        return $data_arr;
   }
}

public function get_all_campagins(){
    $all_users = $this->get_all_agints(array('campaign'));
    $campaigns = array();
    foreach ($all_users as $key => $value) {
        array_push($campaigns,$value['campaign']);
    }
    $campaigns = array_unique($campaigns);  
    $campaigns =  array_values($campaigns);
    return $campaigns;
}

/*
    // --required must not be empty--
    $_POST['first_name']  //only latter's length less than 10 D
    $_POST['last_name'] //only latter's length less than 10 D
    $_POST['user_name'] // latter's numbers no speaces  length between 8 and 15 must start with @ D
    $_POST['gender']  // only tow options male or female D_D
    $_POST['password'] // latter's numbers no speaces  length between 8 and 20 D

    // --accepts empty--
    $_POST['email'] //email length less than 30
    $_POST['phone'] //only numbers length must be 10 
    $_POST['address'] // length less tha 375 = 50 words D
    $_POST['campaign'] // length must be less than 20  D
    $_POST['salary'] // numbers only value less than 50,000
    $_POST['enter_time'] // time format D
    $_POST['leave_time'] // time format D
    $_POST['education']  // length less tha 3850 = 500 words D
    $_POST['experience'] // length less tha 3850 = 500 words D
    // total is 14 vars
        `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`, `campaign`, ``, `education`, `experience`, ``, `salary`, ``, `enter_time`, `leave_time`,
*/
public function adding_agent_validate($first_name,$last_name,$user_name,$gender,$password,$email,$phone,$address,$campaign,$salary,$enter_time,$leave_time,$education,$experience){
    if(empty($first_name) || empty($last_name) || empty($user_name) || empty($gender) || empty($password) || empty($email) || empty($phone) || empty($address)){
        return 'a required filed is empty';
    }
    elseif(strlen($first_name)>10 || strlen($last_name)>10 || strlen($user_name)>15 || strlen($user_name)<8 || strlen($password)>15 || strlen($password)<8){
        return "first and last name must have 10 latters max. user name and password must be between 8-10 characters ";
    }
    elseif(strlen($address) > 165){
        return "address must have 22 words max.";
    }
    elseif(!preg_match("/^[a-zA-Z-']*$/",$first_name)||!preg_match("/^[a-zA-Z-']*$/",$last_name)){
        return "Only letters allowed as a first and last name no white speacs";
    }
    elseif(!preg_match('/^[a-zA-Z0-9]{5,}$/', $user_name)||!preg_match('/^[a-zA-Z0-9]{5,}$/', $password)){
        return "use only latters and numbers for the  username and password no speaces";
    }
    elseif($gender !== 'male' && $gender !== 'female'){
        return 'gender must be male or female';  
    }
    elseif(strlen($email) > 30 || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        return 'Invalid email format';
    }
    elseif($salary != null && (!is_numeric($salary) || !preg_match("/^\d+$/",$salary) || $salary > 50000)){
        return 'salary must be a number less than 50,000';
    }
    elseif($education != null && strlen($education) > 775){
        return "education and experience must have 100 words max."; 
    }
    elseif($experience != null && strlen($experience) > 775){
        return "education and experience must have 100 words max."; 
    }
    elseif($phone != null && (!preg_match("/^\d[\d\s\-]{8,10}\d$/",$phone) || strlen($phone) > 12 || strlen($phone) < 10)){
        return 'un valid phone number';  
    }
    elseif($enter_time != null && !preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $enter_time)){
        return "enter_time wrong time format"; 
    }
    elseif($leave_time != null && !preg_match('/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/', $leave_time)){
        return "leave_time wrong time format"; 
    }
    else{
        return 'all_good';
        // return (
        //     ' / first_name/ '.$first_name.' /last_name / '.$last_name.' /user_name / '.$user_name.' /gender / '.$gender.' / password/ '.$password.' /email / '.$email.' /phone / '.$phone.' /address / '.$address.' / campaign/ '.$campaign.' / salary/ '.$salary.' /enter_time / '.$enter_time.' /leave_time / '.$leave_time.' /education / '.$education.' / experience/ '.$experience
        // );
    }   
}

public function adding_user($first_name,$last_name,$user_name,$gender,$password,$email,$phone,$address,$campaign,$salary,$enter_time,$leave_time,$education,$experience){

    //'id', 'first_name', 'last_name', 'email', 'user_name', 'gender', 'phone', 'address', 'password', 'campaign', 'rank', 'education', 'experience', 'target', 'salary', 'dedication', 'enter_time', 'leave_time', 'created_at'

    $validation = $this->adding_agent_validate($first_name,$last_name,$user_name,$gender,$password,$email,$phone,$address,$campaign,$salary,$enter_time,$leave_time,$education,$experience);

    if($validation === 'all_good'){
        $dup_username = $this->username_exist($user_name);
        if(!$dup_username){
            $dup_email = $this->email_exist($email);
            if(!$dup_email){
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                if($campaign == null){ $campaign = 'NOT_SET';}
                if($enter_time != null){ $enter_time = '2023-01-01 '. $enter_time .':00';}
                if($leave_time != null){ $leave_time = '2023-01-01 '. $leave_time .':00';}
                   
                $fields_array = array(
                'table'    => 'users',
                'first_name'  => $first_name,
                'last_name'  => $last_name,
                'email'  => $email,
                'user_name'  => $user_name,
                'gender'  => $gender,
                'password'  => $hashed_password,
                'phone' => $phone,
                'address' => $address,
                'campaign' => $campaign,
                'education' => $education,
                'experience' => $experience,
                'salary' => $salary,
                'enter_time' => $enter_time,//2023-01-01 00:00:00
                'leave_time' => $leave_time
                );
                $data = $this->save($fields_array);
                if($data !==FALSE){
                    $results = array('state'=> 'good','msg'=> 'success','url'=> '','respond'=>$this->getLastId());
                    return  $results; // data is added successfully
                }else{
                    $results = array('state'=> 'bad','msg'=> 'something went wrong in the adding_user function','url'=> '','respond'=>'');
                    return $results;
                }
            }else{
                $results = array('state'=> 'bad','msg'=> 'email alrady taken','url'=> '','respond'=>'');
                return  $results; 
            }
        }else{
            $results = array('state'=> 'bad','msg'=> 'username alrady taken','url'=> '','respond'=>'');
            return  $results; 
        }
    }else{
        $results = array('state'=> 'bad','msg'=> $validation ,'url'=> '','respond'=>'');
        return  $results;
    }
        // Get last insert ID
	// echo $Crud->getLastId();
}

public function adding_user_tst($first_name,$last_name,$user_name,$gender,$password,$email,$phone,$address,$campaign,$salary,$enter_time,$leave_time,$education,$experience){
 return ($campaign .$salary .$enter_time .$leave_time);
}


public function get_all_adminsUserNames(){
    $data = $this->find('all', array(
        'table'      => 'users',
        //`id`, `first_name`, `last_name`, `email`, `user_name`, `gender`, `phone`, `address`, `password`, `campaign`, `rank`, `education`, `experience`, `created_at`
        'fields'     => array('user_name'), // 
        'conditions' => array('rank' => 'admin') //
        )
    );
    if(!empty($data)){
        return($data);
    }else{
        return 'no data found';
    }
}

}