<?php 
    if(is_array($product)){
        extract($product);
    }
?>

<head>
    <link rel="stylesheet" type="text/css" href="./css/productDetail.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-3">Product Detail</h1>
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="./upload/<?php echo $image?>" /></div>
                        </div>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title"><?php echo $name?></h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no"><?php echo $view?> views</span>
                        </div>
                        <p class="product-description"><?php echo $description?></p>
                        <h4 class="price">current price: <span><?php echo $price_sale?>$</span></h4>
                        <span class="price"><del><?php echo $price ?></del>$</span>
                        <p class="vote"><strong><?php echo $hot_sale?></strong> of buyers enjoyed this product!
                            <strong>(87 votes)</strong>
                        </p>
                        <div class="action">
                            <button class="add-to-cart btn btn-default" type="button">add to cart</button>
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
                <iframe src="view/comment.php?idProduct=<?php echo $id; ?>" frameborder="0" width="100%" 300px
                    height=""></iframe>
            </div>

            <!-- Form để người dùng nhập bình luận mới -->
            <form action="process_comment.php" method="post">
                <div class="form-group">
                    <label for="comment">Add a Comment:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</div>
</body>