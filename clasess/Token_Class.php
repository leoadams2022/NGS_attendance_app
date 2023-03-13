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
        $token_srting = $this->RandomString(8).'_'.$userName;
        $hashed_string = password_hash($token_srting, PASSWORD_DEFAULT);
        
        $token_name = $userName;
        $token_token = $hashed_string;
        $token_purpose = 'remember_me';
        $token_exp = date("Y-m-d",time() + 1296000);// now + 15days

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
        $this->delete_expired_tokens();
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
            $today = date("Y/m/d",time());
            $today = new DateTime($today);
            $exp_ms = strtotime($exp);
            $exp_date = date("Y/m/d",$exp_ms);
            $exp__ = new DateTime($exp_date);
            if($exp__ == $today || $today > $exp__){
                $this->delete_token_admin($id);
                return 'bad';
            }else{
                if($token === $hashed_string){
                    return 'good';
                }else{
                    return 'bad';
                }
            }
        }else{
            return 'bad';
        }
        // }
    }

    public function add_sgin_up_token(){
        $token_srting = $this->RandomString(6);
        $hashed_string = password_hash($token_srting, PASSWORD_DEFAULT);
        $token_name = 'not_used';
        $token_token = $hashed_string;
        $token_purpose = 'Sgin_up_token';
        $token_exp = date("Y-m-d",time() + 86400);//now + 1 daye
        $data = $this->save(array(
            'table'    => 'tokens',
            'name'  => $token_name ,
            'token'  => $token_token ,
            'purpose'  => $token_purpose ,
            'exp'  => $token_exp
        ));
        if($data !==FALSE){
            return 'sgin_up.php?key1='.$token_token.'&key2='.$this->getLastId();
        }else{
            return 'bad';
        }
    }

    public function Validate_sgin_up_token($hashed_string,$tokenID){
        $this-> delete_expired_tokens();
        $data = $this->find('all', array(
            'table'      => 'tokens',
            'fields'     => array( 'id', 'name', 'token', 'purpose', 'exp', 'created_at'), // 
            'conditions' => array('id' => $tokenID,'name' => 'not_used', 'purpose'=> 'Sgin_up_token') //
        ));
        if(!empty($data)){
            return 'good';
        }else{
            return 'bad';
        }
    }

    // it get tregerd when get_all_agents() at admin dashboard and  add_remember_me_token() and Validate_sgin_up_token() at Token_Class
    public function delete_expired_tokens(){
        $data = $this->find('all', array(
            'table'      => 'tokens',
            'fields'     => array('id','name','token','purpose','exp','created_at')
        ));
        $today = date("Y/m/d",time());
        $today = new DateTime($today);
        foreach ($data as $key => $token) {
            $exp_ms = strtotime($token['exp']);
            $exp_date = date("Y/m/d",$exp_ms);
            $exp = new DateTime($exp_date);
            if($exp == $today || $today > $exp){
                $this->delete_token_admin($token['id']);
            }
        }
    }

    public function delete_token_admin($token_id){
        if(!empty($token_id)){
        $delete = $this->delete(array('table' => 'tokens','id' => $token_id/* int number */));
        }
    }
    

    public function RandomString($n) {
        // $n=8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
        return $randomString;
    }
}