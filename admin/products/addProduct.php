<section class="container mt-3">
    <h1>New Product</h1>
    <?php
    if (isset($error)) {
        echo '<div class="alert alert-danger" role="alert">
      ' . $error . '
    </div>';
    } else {
        echo "";
    }
    ?>
    <form action="index.php?act=addProduct" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input name="name" type="text" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default">
        </div>
        <div>
            <label for="">Price</label>
            <input name="price" type="number" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default">
        </div>
        <!-- <div>
            <label for="">Price Sale</label>
            <input name="price_sale" type="number" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default">
        </div> -->
        <div>
            <label for="">Hot Sale</label>
            <input name="hot_sale" type="number" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default" value="0">
        </div>
        <div>
            <label for="">Image</label>
            <input name="image" type="file" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default" id="imageInput">
            <img id="imagePreview" class="img-thumbnail mt-2" width="100" height="100" src="../upload/<?= $image ?>"
                alt="">
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        <div>
            <label for="">Category</label>
            <select name="categoryId" class="form-control">
                <?php foreach ($categorys as $cate) : ?>
                <option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-5 mt-2">
            <input type="submit" name="addProduct" class="btn btn-success" value="Add Product">

            <a href="index.php?act=listProduct"><button class="btn btn-info" type="button" value="List Product">List
                    Product</button></a>
        </div>
    </form>
</section>