<?php 
    if(is_array($cate)){
        extract($cate);
    }
?>

<section class = "container  mt-3">
    <h1>Edit Category</h1>
    <?php
    if(isset($error)){
      echo '<div class="alert alert-danger" role="alert">
      '.$error.'
    </div>';
    }else{
      echo "";
    }
  ?>
    <form action="index.php?act=editCategory" method= "post">
        <div>
            <label for="">Name</label>
            <input name = "cate" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value = "<?=$name ?>">
        </div>
        <div class = "mb-5 mt-2">
            <input type="hidden" name="id" value = "<?=$id ?>">
            <input type="submit" name = "editCate" class="btn btn-success" value ="Edit Category">
            <input type="reset" class="btn btn-warning" value ="Reset">
            <a href="index.php?act=listCategory"><button class="btn btn-info" type = "button" value = "List Category">List Category</button></a>
        </div>
    </form>
</section>