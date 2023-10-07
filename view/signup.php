<section class="container">
  <form action="index.php?act=signup" method="post" enctype="multipart/form-data">


    <h1 class="mt-5 ">Signup</h1>
    <?php
    if (isset($error)) {
      echo '<div class="alert alert-danger" role="alert">
  ' . $error . '
</div>';
    } else {
      echo "";
    }
    ?>
    <div class="form-group mb-3">
      <label for="exampleInputEmail1">Full Name</label>
      <input name="name" id="exampleInputEmail1" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter name">
    </div>
    <div>
      <label for="">Image</label>
      <input name="image" type="file" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="imageInput">
      <img id="imagePreview" class="img-thumbnail mt-2" width="100" height="100" src="../upload/<?= $image ?>" alt="">
    </div>
    <div class="form-group mb-3">
      <label for="exampleInputEmail2">Username</label>
      <input name="username" id="exampleInputEmail2" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter username">
    </div>
    <div class="form-group mb-3">
      <label for="exampleInputPassword1">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <input type="submit" value="Signup" name="btnSignup" class="btn btn-primary" />
  </form>
</section>