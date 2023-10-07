<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Các thẻ meta, title và liên kết CSS -->
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Account</h2>
        <?php
        if (isset($error)) {
            echo '<div class="alert alert-danger" role="alert">
      ' . $error . '
    </div>';
        } else {
            echo "";
        }
        ?>
        <form action="index.php?act=editProfile" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['user']['name']; ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['user']['username']; ?>">
            </div>
            <div>
                <label for="">Image</label>
                <input name="image" type="file" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="imageInput">
                <img id="imagePreview" class="img-thumbnail mt-2" width="100" height="100" src="./upload/<?= $_SESSION['user']['image'] ?>" alt="">
            </div>
            <div class="form-group">
                <label for="username">Password</label>
                <input type="password" class="form-control" id="username" name="password" value="<?php echo $_SESSION['user']['password']; ?>">
            </div>
            <div class="form-group mb-3">
                <label for="username">0ld Password</label>
                <input type="text" class="form-control" id="username" name="old_password" ?>
            </div>
            <input type="submit" value="Save" name="btnSave" class="btn btn-primary" />
        </form>
    </div>
</body>

</html>