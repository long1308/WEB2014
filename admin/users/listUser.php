<section class= "container mt-3">
<h1>List User</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  if(isset($users) && !empty($users)) {
    foreach ($users as $key => $value) {
        extract($value);
        $userRole = ($role == 0) ? 'User' : 'Admin';
        echo '
        <tr>
            <th scope="row">' . ($key + 1) . '</th>
            <td>' . $name . '</td>
            <td>' . $username . '</td>
            <td>' . $password . '</td>
            <td>' . $userRole . '</td>
            <td> 
            <a href="index.php?act=get_One_User&id=' . $id . '" class="btn btn-success">Edit User</a>
            <a href="index.php?act=removeUser&id=' . $id . '" class="btn btn-danger">Remove User</a>
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