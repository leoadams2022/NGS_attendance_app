<?php
session_start();
include '../../clasess/Users_Class.php';
include '../../clasess/Announcements_Class.php';
/************  Dont forget you have acsess to ****************
            $_SESSION["id"];
            $_SESSION["first_name"] ;
            $_SESSION["last_name"] ;
            $_SESSION["email"];
            $_SESSION["user_name"];
            $_SESSION["gender"];
            $_SESSION["phone"] ;
            $_SESSION["address"];
            $_SESSION["rank"]; 
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

if(isset($_POST['needTo'])){
    if($_POST['needTo'] === 'get_all_agints'){
        $users_class = new Users_Class();
        $agints= $users_class->get_all_agints();
        $results = ['state'=> 'good','msg'=> 'here is all the agints','url'=> '','respond'=>$agints];
        echo json_encode($results);
        // for delete_AutoGenerated_and_admin_alert
        if(isset($_POST['clear_AutoGenerated_and_admin_alert'])){
            if($_POST['clear_AutoGenerated_and_admin_alert'] === 'ture'){
                $Announcements_Class = new Announcements_Class();
                $delete_AutoGenerated_and_admin_alert = $Announcements_Class->delete_AutoGenerated_and_admin_alert();
            }
        }
        //-----------------------------------------
    }elseif($_POST['needTo'] === 'upadate_agints_data'){
        $users_class = new Users_Class();
        //CTSD stands for => campaign	target	salary	dedication
        if(isset($_POST['campaign'])&&isset($_POST['target'])&&isset($_POST['salary'])&&isset($_POST['dedication'])&&isset($_POST['agint_id'])&&isset($_POST['in_time'])&&isset($_POST['out_time'])){
            //-----------------------------------------------

            $agent_info = $users_class->get_by_id($_POST['agint_id'],$fields= array('user_name','campaign','target', 'salary','dedication', 'enter_time', 'leave_time'));

            $old_campaign = $agent_info[0]['campaign'];
            $old_target = $agent_info[0]['target'];
            $old_salary = $agent_info[0]['salary'];
            $old_dedicaton = $agent_info[0]['dedication'];
            $old_enter_time = $agent_info[0]['enter_time'];
            $old_leave_time = $agent_info[0]['leave_time'];

            $Announcements_Class = new Announcements_Class();
            $resipientsArray = array($agent_info[0]['user_name']);

            if($_POST['campaign'] != $old_campaign){
                $send_msg = $Announcements_Class->add_msg_by_recipients('AutoGenerated','campaign update: your campaign is '.$_POST['campaign'],$resipientsArray);
            }
            if($_POST['target'] != $old_target){
                $send_msg = $Announcements_Class->add_msg_by_recipients('AutoGenerated','target update: your target is '.$_POST['target'],$resipientsArray);
            }
            if($_POST['salary'] != $old_salary){
                $send_msg = $Announcements_Class->add_msg_by_recipients('AutoGenerated','salary update: your salary is '.$_POST['salary'],$resipientsArray);
            }
            if($_POST['dedication'] != $old_dedicaton){
                $send_msg = $Announcements_Class->add_msg_by_recipients('AutoGenerated','dedication update: you have '.$_POST['dedication'].' EPG dedication',$resipientsArray);
            }
            if($_POST['in_time'] != $old_enter_time){
                $send_msg = $Announcements_Class->add_msg_by_recipients('AutoGenerated','Entry time update:  your Entry time is  '.$_POST['in_time'],$resipientsArray);
            }
            //                        2023-01-01 02:00:00
            if($_POST['out_time'] != $old_leave_time){
                $send_msg = $Announcements_Class->add_msg_by_recipients('AutoGenerated','leave time update:  your leave time is  '.$_POST['out_time'],$resipientsArray);
            }
            //-----------------------------------------------

            $values = ['campaign'=> $_POST['campaign'],'target'=> $_POST['target'],'salary'=> $_POST['salary'],'dedication'=> $_POST['dedication'],'in_time'=>$_POST['in_time'],'out_time'=>$_POST['out_time']];
            $update= $users_class->update_agint_CTSD($_POST['agint_id'],$values);
            $results = ['state'=> 'good','msg'=> $update,'url'=> '','respond'=>$_POST['out_time']];
            echo json_encode($results);
        }
    }
}