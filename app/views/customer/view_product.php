<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/view_product.css">
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<section>
    <div class="container">
        <div class="feature">
            <div class="product_img">
                <img class="pic_product" src="<?php echo URLROOT; ?>/img/customer/milkbottel.png" alt="">
            </div>
        </div>
        <div class="feature">
            <div class="form_container">
                <form action="">
                    <div class="feature1">
                        <div class="form-input-title">Product Name</div>
                        <input type="text" name="p_name" id="p_name" class="p_name" autocomplete="off" >
                    </div>
                    <div class="feature1">
                        <div class="form-input-title">Price</div>
                        <input type="text" name="p_price" id="p_price" class="p_price" autocomplete="off" >
                    </div>
                    <div class="feature1">
                        <div class="form-input-title">Ingreadients</div>
                        <input type="text" name="ingreadients" id="ingreadients" class="ingreadients" autocomplete="off" >
                    </div>
                    <div class="feature1">
                        <div class="form-input-title">Ingreadients</div>
                        <div class="quantity">
                            <span class="minus">-</span>
                            <span class="num"></span>
                            <span class="plus">+</span>
                        </div>
                    </div>
                    <div class="feature1">
                        <input type="BuyNow" value="Buy Now" class="buynowBtn" onclick="">
                    </div>
                    <div class="feature1">
                        <input type="AddtoCart" value="Add to Cart" class="AddtoCartBtn" onclick="">
                    </div>                                                             
                </form>
            </div>
        </div>
    </div>
</section>




<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/customer.js"></script>