<?php
if (is_array($user)) {
    extract($user);
}
?>

<section class="container  mt-3">
    <h1>Edit User</h1>
    <?php
    if (isset($error)) {
        echo '<div class="alert alert-danger" role="alert">
      ' . $error . '
    </div>';
    } else {
        echo "";
    }
    ?>
    <form action="index.php?act=editUser" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input name="name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value=" <?= $name ?>">
        </div>
        <div>
            <label for="">Username</label>
            <input name="username" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?= $username ?>">
        </div>
        <div>
            <label for="">Image</label>
            <input name="image" type="file" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="imageInput">
            <img id="imagePreview" class="img-thumbnail mt-2" width="100" height="100" src="../upload/<?= $image ?>" alt="">
        </div>

        <div>
            <label for="">Password</label>
            <input name="password" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value=" <?= $password ?>">
        </div>
        <div>
            <label for="">Role</label>
            <select name="role" class="form-select" aria-label="Default select example">
                <option value="0" <?= ($role == 0) ? 'selected' : '' ?>>User</option>
                <option value="1" <?= ($role == 1) ? 'selected' : '' ?>>Admin</option>
            </select>
        </div>
        <div class="mb-5 mt-2">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" name="editUser" class="btn btn-success" value="Edit User">
            <a href="index.php?act=listUser"><button class="btn btn-info" type="button" value="List Category">List
                    Category</button></a>
        </div>
    </form>
</section>