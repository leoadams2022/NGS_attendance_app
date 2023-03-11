<?php
session_start();
include '../../clasess/Announcements_Class.php';
include '../../clasess/Users_Class.php';
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

//file upload code       
//if the file is uploaded by clicking the upload button
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    //if the file is uploaded with any errors encounterd
    if(isset($_FILES['pdf']) && $_FILES['pdf']['error'] == 0){
        //setting the allowed file format
        $allowed = array("pdf" => "application/pdf");
        //getting the files name,size and type using the $_FILES //superglobal
        $filename = $_FILES['pdf']['name'];
        $filesize = $_FILES['pdf']['size'];
        $filetype = $_FILES['pdf']['type'];
        //verifying the extention of the file
        $ext = pathinfo($filename,PATHINFO_EXTENSION);
        if(!array_key_exists($ext,$allowed)) die("Error: the file format is not acceptable");
        //verifying the file size
        $maxsize = 5 * 1024 * 1024; // 5 mega bayt
        if($filesize > $maxsize) die("Error: file size too large!!");

        if(in_array($filetype,$allowed)){
            if(file_exists("../../upload/".$filename)){
                    die("Sorry the file already exists");
            }else{
                move_uploaded_file($_FILES['pdf']['tmp_name'],"../../upload/".$filename);
                return "File was uploaded successfully <br>";
            }
        }else{
            return "Sorry a problem was encountered when trying to upload data!!";
            }
   }else{
        return "Error: ". $_FILES['pdf']['error'];
    }

   //extra information describing the successfully uploaded file
    if($_FILES['pdf']['error'] == 0){
        return "Filename: ". $_FILES['pdf']['name'] ."<br>";
        return "Filetype :". $_FILES['pdf']['type'] . "<br>";
        return "Filesize: ". ($_FILES['pdf']['size'] / 1024) . "KB <br>";
    }
}
//---//file upload code