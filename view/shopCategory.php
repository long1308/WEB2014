<div class="mt-5">
<form action="index.php?act=shopCategory" method = "post">
    <div class ="">
        <input type="text" name = "search" placeholder = "Search" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
        <input type="submit" name = "btnSearch" value = "Search" class="btn btn-success mt-3" />
    </div>
</form>
<div class="card-deck row gap-3 px-5 mt-5 ">
  <?php foreach ($listProduct as $product): ?>
    <div class="card col position-relative">
      <a href="index.php?act=productDetail&id=<?php echo $product['id']; ?>">
      <div>
      <img src="./upload/<?php echo $product['image'] ?>" class="card-img-top" alt="...">
      </a>
      <div class="card-body">
        <h5 class="card-title"><?php echo $product['name'] ?></h5>
        <div class = "d-flex justify-content-between">
          <span><del><?php echo $product['price'] ?></del></span>
          <span><?php echo $product['price_sale'] ?></span>
        </div>
        <div  class="position-absolute d-flex gap-2 flex-column" style="top: 10px; left: 12px;">
          <span class="btn btn-info"><?php echo $product['price_sale'] ?>%</span>
        </div>
       
      </div>
      <button class = "btn bg-success rounded-pill p-2 mb-2 w-full">Add to Cart</button>
    </div>
  
    </div>
  <?php endforeach ?>

</div>
</div>
<nav aria-label="Page navigation example" class ="d-flex justify-content-center mt-3">
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