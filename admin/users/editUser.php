<?php 
    if(is_array($user)){
        extract($user);
    }
?>

<section class = "container  mt-3">
    <h1>Edit User</h1>
    <form action="index.php?act=editUser" method= "post">
    <div>
            <label for="">Name</label>
            <input name = "name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"value = " <?=$name ?>">
        </div>
        <div>
            <label for="">Username</label>
            <input name = "username" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value = "<?=$username ?>">
        </div>
        <div>
            <label for="">Password</label>
            <input name = "password" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"value = " <?=$password ?>">
        </div>
        <div>
    <label for="">Role</label>
    <select name="role" class="form-select" aria-label="Default select example">
        <option value="0" <?= ($role == 0) ? 'selected' : '' ?>>User</option>
        <option value="1" <?= ($role == 1) ? 'selected' : '' ?>>Admin</option>
    </select>
</div>
        <div class = "mb-5 mt-2">
            <input type="hidden" name="id" value = "<?=$id ?>">
            <input type="submit" name = "editUser" class="btn btn-success" value ="Edit User">
            <input type="reset" class="btn btn-warning" value ="Reset">
            <a href="index.php?act=listUser"><button class="btn btn-info" type = "button" value = "List Category">List Category</button></a>
        </div>
    </form>
</section>