<head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />

</head>
<?php $totalPriceSale = 0;
$totalPrice = 0;
?>
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <div class="row">

                            <div class="col-lg-7">
                                <h5 class="mb-3"><a href="index.php?act=home" class="text-body"><i
                                            class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                                <hr>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <p class="mb-1">Shopping cart</p>
                                        <p class="mb-0">You have <?php echo count($listCart) ?> items in your cart</p>
                                    </div>
                                    <div>
                                        <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!"
                                                class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
                                    </div>
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
                                            $totalPriceSale +=  $item['quantity'] * $it['price_sale'];
                                            $totalPrice +=  $item['quantity'] * $it['price'];
                                            $totalPriceItem = $item['quantity'] * $it['price_sale'];
                                            // $qt = $item['quantity'];
                                            break;
                                        }
                                    }
                                    ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex  flex-row align-items-center">
                                                <div>
                                                    <img src="./upload/<?php echo $image; ?>"
                                                        class="img-fluid rounded-3" alt="Shopping item"
                                                        style="width: 65px;">
                                                </div>
                                                <div class="ms-3">
                                                    <h5><?php echo $name ?></h5>
                                                    <p class="small mb-0"><?php echo $cateName ?></p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-row align-items-center">
                                                <div style="width: 50px;">
                                                    <h5 class="fw-normal mb-0"><?php echo $item['quantity'] ?></h5>
                                                </div>
                                                <div style="width: 80px;">
                                                    <h5 class="mb-0"><?php echo $totalPriceItem ?></h5>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach; ?>
                            </div>
                            <div class="col-lg-5">

                                <div class="card bg-primary text-white rounded-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5 class="mb-0">Order details</h5>
                                            <img src="./upload/<?php echo $_SESSION['user']['image'] ?>"
                                                class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                        </div>
                                        <p class="small mb-2">Card type</p>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="text-white me-2 link-opacity-50" disabled><i
                                                    class="fab fa-cc-mastercard fa-2x"></i></a>
                                            <a href="#" class="text-white me-2 link-opacity-50" disabled><i
                                                    class="fab fa-cc-visa fa-2x"></i></a>
                                            <a href="#" class="text-white me-2 link-opacity-50" disabled><i
                                                    class="fab fa-cc-amex fa-2x"></i></a>
                                            <a href="#" class="text-white link-opacity-50" disabled><i
                                                    class="fab fa-cc-paypal fa-2x"></i></a>
                                            <!-- <a href="#" class="text-white link-opacity-50 py-2" disabled><i
                                                    class="py-1  rounded ml-1"
                                                    style="width: 45px; color: #3B71CA;background-color: #eee;  ;">Vn
                                                    Pay</i></a> -->
                                        </div>

                                        <form class="mt-4">
                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeName" class="form-control form-control-lg"
                                                    siez="17" placeholder="Cardholder's Name" disabled />
                                                <label class="form-label" for="typeName">Cardholder's Name</label>
                                            </div>

                                            <div class="form-outline form-white mb-4">
                                                <input type="text" id="typeText" class="form-control form-control-lg"
                                                    siez="17" placeholder="1234 5678 9012 3457" minlength="19"
                                                    maxlength="19" disabled />
                                                <label class="form-label" for="typeText">Card Number</label>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input disabled type="text" id="typeExp"
                                                            class="form-control form-control-lg" placeholder="MM/YYYY"
                                                            size="7" id="exp" minlength="7" maxlength="7" />
                                                        <label class="form-label" for="typeExp">Expiration</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline form-white">
                                                        <input disabled type="password" id="typeText"
                                                            class="form-control form-control-lg"
                                                            placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3"
                                                            maxlength="3" />
                                                        <label class="form-label" for="typeText">Cvv</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                        <hr class="my-4">
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Subtotal</p>
                                            <p class="mb-2">$<?php echo $totalPrice ?></p>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <p class="mb-2">Sale</p>
                                            <p class="mb-2">$<?php echo $totalPrice - $totalPriceSale ?></p>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <p class="mb-2">Total(Incl. taxes)</p>
                                            <p class="mb-2">$<?php echo $totalPriceSale ?></p>
                                        </div>

                                        <button type="button" class="btn btn-info btn-block btn-lg">
                                            <div class="d-flex justify-content-between">
                                                <span>$<?php echo $totalPriceSale ?></span>
                                                <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                            </div>
                                        </button>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>