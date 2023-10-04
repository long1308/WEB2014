<?php 
session_start();
include_once 'model/pdo.php';
include_once 'model/category.php';
include_once 'model/product.php';
include_once 'model/users.php';
$categorys = category_select_all();
include_once 'view/header.php';
if(isset($_GET['act'])){

    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            include_once 'view/banner.php';
            $listProduct = products_select_all();
            include_once 'view/home.php';
            break;
        case 'productDetail':
            if(isset($_GET['id']) && $_GET['id'] != '' ){
                $id = $_GET['id'];  
                $product = products_select_by_id($id);
            }
            include_once 'view/productDetail.php';
            
            break;
        case 'shop':
            if(isset($_POST['btnSearch']) && $_POST['btnSearch'] != ''){
                $search = $_POST['search'];
                $categoryId = $_POST['categoryId'];
            }else{
                $search = '';
                $categoryId = 0;
            }
            $listProduct = products_select_all($search, $categoryId);
            $categorys = category_select_all();
            include_once 'view/shop.php';
            break;
            case 'shopCategory':
                $id = isset($_GET['id']) ? $_GET['id'] : '';
            
                if (isset($_POST['btnSearch'])) {
                    $search = isset($_POST['search']) ? $_POST['search'] : '';
                } else {
                    $search = '';
                }
            
                if (!empty($id)) {

                    $listProduct = products_select_all($search, $id);
                } else {
                    // Xử lý mặc định hoặc thông báo lỗi nếu không có ID hoặc thực hiện tìm kiếm trong tất cả sản phẩm
                    $listProduct = products_select_all($search, 0);
                }
            
                include_once 'view/shopCategory.php';
                break;
            
        case 'signup':
            if(isset($_POST['btnSignup']) && $_POST['btnSignup'] != ''){
                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $role = 0;
                users_insert($name, $username, $password, $role);
                header('location: http://localhost/duanmau/index.php?act=signin');
            }
            include_once 'view/signup.php';
            break;
        case 'signin':
            if(isset($_POST['btnSignin']) && $_POST['btnSignin'] != ''){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user =check_user( $username, $password);
                if($user != null){
                    $_SESSION['user'] = $user;
                    header('location: http://localhost/duanmau/index.php?act=home');
                }
                else{
                    $message = 'Đăng nhập thất bại';
                }
    
            }
            include_once 'view/signin.php';
            break;
        case 'logout':
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']); // Xóa phiên đăng nhập
            }
            header('location: http://localhost/duanmau/index.php?act=home'); // Chuyển hướng người dùng về trang chủ sau khi logout
            break;
        case 'about':
            include_once 'view/about.php';
            break;
        case 'blog':
            include_once 'view/blog.php';
            break;
        case 'contact':
            include_once 'view/contact.php';
            break;
        default:
            include_once 'view/home.php';
            break;
    }
}
include_once 'view/footer.php';
?>