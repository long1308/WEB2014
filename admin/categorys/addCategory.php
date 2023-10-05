<section class="container mt-3">
    <h1>New Category</h1>
    <?php
    if (isset($error)) {
        echo '<div class="alert alert-danger" role="alert">
      ' . $error . '
    </div>';
    } else {
        echo "";
    }
    ?>
    <form action="index.php?act=addCategory" method="post">
        <div>
            <label for="">Name</label>
            <input name="cate" type="text" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="mb-5 mt-2">
            <input type="submit" name="addCate" class="btn btn-success" value="Add Category">
            <a href="index.php?act=listCategory"><button class="btn btn-info" type="button" value="List Category">List
                    Category</button></a>
        </div>
    </form>
</section>