<?php 
    if(is_array($product)){
        extract($product);
    }
?>
<section class="container m-3">
    <h1>Edit Product</h1>
    <form action="index.php?act=editProduct" method="post" enctype="multipart/form-data">
        <div>
            <label for="">Name</label>
            <input name="name" type="text" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default" value="<?=$name ?>">
        </div>
        <div>
            <label for="">Price</label>
            <input name="price" type="number" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default" value="<?=$price ?>">
        </div>
        <div>
            <label for="">Price Sale</label>
            <input name="price_sale" type="number" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default" value="<?=$price_sale ?>">
        </div>
        <div>
            <label for="">Hot Sale</label>
            <input name="hot_sale" type="number" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default" value="<?=$hot_sale ?>">
        </div>
        <div>
            <label for="">Image</label>
            <input name="image" type="file" class="form-control" aria-label="Default"
                aria-describedby="inputGroup-sizing-default">
            <?php echo '<img class="img-thumbnail" width="100" height="100" src="../upload/'.$image.'" alt="">'?>
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea class="form-control" name="description" rows="3"><?=$description ?></textarea>
        </div>
        <div>
            <label for="">Category</label>
            <select name="categoryId" class="form-control">
                <?php foreach ($categorys as $cate): ?>
                <option value="<?php echo $cate['id']; ?>" <?php if ($cate['id'] == $categoryId) echo 'selected'; ?>>
                    <?php echo $cate['name']; ?>
                </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="mb-5 mt-2">
            <input type="hidden" name="id" value="<?=$id ?>">
            <input type="submit" name="editProduct" class="btn btn-success" value="Edit Product">
            <a href="index.php?act=listProduct"><button class="btn btn-info" type="button" value="List addProduct">List
                    Product</button></a>
        </div>
    </form>
</section>