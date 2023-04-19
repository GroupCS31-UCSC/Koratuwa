<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/add_to_cart.css">
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<section class="cartList">
    <div class="container">
        <?php
        $subtotal = 0;

        if(isset($data['products']) && !empty($data['products'])){
            foreach($data['products'] as $product){
                $subtotal += $product->total_price;
                ?>
                <div class="itemDetails">
                    <div class="feature1"><img src="<?php echo UPLOADS . $product->image?>" width="100"></div>
                    <div class="feature1">
                        <div class="productDetails">
                            <h3> <?php echo $product->product_name?></h3>
                            <h3> <?php echo $product->unit_size?></h3>
                            <h4>RS.<?php echo $product->total_price?></h4>
                            <h4>Quantity: <?php echo $product->quantity?></h4>
                        </div>
                       
                    </div>
                    <div class="feature1">
                        <button class="clear-button"><a href="<?php echo URLROOT?>/Customer/deleteCartItem/<?php echo $product->timestamp ?>" ><i class="fa-solid fa-trash"></i></button></a>
                    </div>
                    
                </div>
                
                <?php
            }
            ?>
            <br>
            <br>
                    <div class="subtotal">Total Price: RS.<?php echo $subtotal?></div>
                    <!-- checkout button -->
                    <input type="button" value="Buy Now" class="buynowBtn" onclick="location.href='<?php echo URLROOT; ?>/Customer/buyNow' ">
            <?php
        }else {
            ?>
            <div>
                <h1>Empty Cart</h1>
            </div>
            <?php
        }

        ?>
    </div>
</section>

<?php require APPROOT.'/views/include/footer.php'; ?>
<!-- <script src="<?php echo URLROOT; ?>/js/customer.js"></script> -->
