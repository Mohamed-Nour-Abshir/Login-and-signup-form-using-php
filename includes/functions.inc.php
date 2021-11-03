<?php
function emptyinput($user_name, $user_email, $user_uid, $user_pswd, $user_rePswd){
    if(empty($user_name) || empty($user_email) || empty($user_uid) || empty($user_pswd) ||empty($user_rePswd)){
        $result =true;
    }
    else{
        $result =false;
    }
    return $result;
}

function usernamevalid($user_uid){
    if(!preg_match("/^[a-zA-Z0-9]*$/", $user_uid)){
        $result =true;
    }
    else{
        $result =false;
    }
    return $result;
}

function emailvalid($user_email){
    if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
        $result =true;
    }
    else{
        $result =false;
    }
    return $result;
}

function pswdnotmatch($user_pswd, $user_rePswd){
    if($user_pswd !== $user_rePswd){
        $result =true;
    }
    else{
        $result =false;
    }
    return $result;
}

function userexist($conn, $user_uid, $user_email){
    $sql = "SELECT * FROM users WHERE user_uid = ? OR user_email = ?;";
    $stmt =mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
     header("Location: ../signup.php?error=failedtopreparestmt");
     exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $user_uid, $user_email);
    mysqli_stmt_execute($stmt);
    $resultData =mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        $result = true;
        return $row;
    }
     else{
            $result =false;
        }
        return $result;
        mysqli_stmt_close($stmt);
    }
   

   function  createuser($conn, $user_name, $user_email, $user_uid, $user_pswd){
        $sql = "INSERT INTO users(user_name, user_email, user_uid, user_pswd) VALUES(?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../signup.php?error=failedtopreparestmt2");
          exit();
        }
        $hashedpswd = password_hash($user_pswd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $user_name, $user_email, $user_uid, $hashedpswd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("Location: ../signup.php?error=none");
        exit();
       }


// login dunctions 

function emptyinputlogin($user_uid, $pswd){
    
    if(empty($user_uid) || empty($pswd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
 }

 function loginUser($conn, $user_uid, $pswd){
    
    $uidexist = userexist($conn, $user_uid,$user_uid);
    if($uidexist === false){
        header("Location: ../login.php?error=invaliduidoremail");
        exit();
    }

    $passwordHash = $uidexist['user_pswd'];

    $checkpass = password_verify($pswd, $passwordHash);
    if($checkpass === false){
        header("Location: ../login.php?error=wrongpswd");
        exit();
    }
    else if($checkpass === true){
        session_start();
        $_SESSION['userid'] = $uidexist['user_id'];
        $_SESSION['useruid'] = $uidexist['user_uid'];
        header("Location: ../index.php");
        exit();
    }


 }