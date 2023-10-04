<section class = "container mt-3">
    <h1>New User</h1>
    <form action="index.php?act=addUser" method= "post" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input name = "name" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <div>
            <label for="">Username</label>
            <input name = "username" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <div>
            <label for="">Password</label>
            <input name = "password" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        </div>
        <div>
            <label for="">Role</label>
            <select name = "role" class="form-select" aria-label="Default select example">
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>  
        </div>
        <div class = "mb-5 mt-2">
            <input type="submit" name = "addUser" class="btn btn-success" value ="Add addUser">
            <input type="reset" class="btn btn-warning" value ="Reset">
            <a href="index.php?act=listUser"><button class="btn btn-info" type = "button" value = "List Product">List addUser</button></a>
        </div>
    </form>
</section>