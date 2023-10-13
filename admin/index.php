<?php
session_start();
include '../model/pdo.php';
include '../model/category.php';
include '../model/product.php';
include '../model/users.php';
include '../model/comment.php';
include 'header.php';
//controller
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] == 0) {
    header('Location: http://localhost/duanmau/index.php?act=home'); // Chuyển hướng đến trang đăng nhập
} else {
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
        switch ($act) {
            case 'addCategory':
                // check submit
                if (isset($_POST['addCate']) && $_POST['addCate'] != '') {
                    $category = $_POST['cate'];
                    // insert into database
                    if (!empty($category)) {
                        category_insert($category);
                        header('location: index.php?act=listCategory');
                    } else {
                        $error = "Category is not empty";
                    }
                }
                include 'categorys/addCategory.php';
                break;
            case 'listCategory':
                $categorys = category_select_all();
                include 'categorys/listCategory.php';
                break;
            case 'get_One_Cate':
                if (isset($_GET['id']) && $_GET['id'] != '') {
                    $id = $_GET['id'];
                    $cate = category_select_by_id($id);
                }
                include 'categorys/editCategory.php';
                break;
            case 'editCategory':
                if (isset($_POST['editCate']) && $_POST['editCate'] != '') {
                    $category = $_POST['cate'];
                    $id = $_POST['id'];
                    if (empty($category)) {
                        $error = "Category is not empty";
                    } else {
                        category_edit($id, $category);
                        header('location: index.php?act=listCategory');
                    }
                }
                include 'categorys/editCategory.php';
                break;
            case 'removeCategory':
                if (isset($_GET['id']) && $_GET['id'] != '') {
                    $id = $_GET['id'];
                    category_delete($id);
                    header('location: index.php?act=listCategory');
                }
                break;
            case 'addProduct':
                // check submit
                if (isset($_POST['addProduct']) && $_POST['addProduct'] != '') {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $image = $_FILES['image']['name'];
                    $description = $_POST['description'];
                    $categoryId = $_POST['categoryId'];
                    $hot_sale = $_POST['hot_sale'];
                    $price_sale = $price - ($price * ($hot_sale / 100));

                    // Kiểm tra các trường dữ liệu không được để trống
                    if (!empty($name) && !empty($price) && !empty($image) && !empty($price_sale) && !empty($description) && !empty($categoryId)) {
                        //upload image
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                        // insert into database 
                        products_insert($name, $price, $image, $price_sale, $hot_sale, $description, $categoryId);
                        header('location: index.php?act=listProduct');
                    } else {
                        $error = "Product is not empty";
                    }
                }
                $categorys = category_select_all();
                include 'products/addProduct.php';
                break;
            case 'listProduct':
                if (isset($_POST['btnSearch']) && $_POST['btnSearch'] != '') {
                    $search = $_POST['search'];
                    $categoryId = $_POST['categoryId'];
                } else {
                    $search = '';
                    $categoryId = 0;
                }
                $products = products_select_all($search, $categoryId);
                $categorys = category_select_all();
                include 'products/listProduct.php';
                break;
            case 'get_One_Product':
                if (isset($_GET['id']) && $_GET['id'] != '') {
                    $id = $_GET['id'];
                    $product = products_select_by_id($id);
                }
                $categorys = category_select_all();
                include 'products/editProduct.php';
                break;
            case 'editProduct':
                if (isset($_POST['editProduct']) && $_POST['editProduct'] != '') {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $image = $_FILES['image']['name'];
                    $hot_sale = $_POST['hot_sale'];
                    //upload image
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    $description = $_POST['description'];
                    $categoryId = $_POST['categoryId'];
                    $id = $_POST['id'];
                    $price_sale = $price - ($price * ($hot_sale / 100));
                    products_update($id, $name, $price, $image, $price_sale, $hot_sale, $description, $categoryId);
                    header('location: index.php?act=listProduct');
                }
                break;
            case 'removeProduct':
                if (isset($_GET['id']) && $_GET['id'] != '') {
                    $id = $_GET['id'];
                    products_delete($id);
                    header('location: index.php?act=listProduct');
                }
                break;
            case 'removeSelectedProducts':
                if (isset($_POST['deleteSelectedProducts'])) {
                    $list_id = $_POST['selectedProducts'];
                    echo $list_id;
                    products_delete($list_id);
                    header('location: index.php?act=listProduct');
                }
                break;
            case 'addUser':
                // check submit
                if (isset($_POST['addUser']) && $_POST['addUser'] != '') {
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $image = $_FILES['image']['name'];
                    $role = $_POST['role'];

                    // Kiểm tra các trường dữ liệu không được để trống
                    if (!empty($name) && !empty($username) && !empty($password) && !empty($image)) {
                        // insert into database
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        users_insert($name, $image, $username, $password, $role);
                        header('location: index.php?act=listUser');
                    } else {
                        // Một hoặc nhiều trường dữ liệu bị trống, thực hiện xử lý lỗi hoặc thông báo lỗi
                        $error = "User is not empty";
                    }
                }
                include 'users/addUser.php';
                break;

            case 'listUser':
                $users = users_select_all();
                include 'users/listUser.php';
                break;
            case 'get_One_User':
                if (isset($_GET['id']) && $_GET['id'] != '') {
                    $id = $_GET['id'];
                    $user = users_select_by_id($id);
                }
                include 'users/editUser.php';
                break;
            case 'editUser':
                if (isset($_POST['editUser']) && $_POST['editUser'] != '') {
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $image = $_FILES['image']['name'];
                    $role = $_POST['role'];
                    $id = $_POST['id'];
                    // Kiểm tra các trường dữ liệu không được để trống
                    if (!empty($name) && !empty($username) && !empty($password) && !empty($role) && !empty($id)) {
                        // Cập nhật thông tin người dùng trong cơ sở dữ liệu
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        users_update($id, $name, $image, $username, $password, $role);
                        header('location: index.php?act=listUser');
                    } else {
                        // Một hoặc nhiều trường dữ liệu bị trống, thực hiện xử lý lỗi hoặc thông báo lỗi
                        $error = "User is not empty";
                        header('location: index.php?act=get_One_User&id=' . $id);
                    }
                }
                include 'users/editUser.php';
                break;

            case 'removeUser':
                if (isset($_GET['id']) && $_GET['id'] != '') {
                    $id = $_GET['id'];
                    users_delete($id);
                    header('location: index.php?act=listUser');
                }
                break;
            case 'removeSelectedUsers':
                if (isset($_POST['deleteUserSelected'])) {
                    $list_id = $_POST['selectedUsers'];
                    echo $list_id;
                    users_delete($list_id);
                    header('location: index.php?act=listUser');
                }
                break;
            case 'logout':
                if (isset($_SESSION['user'])) {
                    unset($_SESSION['user']); // Xóa phiên đăng nhập
                }
                header('location: http://localhost/duanmau/index.php?act=home'); // Chuyển hướng người dùng về trang chủ sau khi logout
                break;

            default:
                include 'home.php';
                break;
            case 'listComment':
                $comments = comment_select_alls();
                include 'comments/listComment.php';
                break;
            case "removeComment":
                if (isset($_GET['idComment']) && $_GET['idComment'] != '') {
                    $idComment = $_GET['idComment'];
                    comment_delete($idComment);
                    header('location: index.php?act=listComment');
                }
                break;
        }
    } else {
        include 'home.php';
    }
}

include 'footer.php';