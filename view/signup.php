<form action="index.php?act=signup" method= "post">
  <h1 class = "mt-5 ">Signup</h1>
  <div class="form-group mb-3">
    <label for="exampleInputEmail1">Full Name</label>
    <input name = "name" id = "exampleInputEmail1" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter name">
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputEmail2">Username</label>
    <input name = "username" id = "exampleInputEmail2" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter username">
  </div>
  <div class="form-group mb-3">
    <label for="exampleInputPassword1">Password</label>
    <input name = "password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <input type="submit" value="Signup" name = "btnSignup" class="btn btn-primary"/>
</form>