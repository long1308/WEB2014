<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Administrator Website </h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=addCategory">Categorys</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=addProduct">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?act=addUser">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Comments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Statistical</a>
                </li>
            </ul>
        </div>
        <div>
            <a href="index.php?act=profile"> <img src="../upload/<?php echo $_SESSION['user']['image']; ?>"
                    class="rounded-circle" style="width: 40px; height: 40px;" alt="Avatar" /> </a>
            <a href="index.php?act=logout" class="btn btn-danger">Logout</a>
        </div>
    </nav>

</body>

</html>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const imageInput = document.getElementById("imageInput");
    const imagePreview = document.getElementById("imagePreview");

    imageInput.addEventListener("change", function() {
        const selectedImage = imageInput.files[0];
        if (selectedImage) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(selectedImage);
        }
    });
});
</script>