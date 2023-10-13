<?php
if (is_array($product)) {
    extract($product);
}
?>

<head>
    <link rel="stylesheet" type="text/css" href="./css/productDetail.css">

</head>

<body>
    <div class="container">
        <h1 class="mt-3 fs-3">Home/Shop/<?php echo $name ?></h1>
        <div class="cards mt-3">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="./upload/<?php echo $image ?>" />
                            </div>
                        </div>

                    </div>
                    <div class="details col-md-6 bg-light">
                        <h3 class="product-title"><?php echo $name ?></h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no"><?php echo $view ?> views</span>
                        </div>
                        <p class="product-description"><?php echo $description ?></p>
                        <h4 class="price">current price: <span><?php echo $price_sale ?>$</span></h4>
                        <span class="price"><del><?php echo $price ?></del>$</span>
                        <p class="vote"><strong><?php echo $hot_sale ?>%</strong> of buyers enjoyed this product!
                            <strong>(87 votes)</strong>
                        </p>
                        <div class="action">
                            <a href="index.php?act=addCart&id=<?php echo $product['id'] ?>">
                                <button class="add-to-cart btn btn-default" type="button">Add to
                                    Cart</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- comment -->
        <div class="comment-box">
            <h2>Comments</h2>
            <!-- Hiển thị danh sách các bình luận -->
            <div class="comment">
                <?php
                if (isset($error)) {
                    echo '<div class="alert alert-danger" role="alert">
      ' . $error . '
    </div>';
                } else {
                    echo "";
                }
                ?>
                <div class="bg-body-secondary p-3 mb-3">
                    <?php foreach ($comments as $comment) : ?>
                        <div class="card-body mb-4">
                            <div class="d-flex flex-start">
                                <?php
                                // Tìm tên của người dùng dựa trên $comment['idUser'] trong danh sách $users
                                $img = '';
                                foreach ($users as $user) {
                                    if ($user['id'] == $comment['idUser']) {
                                        $img = $user['image'];
                                        break; // Dừng vòng lặp sau khi tìm thấy tên
                                    }
                                }
                                echo '<img class="rounded-circle shadow-1-strong me-3" src="./upload/' . $img . '" alt="avatar" width="40" height="40" />';
                                ?>

                                <div class="w-100">
                                    <div class="d-flex justify-content-between align-items-center mb-3">

                                        <h6 class="text-primary fw-bold mb-0">
                                            <?php
                                            // Tìm tên của người dùng dựa trên $comment['idUser'] trong danh sách $users
                                            $name = '';
                                            foreach ($users as $user) {
                                                if ($user['id'] == $comment['idUser']) {
                                                    $name = $user['name'];
                                                    break; // Dừng vòng lặp sau khi tìm thấy tên
                                                }
                                            }
                                            echo $name;
                                            ?>
                                            <span class="text-dark ms-2"><?php echo $comment['content']; ?></span>
                                        </h6>
                                        <p class="mb-0"><?php echo $comment['created_at'] ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p class="small mb-0 d-flex">
                                            <a href="index.php?act=removeComment&idComment=<?php echo $comment['id']; ?>&idProduct=<?php echo $comment['idProduct']; ?>&idUser=<?php echo $comment['idUser']; ?>" class="text-decoration-none mr-5">Remove</a> •

                                            <a href="#!" class="text-decoration-none nav-link disabled ">Reply</a> •
                                            <a href="#!" class="text-decoration-none nav-link disabled ">Translate</a>
                                        </p>
                                        <div class="d-flex flex-row">
                                            <i class="fas fa-star text-warning me-2"></i>
                                            <i class="far fa-check-circle text-muted"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- Form để người dùng nhập bình luận mới -->
                <form action="index.php?act=addComment" method="post">
                    <div class="form-group mb-2">
                        <input type="hidden" name="idProduct" value="<?= $id ?>">
                        <label for="comment">Add a Comment:</label>
                        <textarea class="form-control" id="comment" name="content" rows="4"></textarea>
                    </div>
                    <input type="submit" name="btnComment" class="btn btn-primary" value="Submit" />
                </form>
            </div>
        </div>
</body>
</div>
</body>