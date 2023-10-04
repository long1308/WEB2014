<form action="index.php?act=signin" method= "post">
  <h1 class = "mt-5 ">Signin</h1>
  <?php
    if(isset($message)){
      echo '<div class="alert alert-danger" role="alert">
      '.$message.'
    </div>';
    }else{
      echo "";
    }
  ?>
  <div class="form-group mb-3">
    <label for="exampleInputEmail2">Username</label>
    <input name = "username" id = "exampleInputEmail2" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter username">
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputPassword1">Password</label>
    <input name = "password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <input type="submit" value="Signin" name = "btnSignin" class="btn btn-primary"/>
</form>