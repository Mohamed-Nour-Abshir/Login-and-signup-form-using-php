<?php
 include_once 'header.php';
?>

<?php
 $msg = "";
 $msgClass ="";
 if(isset($_GET['error'])){
     $checkerror =$_GET['error'];
     if($checkerror == "emptyinput"){
       $msg ="Please Enter username & password!";
       $msgClass = "alert-danger";
     }
     else if($checkerror == "invaliduidoremail"){
        $msg ="Please enter valid username/E-mail!";
        $msgClass = "alert-danger";
      }
      else if($checkerror == "wrongpswd"){
        $msg ="Incorrect Password!";
        $msgClass = "alert-danger";
      }
 }
?>
<div class="container">
<form action="includes/login.inc.php" method="POST" class="mx-auto" style="width: 300px;">
     <h2>Login</h2>
     <?php if($msg !==''):?>
     <div class="alert <?php echo $msgClass?>"><?php echo $msg?></div>
     <?php endif;?>
     <div class="form-group">
         <input type="text" class="form-control py-2 my-2" name="name" value="" placeholder="Username/E-mail.....">
     </div>
     <div class="form-group">
         <input type="password" class="form-control py-2 my-2" name="pswd" value="" placeholder="Password.....">
     </div>
     <a href="reset-password.php" style="margin-bottom:10px;">forgett password?</a>
      <button class="btn btn-primary mx-5" style="width: 100px;" type="submit" name="submit">Submit</button>
</form>
</div>
<?php
 include_once 'footer.php';
?>