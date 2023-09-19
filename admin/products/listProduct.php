<section class= "container mt-3">
<h1>List Products</h1>
<form action="index.php?act=listProduct" method = "post">
    <div class ="">
        <input type="text" name = "search" placeholder = "Search" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        <div>
            <label for="">Category</label>
            <select name = "categoryId" class="form-control">
                <option value="0" selected>All</option>
                <?php foreach ($categorys as $cate): ?>
                    <option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <input type="submit" name = "btnSearch" value = "Search" class="btn btn-success mt-3" />
    </div>
</form>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Price Sale</th>
    <th scope="col">Description</th>
    <th scope="col">View</th>
    <th scope="col">Category</th>
    <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
  <?php 
  if(isset($products) && !empty($products)) {
    foreach ($products as $key => $value) {
        extract($value);
        //check cate 
        $categoryName = '';
        foreach ($categorys as $category) {
            if ($category['id'] == $categoryId) {
                $categoryName = $category['name'];
                break; // Exit the loop once we find a match
            }
        }
        echo '
        <tr>
            <th scope="row">' . ($key + 1) . '</th>
            <td>' . $name . '</td>
            <td>' . $price . '</td>
            <td><img class="img-thumbnail" width="50" height="50" src="../upload/'.$image.'" alt=""></td>
            <td>' . $price_sale . '</td>
            <td>' . $description . '</td>
            <td>' . $view . '</td>
            <td>' . $categoryName . '</td>
            <td> 
            <a href="index.php?act=get_One_Product&id=' . $id . '" class="btn btn-success">Edit Product</a>
            <a href="index.php?act=removeProduct&id=' . $id . '" class="btn btn-danger">Remove Product</a>
            </td>
             
        </tr>
        ';
    }
  }else{
    echo '<h2>Danh Sách Lỗi</h2>';
  }
   
?>
  </tbody>
</table>
</section>