<section class="container mt-3">
    <h1>New User</h1>
    <?php
    if (isset($error)) {
        echo '<div class="alert alert-danger" role="alert">
      ' . $error . '
    </div>';
    } else {
        echo "";
    }
    ?>
    <form action="index.php?act=addUser" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input name="name" type="text" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default">
        </div>
        <div>
            <label for="">Username</label>
            <input name="username" type="text" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default">
        </div>
        <div>
            <label for="">Image</label>
            <input name="image" type="file" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default" id="imageInput">
            <img id="imagePreview" class="img-thumbnail mt-2" width="100" height="100" src="../upload/<?= $image ?>"
                alt="">
        </div>
        <div>
            <label for="">Password</label>
            <input name="password" type="text" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default">
        </div>
        <div>
            <label for="">Role</label>
            <select name="role" class="form-select" aria-label="Default select example">
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
        </div>
        <div class="mb-5 mt-2">
            <input type="submit" name="addUser" class="btn btn-success" value="Add addUser">

            <a href="index.php?act=listUser"><button class="btn btn-info" type="button" value="List Product">List
                    User</button></a>
        </div>
    </form>
</section>