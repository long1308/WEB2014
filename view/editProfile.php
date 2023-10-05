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
        <form action="index.php?act=editProfile" method="POST">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?php echo $_SESSION['user']['name']; ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="<?php echo $_SESSION['user']['username']; ?>">
            </div>

            <div class="form-group">
                <label for="username">Password</label>
                <input type="password" class="form-control" id="username" name="password"
                    value="<?php echo $_SESSION['user']['password']; ?>">
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