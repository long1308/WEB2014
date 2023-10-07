<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết tài khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class=" mt-5 px-5  ">
        <h2 class="-pl-3">Detail Account</h2>
        <div class="row ">
            <div class="col-md-6 bg-dark-subtle p-3 rounded-2">
                <div class="account-info d-flex">
                    <img src="./upload/<?php echo $_SESSION['user']['image']; ?>" class="rounded-3 mr-3 " style="width: 150px;" alt="Avatar" />
                    <div>
                        <p><strong>Full Name:</strong><?php echo $_SESSION['user']['name']; ?></p>
                        <p><strong>Username</strong> <?php echo $_SESSION['user']['username']; ?></p>
                        <p><strong>Password</strong><?php echo $_SESSION['user']['password']; ?></p>
                    </div>

                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="index.php?act=editProfile" class="
                     btn btn-outline-primary mt-2 px-5">Edit</a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>