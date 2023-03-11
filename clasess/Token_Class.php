<?php
require_once 'Crud.class.php';

class Token_Class extends Crud {

 
    public function __construct(){
        $this->test();
    }

    // setcookie(name, value, expire, path, domain); //, secure, httponly
    // setcookie($cookie_name, $cookie_value, time() + 86400 * 30 * 15, "/"); // 15days   
    // password_hash( , PASSWORD_DEFAULT)
    // password_verify( , )
    // `id`, `name`, `token`, `purpose`, `exp`, `created_at` FROM `tokens`
    // 'id', 'name', 'token', 'purpose', 'exp', 'created_at' FROM 'tokens'

    public function add_remember_me_token($userName){

        $token_srting = $this->RandomString().'_'.$userName;
        $hashed_string = password_hash($token_srting, PASSWORD_DEFAULT);
        
        

        $token_name = $userName;
        $token_token = $hashed_string;
        $token_purpose = 'remember_me';
        $token_exp = date("Y-m-d",time() + 1296000);

        $data = $this->save(array(
            'table'    => 'tokens',
            'name'  => $token_name ,
            'token'  => $token_token ,
            'purpose'  => $token_purpose ,
            'exp'  => $token_exp
        ));

        $cookie_name = 'remember_me';
        $cookie_value = array('hashed_string'=>$hashed_string,'username'=>$userName,'id'=>$this->getLastId());
        $cookie_exp = time() + 1296000;
        
        setcookie($cookie_name, json_encode($cookie_value), $cookie_exp, "/");
    }
    
    public function delete_remember_me_token($userName){
        $data = $this->query("DELETE FROM `tokens` WHERE `name` = '$userName' AND `purpose` = 'remember_me' ");
        $cookie_name = 'remember_me';
        setcookie($cookie_name, null, time()-1, "/");
    }

    public function Validate_remember_me_token($hashed_string,$username,$tokenID){
        $data = $this->find('all', array(
            'table'      => 'tokens',
            'fields'     => array( 'id', 'name', 'token', 'purpose', 'exp', 'created_at'), // 
            'conditions' => array('name' => $username,'id' => $tokenID,'purpose'=> 'remember_me') //
        ));
        if(!empty($data)){
            extract($data[0]);
            if($token === $hashed_string){
                return 'good';
                end();
            }else{

                return 'bad';
            }
        }
    }
    

    public function RandomString() {
        $n=8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
}