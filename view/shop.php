<style>
    .card {
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: scale(1.05);
        /* Hoặc giá trị khác tùy ý để tạo hiệu ứng phóng to */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Đổ bóng khi hover */
    }
</style>
<div class="mt-5">
    <div>
        <h2 class="text-center fw-bold display-4 ">
            Shop All Products
        </h2>
        <p class="text-center opacity-75">
            Summer Collection New Morden Design
        </p>
    </div>
    <form action="index.php?act=shop" method="post">
        <div class="d-grid gap-2 d-md-block">
            <label for="">Name</label>
            <input type="text" name="search" placeholder="Search" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
            <div>
                <label for="">Category</label>
                <select name="categoryId" class="form-control">
                    <option value="0" selected>All</option>
                    <?php foreach ($categorys as $cate) : ?>
                        <option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <input type="submit" name="btnSearch" value="Search" class="btn btn-success my-3" />
        </div>
    </form>
    <div class="card-deck row row-cols-2 row-cols-lg-6 g-2 g-lg-3 px-5 ">
        <?php foreach ($listProduct as $product) : ?>
            <div class="card col position-relative p-3 mr-2" style="margin-right:10px ;">
                <a href="index.php?act=productDetail&id=<?php echo $product['id']; ?>">
                    <div>
                        <img src="./upload/<?php echo $product['image'] ?>" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name'] ?></h5>
                    <div class="d-flex justify-content-between">
                        <span><del><?php echo $product['price'] ?></del>$</span>
                        <span><?php echo $product['price_sale'] ?>$</span>
                    </div>
                    <div class="position-absolute d-flex gap-2 flex-column" style="top: 10px; left: 12px;">
                        <span class="btn btn-info"><?php echo $product['hot_sale'] ?>%</span>
                    </div>

                </div>
                <a href="index.php?act=addCart&id=<?php echo $product['id'] ?>">
                    <button class="btn bg-success rounded-pill p-2 mb-2 w-100 hover-effect">Add to
                        Cart</button>
                </a>
            </div>

    </div>
<?php endforeach ?>
</div>
</div>
<nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

<!-- echo "<pre>";
print_r($listProduct);
echo "</pre>"; -->