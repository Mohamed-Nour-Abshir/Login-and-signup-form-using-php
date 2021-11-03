<?php
 include_once 'header.php';
?>
<div class="container">
<form action="includes/reset-password.inc.php" method="POST" class="mx-auto" style="width: 300px;">
     <h2>Reset Your Password</h2>
     <p>Please verify your E-mail by clicking the link we sent in your email to reset your password</p>
     <div class="form-group">
         <input type="text" class="form-control py-2 my-2" name="name" value="" placeholder="Enter your E-mail.....">
     </div>
      <button class="btn btn-primary mx-5" style="width: 100px;" type="submit" name="submit">Submit</button>
</form>
</div>
<?php
 include_once 'footer.php';
?>