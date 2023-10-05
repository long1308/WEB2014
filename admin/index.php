<?php
session_start();
include '../model/pdo.php';
include '../model/category.php';
include '../model/product.php';
include '../model/users.php';
include 'header.php';
//controller
if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 0) {
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
                    $price_sale = $_POST['price_sale'];
                    $description = $_POST['description'];
                    $categoryId = $_POST['categoryId'];

                    // Kiểm tra các trường dữ liệu không được để trống
                    if (!empty($name) && !empty($price) && !empty($image) && !empty($price_sale) && !empty($description) && !empty($categoryId)) {
                        //upload image
                        $target_dir = "../upload/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

                        // insert into database 
                        products_insert($name, $price, $image, $price_sale, $description, $categoryId);
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
                    //upload image
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    $price_sale = $_POST['price_sale'];
                    $description = $_POST['description'];
                    $categoryId = $_POST['categoryId'];
                    $id = $_POST['id'];
                    products_update($id, $name, $price, $image, $price_sale, $description, $categoryId);
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
            case 'addUser':
                // check submit
                if (isset($_POST['addUser']) && $_POST['addUser'] != '') {
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $role = $_POST['role'];

                    // Kiểm tra các trường dữ liệu không được để trống
                    if (!empty($name) && !empty($username) && !empty($password)) {
                        // insert into database
                        users_insert($name, $username, $password, $role);
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
                    $role = $_POST['role'];
                    $id = $_POST['id'];

                    // Kiểm tra các trường dữ liệu không được để trống
                    if (!empty($name) && !empty($username) && !empty($password)) {
                        // Cập nhật thông tin người dùng trong cơ sở dữ liệu
                        users_update($id, $name, $username, $password, $role);
                        header('location: index.php?act=listUser');
                    } else {
                        // Một hoặc nhiều trường dữ liệu bị trống, thực hiện xử lý lỗi hoặc thông báo lỗi
                        $error = "User is not empty";
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
            default:
                include 'home.php';
                break;
        }
    } else {
        include 'home.php';
    }
}

include 'footer.php';