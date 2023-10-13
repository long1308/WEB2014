<head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />

</head>
<?php $totalPrice = 0; ?>
<?php
include_once "bannerCart.php"
?>

<body>
    <section class="h-100 h-custom" style="background-color: #d2c9ff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted"><?php echo count($listCart); ?> items</h6>
                                        </div>
                                        <?php foreach ($listCart as $item) : ?>
                                        <?php

                                            foreach ($listProduct as $it) {
                                                if ($it['id'] == $item['idProduct']) {
                                                    foreach ($listCategory as $cate) {
                                                        if ($cate['id'] == $it['categoryId']) {
                                                            $cateName = $cate['name'];
                                                            break;
                                                        }
                                                    }
                                                    $name = $it['name'];
                                                    $price = $it['price_sale'];
                                                    $image = $it['image'];
                                                    $totalPrice +=  $item['quantity'] * $it['price_sale'];
                                                    // $qt = $item['quantity'];
                                                    break;
                                                }
                                            }
                                            ?>
                                        <hr class="my-4">
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="./upload/<?php echo $image; ?>" class="img-fluid rounded-3"
                                                    alt="<?php echo $name; ?>">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <h6 class="text-black mb-0"><?php echo $name; ?></h6>
                                                <h6 class="text-muted mt-1"><?php echo $cateName ?></h6>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <button class="btn btn-link px-2" onclick="updateQuantity(this, -1)">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <form
                                                    action="index.php?act=updateQuantity&idCart=<?php echo $item['id'] ?>"
                                                    method="post">
                                                    <input id="form1" min="0" name="quantity"
                                                        value="<?php echo $item['quantity'] ?>" type="number"
                                                        class="form-control form-control-sm" />
                                                    <input name="updateQuantity" class="btn btn-secondary" type="submit"
                                                        value="UPDATE">
                                                </form>
                                                <button class="btn btn-link px-2" onclick="updateQuantity(this, 1)">
                                                    <i class="fas fa-plus"></i>
                                                </button>

                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 class="mb-0"> <?php echo $price; ?>$</h6>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="index.php?act=deleteCart&idCart=<?php echo $item['id'] ?>"
                                                    class="text-muted"><i class="fas fa-times"></i></a>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                        <hr class="my-4">

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="index.php?act=home" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between">
                                            <h3 class="fw-bold ">Summary</h3>


                                        </div>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Total Quantity</h5>
                                            <h5 class="text-uppercase"> <?php echo calculateTotalQuantity($listCart);
                                                                        ?> items</h5>
                                        </div>
                                        <h5 class="text-uppercase mb-3">Give code</h5>

                                        <div class="mb-5">
                                            <div class="form-outline">
                                                <input type="text" disabled id="form3Examplea2"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form3Examplea2">Enter your
                                                    code</label>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5 class="text-uppercase"> <?php echo $totalPrice; ?>$
                                            </h5>

                                        </div>

                                        <a type="button" href="index.php?act=order"
                                            class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Order
                                            Shopping</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <script>
    function updateQuantity(button, change) {
        const input = button.parentNode.querySelector('input[type=number]');
        let value = parseInt(input.value);
        value += change;
        if (value < 1) {
            value = 1;
        }
        input.value = value;
        // Update the total price here if needed
    }
    </script>
</body>