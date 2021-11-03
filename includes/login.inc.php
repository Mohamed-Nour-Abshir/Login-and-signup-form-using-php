<?php 
 if(isset($_POST['submit'])){

    $user_uid = $_POST['name'];
    $pswd =$_POST['pswd'];

    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    if(emptyinputlogin($user_uid, $pswd)){
        header("Location: ../login.php?error=emptyinput");
        exit();
    }
    loginUser($conn, $user_uid, $pswd);

 }
 else{
    header("Location: ../login.php");
    exit();
}