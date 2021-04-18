<?php
include("dbconfig.php");
extract($_REQUEST);
if(isset($csubmit))
{
    $get_email    = "SELECT * FROM `register` WHERE register_email ='$demail'";
    $email_result = $con->query($get_email);
    $emailcount   = $email_result->num_rows;
     if ($emailcount > 0) {
            echo "<script>window.location.assign('register.html?exists=true')</script>";
        }
        else{
            $reg_user ="INSERT INTO `register`(`register_fullname`, `register_email`, `register_password`, `register_mobile`, `register_status`) VALUES 
            ('$fullname','$demail','$rpassword','$mobilenumber','1')";
               $ex_reg_user  = $con->query($reg_user);
            if ($ex_reg_user) {
                echo "<script>window.location.assign('login.html')</script>";
            }
        }
}