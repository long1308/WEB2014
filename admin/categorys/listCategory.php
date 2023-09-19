<section class= "container mt-3">
<h1>List Category</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  if(isset($categorys) && !empty($categorys)) {
    foreach ($categorys as $key => $value) {
        extract($value);
        echo '
        <tr>
            <th scope="row">' . ($key + 1) . '</th>
            <td>' . $name . '</td>
            <td> 
            <a href="index.php?act=get_One_Cate&id=' . $id . '" class="btn btn-success">Edit Category</a>
            <a href="index.php?act=removeCategory&id=' . $id . '" class="btn btn-danger">Remove Category</a>
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