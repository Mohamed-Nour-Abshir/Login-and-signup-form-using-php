<?php

 if(isset($_POST['submit'])){
     include_once 'dbh.inc.php';
     include_once 'functions.inc.php';

     $user_name = $_POST['name'];
     $user_email = $_POST['email'];
     $user_uid = $_POST['uid'];
     $user_pswd = $_POST['pswd'];
     $user_rePswd = $_POST['re-pswd'];


     if(emptyinput($user_name, $user_email, $user_uid, $user_pswd, $user_rePswd)!==false){
         header("Location: ../signup.php?error=emptyfield");
         exit();
     }
     if(usernamevalid($user_uid)!==false){
        header("Location: ../signup.php?error=invalidusername");
        exit();
    }
    if(emailvalid($user_email)!==false){
        header("Location: ../signup.php?error=invalidemail");
        exit();
    }
    if(pswdnotmatch($user_pswd, $user_rePswd) !==false){
        header("Location: ../signup.php?error=pswdnotmatch");
        exit();
    }
    if(userexist($conn, $user_uid, $user_email) !==false){
        header("Location: ../signup.php?error=uidtaken");
        exit();
    }
    createuser($conn, $user_name, $user_email, $user_uid, $user_pswd);
 }
 else{
    header("Location: ../signup.php");
    exit();
 }