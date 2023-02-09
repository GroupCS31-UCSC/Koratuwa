<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/cus_home.css">
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<!-- <section class="all_products">
    

    <div class="container">
        <div class="feature">
            <a href="<?php echo URLROOT; ?>/customer/view_product"><img class="pic" src="<?php echo URLROOT; ?>/img/customer/milkbottel.png" alt=""></a>
            <div class="fresh_milk_about">
                <p><h1>Fresh Milk</h1>
                milk,asdda,asdfad <br><b>RS. 100</b></p>
            </div>
        </div>
        <div class="feature">
            <img class="pic" src="<?php echo URLROOT; ?>/img/customer/yourget.png" alt="">
            <div class="fresh_milk_about">
                <p><h1>Yourget</h1>
                milk,asdda,asdfad <br><b>RS. 100</b></p>
            </div>
        </div>
        <div class="feature">
            <img class="pic" src="<?php echo URLROOT; ?>/img/customer/milkbottel.png" alt="">
            <div class="fresh_milk_about">
                <p><h1>Fresh Milk</h1>
                milk,asdda,asdfad <br><b>RS. 100</b></p>
            </div>
        </div>
        <div class="feature">
            <img class="pic" src="<?php echo URLROOT; ?>/img/customer/milkbottel.png" alt="">
            <div class="fresh_milk_about">
                <p><h1>Fresh Milk</h1>
                milk,asdda,asdfad <br><b>RS. 100</b></p>
            </div>
        </div>
        <div class="feature">
            <img class="pic" src="<?php echo URLROOT; ?>/img/customer/milkbottel.png" alt="">
            <div class="fresh_milk_about">
                <p><h1>Fresh Milk</h1>
                milk,asdda,asdfad <br><b>RS. 100</b></p>
            </div>
        </div>
        <div class="feature">
            <img class="pic" src="<?php echo URLROOT; ?>/img/customer/milkbottel.png" alt="">
            <div class="fresh_milk_about">
                <p><h1>Fresh Milk</h1>
                milk,asdda,asdfad <br><b>RS. 100</b></p>
            </div>
        </div>                                              
    </div>
</section> -->

<section>
    <div class="container">
        <?php foreach ($data['productCategory'] as $productCategory) : ?>

        <a href="<?php echo URLROOT?>/Customer/viewProductDetails/<?php echo $productCategory->product_id ?>" class="feature" >
            <div class="img">
                <img src="<?php echo UPLOADS . $productCategory->image ?>" width='200' height='200'>
            </div>
            <div class="cardContent">
                <p><?php echo $productCategory->product_name ?><br>
                <!-- <?php echo $productCategory->price ?> -->
                </p>
            </div>
        </a>

        <?php endforeach; ?>
        
    </div>
</section>

<section class="fresh_milk">
    <div class="container">
        <!-- <div class="milk_bg"><img src="<?php echo URLROOT; ?>/img/customer/man.jpg" alt=""></div> -->
            <div class="feature1">
                <div class="milk_img">
                    <img class="pic_milk" src="<?php echo URLROOT; ?>/img/customer/milkbottel.png" alt="">
                </div>
            </div>
            <div class="feature1">
                <div class="milk_content">
                    <h1>Koratuwa Fresh Milk</h1>
                    We are proud to offer a wide variety of products from our farmstead creamery. We have a unique opportunity to offer two lines of milk, organic and traditional, both bottled separately, at our creamery. Our products are made only with our farm-fresh, rBGH-free milk that we produce on our farms. You’ll taste the Local Difference! <br>

                    Organic Milk <br>
                    Sizes: Gallon | Half Gallon <br>
                    Types: Skim* | 1% | 2% | Whole <br><br>

                    Traditional Milk <br>
                    Sizes: Gallon | Half Gallon | Quarts | Pints <br>
                    Types: Skim | 1% | 2% | Whole | Chocolate | 1% Chocolate <br><br>

                    Lactose Free Milk <br>
                    Sizes: Gallon | Half Gallon <br>
                    Types: 2% | Whole <br><br>

                    Also available <br>
                    Heavy cream* | Half and half* <br>            
                </div>
            </div>            
    </div>
</section>
<section class="yourget">
    <div class="container">
            <div class="feature1">
                <div class="milk_img">
                    <img class="pic_milk" src="<?php echo URLROOT; ?>/img/customer/yourget.png" alt="">
                </div>
            </div>
            <div class="feature1">
                <div class="milk_content">
                    <h1>Koratuwa Yourget</h1><br>
                    We are proud to offer a wide variety of products from our farmstead creamery. We have a unique opportunity to offer two lines of milk, organic and traditional, both bottled separately, at our creamery. Our products are made only with our farm-fresh, rBGH-free milk that we produce on our farms. You’ll taste the Local Difference! <br><br>

                    Organic Milk <br>
                    Sizes: Gallon | Half Gallon <br>
                    Types: Skim* | 1% | 2% | Whole <br><br>

                    Traditional Milk <br>
                    Sizes: Gallon | Half Gallon | Quarts | Pints <br>
                    Types: Skim | 1% | 2% | Whole | Chocolate | 1% Chocolate <br><br>

                    Lactose Free Milk <br>
                    Sizes: Gallon | Half Gallon <br>
                    Types: 2% | Whole <br><br>

                    Also available <br>
                    Heavy cream* | Half and half* <br>            
                </div>
            </div>            
    </div>
</section>
<footer>
        <div class="container">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contacts</a></li>
            </ul>
            <p>&copy; All rights reserved.</p>
        </div>
</footer>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/customer.js"></script>