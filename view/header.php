<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <!-- <h1 class= "text-center">Administrator Website </h1> -->
<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-between">
<div>
        <img src="./images/logo2.png" alt="">
    </div>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?act=home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?act=shop">Shop</a>
      </li>
      <li class="nav-item dropdown">
        <div class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
        </div>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php foreach ($categorys as $cate): ?>
    <a class="dropdown-item" href="index.php?act=shopCategory&id=<?php echo $cate['id']; ?>"><?php echo $cate['name']; ?></a>
<?php endforeach; ?>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?act=blog">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?act=about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="index.php?act=contact">Contact</a>
      </li>
    </ul>
  </div>
<?php if(isset($_SESSION['user'])): ?>
  <div>
    <span>Hello  <?php echo $_SESSION['user']['name']; ?></span>
    <a href="index.php?act=logout" class="btn btn-danger">Logout</a>
  </div>
<?php else: ?>
  <div>
    <a href="index.php?act=signup" class="btn btn-secondary">Signup</a>
    <a href="index.php?act=signin" class="btn btn-success">Signin</a>
  </div>
<?php endif; ?>


</nav>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>