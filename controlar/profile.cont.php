<?php
session_start();
include '../clasess/ImageUploader_Class.php';
include '../clasess/Users_Class.php';
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
$id =  $_SESSION["id"];
$first_name = $_SESSION["first_name"] ;
$last_name = $_SESSION["last_name"] ;
$email = $_SESSION["email"];
$user_name = $_SESSION["user_name"];
$gender = $_SESSION["gender"];
$phone = $_SESSION["phone"] ;
$address = $_SESSION["address"];
$rank = $_SESSION["rank"];
$campaign = $_SESSION['campaign'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if($_POST['needTo'] === 'Add_img'){
      // Get the file data
      if(isset($_FILES['file'])){
        $file = $_FILES['file'];
        $image_class = new ImageUploader('../images/');
        $upload_img = $image_class->uploadImage($file,$user_name);
        // print_r($upload_img);
        if($upload_img['state'] === 'good'){
          $results = ['state'=> 'good','msg'=>$upload_img['msg'],'url'=>$upload_img['url'],'respond'=>''];
          echo json_encode($results);
          // print_r($upload_img['msg']);
        }else{
          $results = ['state'=> 'bad','msg'=>$upload_img['msg'],'url'=>'','respond'=>''];
          echo json_encode($results);
        }
      }else{
        $results = ['state'=> 'bad','msg'=>'no file set','url'=>'','respond'=>''];
        echo json_encode($results);
      }
  }elseif($_POST['needTo'] === 'delete_img'){
    $image_class = new ImageUploader('../images/');
    $delete_img = $image_class-> delete_img($user_name . '_profile_image' . '.jpg');
    if($delete_img['state'] === 'good'){
      $results = ['state'=> 'good','msg'=>$delete_img['msg'],'url'=> '','respond'=>''];
      echo json_encode($results);
    }else{
      $results = ['state'=> 'bad','msg'=>$delete_img['msg'],'url'=> '','respond'=>''];
      echo json_encode($results);
    }
    // print_r($delete_img);
  }elseif($_POST['needTo'] === 'update_profile'){
    /* 
      phone: $('#phone').val(),
      address: $('#address').val(),
      email: $('#email').val(),
      education: $('#education').val(),
      experience: $('#experience').val(),
    */
    $user_class = new Users_Class();
    //($user_id,$phone,$address,$email,$education,$experience)
    $update = $user_class->update_profile($id,$_POST['phone'],$_POST['address'],$_POST['email'],$_POST['education'],$_POST['experience']);
    if($update['state'] === 'good'){
      $results = ['state'=> 'good','msg'=>$update['msg'],'url'=> '','respond'=>$update['data']];
    echo json_encode($results);
    }else{
      $results = ['state'=> 'bad','msg'=>$update['msg'],'url'=> '','respond'=>$update['data']];
      echo json_encode($results);
    }

  }

}
