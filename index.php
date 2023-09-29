<?php 
include_once 'model/pdo.php';
include_once 'model/category.php';
include_once 'model/product.php';
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
            
        case 'cart':
            include_once 'view/cart.php';
            break;
        case 'checkout':
            include_once 'view/checkout.php';
            break;
        case 'contact':
            include_once 'view/contact.php';
            break;
        case 'about':
            include_once 'view/about.php';
            break;
            case 'blog':
                include_once 'view/blog.php';
                break;
        default:
            include_once 'view/home.php';
            break;
    }
}
include_once 'view/footer.php';
?>