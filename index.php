<?php
session_start();
include_once 'model/pdo.php';
include_once 'model/category.php';
include_once 'model/product.php';
include_once 'model/users.php';
include_once 'model/comment.php';
$categorys = category_select_all();
include_once 'view/header.php';
if (isset($_GET['act'])) {

    $act = $_GET['act'];
    switch ($act) {
        case 'home':
            include_once 'view/banner.php';
            $listProduct = products_select_all();
            $listProductTop10 = products_select_top10();
            include_once 'view/home.php';
            break;
        case 'productDetail':
            if (isset($_GET['id']) && $_GET['id'] != '') {
                $id = $_GET['id'];
                $product = products_select_by_id($id);
                products_increase_views($id);
                $comments = comment_select_all($id);
                $users = users_select_all();
            }
            include_once 'view/productDetail.php';

            break;
        case 'shop':
            if (isset($_POST['btnSearch']) && $_POST['btnSearch'] != '') {
                $search = $_POST['search'];
                $categoryId = $_POST['categoryId'];
            } else {
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
            if (isset($_POST['btnSignup']) && $_POST['btnSignup'] != '') {
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
            if (isset($_POST['btnSignin']) && $_POST['btnSignin'] != '') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user = check_user($username, $password);
                if ($user != null) {
                    $_SESSION['user'] = $user;
                    header('location: http://localhost/duanmau/index.php?act=home');
                } else {
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
        case 'profile':
            include_once 'view/profile.php';
            break;
        case 'editProfile':
            // Kiểm tra xem người dùng đã đăng nhập hay chưa
            if (!isset($_SESSION['user'])) {
                // Nếu chưa đăng nhập, chuyển họ đến trang đăng nhập hoặc hiển thị thông báo lỗi
                // Ví dụ: header('location: login.php');
                $error = "You are not logged in";
                break;
            }

            // Kiểm tra xem người dùng đã gửi biểu mẫu chỉnh sửa hay chưa
            if (isset($_POST['btnSave'])) {
                // Lấy dữ liệu từ biểu mẫu chỉnh sửa
                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $old_password = $_POST['old_password'];

                // Kiểm tra mật khẩu cũ có khớp với mật khẩu trong session không
                if ($old_password !== $_SESSION['user']['password']) {
                    // Nếu không khớp, hiển thị thông báo lỗi
                    $error = "Old password is incorrect";
                } else {
                    // Cập nhật thông tin tài khoản vào cơ sở dữ liệu
                    // Sử dụng câu lệnh SQL UPDATE
                    users_update($_SESSION['user']['id'], $name, $username, $password, $_SESSION['user']['role']);
                    // Sau khi cập nhật thành công, cập nhật lại thông tin trong session
                    $_SESSION['user']['name'] = $name;
                    $_SESSION['user']['username'] = $username;
                    $_SESSION['user']['password'] = $password;

                    // Chuyển người dùng đến trang chi tiết tài khoản sau khi cập nhật thành công
                    header('location: http://localhost/duanmau/index.php?act=profile');
                }
            }
            include_once 'view/editProfile.php';
            break;
        case 'addComment':
            $id = $_GET['id'];
            if (isset($_POST['btnComment']) && $_POST['btnComment'] != '') {
                $idProduct = $_POST['idProduct'];
                $idUser = $_SESSION['user']['id'];
                $content = $_POST['content'];
                comment_insert($idProduct, $idUser, $content);
                header('location: http://localhost/duanmau/index.php?act=productDetail&id=' . $idProduct);
            }
            break;
        case 'removeComment':
            if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
                $id = $_GET['idComment'];
                $idProduct = $_GET['idProduct'];
                comment_delete($id);
                header('location: http://localhost/duanmau/index.php?act=productDetail&id=' . $idProduct);
            } else {
                $id = $_GET['idComment'];
                $idUser = $_GET['idUser'];
                $idProduct = $_GET['idProduct'];
                if ($_SESSION['user']['id'] == $idUser) {
                    comment_delete($id);
                    header('location: http://localhost/duanmau/index.php?act=productDetail&id=' . $idProduct);
                } else {
                    echo '<script>alert("You do not have permission to delete this comment!!");</script>';
                    echo '<script>window.location.href = "http://localhost/duanmau/index.php?act=home";</script>';
                    $error = 'You do not have permission to delete this comment!!';
                }
            }


            if (!isset($_SESSION['user'])) {
                // Tạo mã JavaScript để hiển thị thông báo
                echo '<script>alert("You do not have permission to delete this comment!!");</script>';
                // Chuyển hướng sau khi hiển thị thông báo
                echo '<script>window.location.href = "http://localhost/duanmau/index.php?act=home";</script>';
                // Kết thúc xử lý PHP
                exit;
            }
            break;
        default:
            include_once 'view/home.php';
            break;
    }
}
include_once 'view/footer.php';
