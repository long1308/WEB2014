<?php
include '../model/pdo.php';
include '../model/category.php';
include '../model/product.php';
include 'header.php';
//controller
if(isset($_GET['act'])){
    $act = $_GET['act'];
    switch ($act) {
        case 'addCategory':
            // check submit
            if(isset($_POST['addCate']) && $_POST['addCate'] != ''){
                $category = $_POST['cate'];
                // insert into database
                category_insert($category);
                header('location: index.php?act=listCategory');
            }
            include 'categorys/addCategory.php'; 
            break;
        case 'listCategory':
            $categorys = category_select_all();
            include 'categorys/listCategory.php';
            break;
        case 'get_One_Cate':
            if(isset($_GET['id']) && $_GET['id'] != '' ){
                $id = $_GET['id'];
                $cate = category_select_by_id($id);
            }
            include 'categorys/editCategory.php';
            break;
        case 'editCategory':
                if(isset($_POST['editCate']) && $_POST['editCate'] != ''){
                    $category = $_POST['cate'];
                    $id = $_POST['id'];
                    category_edit($id, $category);
                    header('location: index.php?act=listCategory');
                }
                include 'categorys/editCategory.php';
            break;
        case 'removeCategory':
            if(isset($_GET['id']) && $_GET['id'] != '' ){
                $id = $_GET['id'];
                category_delete($id);
                header('location: index.php?act=listCategory');
            }
            break;
        case 'addProduct':
            // check submit
            if(isset($_POST['addProduct']) && $_POST['addProduct'] != ''){
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
                // insert into database 
                products_insert($name, $price, $image, $price_sale, $description, $categoryId);
                header('location: index.php?act=listProduct');
            }
            $categorys = category_select_all();
            $categorys = category_select_all();
            include 'products/addProduct.php';
            break;
        case 'listProduct':
            if(isset($_POST['btnSearch']) && $_POST['btnSearch'] != ''){
                $search = $_POST['search'];
                $categoryId = $_POST['categoryId'];
            }else{
                $search = '';
                $categoryId = 0;
            }
            $products = products_select_all($search, $categoryId);
            $categorys = category_select_all();
            include 'products/listProduct.php';
            break;
        case 'get_One_Product':
            if(isset($_GET['id']) && $_GET['id'] != '' ){
                $id = $_GET['id'];  
                $product = products_select_by_id($id);
            }
            $categorys = category_select_all();
            include 'products/editProduct.php';
            break;
        case 'editProduct':
            if(isset($_POST['editProduct']) && $_POST['editProduct'] != ''){
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
                products_update($id,$name, $price, $image, $price_sale, $description, $categoryId);
                header('location: index.php?act=listProduct');
            }  
                break;
        case 'removeProduct':
            if(isset($_GET['id']) && $_GET['id'] != '' ){
                $id = $_GET['id'];
                products_delete($id);
                header('location: index.php?act=listProduct');
            }
            break;
        case 'addUser':
            include 'users/addUser.php';
            break;
        default:
            include 'home.php';
            break;
    }
}else{
    include 'home.php';
}
include 'footer.php';
?>