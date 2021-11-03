<?php
 include_once 'header.php';
?>
<!-- error handling -->
<?php

$msg ="";
$msgClass = "";
  if(isset($_GET['error'])){
      $errorcheck = $_GET['error'];
      if($errorcheck == "emptyfield"){
       $msg ="Please Fill all the Fields!";
       $msgClass ="alert-danger";
      }
      else if($errorcheck == "invalidusername"){
          $msg ="please use a valid username!";
          $msgClass ="alert-danger";
      }
      else if($errorcheck == "invalidemail"){
        $msg ="please use a valid email!";
        $msgClass ="alert-danger";
    }
    else if($errorcheck == "pswdnotmatch"){
        $msg ="Password not match!";
        $msgClass ="alert-danger";
    }
    else if($errorcheck == "uidtaken"){
        $msg ="Username taken!";
        $msgClass ="alert-danger";
    }
    else if($errorcheck == "none"){
        $msg ="Your are successfully signedup";
        $msgClass ="alert-success";
    }
  }
?>
<div class="container">
<form action="includes/signup.inc.php" method="POST" class="mx-auto shadow px-5 py-5 my-5" style="width: 300px;">
     <h2>Signup</h2>
     <?php if($msg !==''):?>
     <div class="alert <?php echo $msgClass?>"><?php echo $msg?></div>
     <?php endif;?>
     <div class="form-group">
         <input type="text" class="form-control py-2 my-2 text-primary" name="name" value="" placeholder="Enter Your Full name.....">
     </div>
     <div class="form-group">
         <input type="text" class="form-control py-2 my-2" name="email" value="" placeholder="E-mail.....">
     </div>
     <div class="form-group">
         <input type="text" class="form-control py-2 my-2" name="uid" value="" placeholder="Username.....">
     </div>
     <div class="form-group">
         <input type="password" class="form-control py-2 my-2" name="pswd" value="" placeholder="Password.....">
     </div>
     <div class="form-group">
         <input type="password" class="form-control py-2 my-2" name="re-pswd" value="" placeholder="Confirm Password.....">
     </div>
      <button class="btn btn-primary mx-5" style="width: 100px;" type="submit" name="submit">Submit</button>
</form>
</div>

<?php
 include_once 'footer.php';
?>