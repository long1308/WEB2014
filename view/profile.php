<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết tài khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* Tùy chỉnh CSS của bạn ở đây */
    body {
        padding: 20px;
    }

    .account-info {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Detail Account</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="account-info">
                    <p><strong>Full Name:</strong><?php echo $_SESSION['user']['name']; ?></p>
                    <p><strong>Username</strong> <?php echo $_SESSION['user']['username']; ?></p>
                    <p><strong>Password</strong><?php echo $_SESSION['user']['password']; ?></p>
                    <a href="index.php?act=editProfile" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>