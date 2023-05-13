<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/cus_home.css">
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<!-- <section class="description">
    <div class="hero-wrapper">
        <div class="hero-content">
            <div class="hero-grid">
                <div class="hero-text">
                    <small>Discover Your test</small>
                    <h1>Welcome to Our <br> Dairy Farm</h1>
                    <p>The Koratuwa Dairy Farm was launched with the vision of providing fresh quality dairy products to Sri Lankan consumers and to contribute towards the development of the local dairy industry. Our milk products are produced using quality pure cow’s milk from thr Koratuwa Farm.</p>

                </div>
                <div class="hero-img">
                  <img src="<?php echo URLROOT; ?>/img/customer/hero.jpg" width="100%" alt="">  
                </div>
                <div class="hero-social">
                    <div class="social-block">
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                    <div class="social-block">
                        <i class="fa-brands fa-instagram"></i>
                    </div>
                    <div class="social-block">
                        <i class="fa-brands fa-twitter"></i>
                    </div>
                    <div class="social-block">
                        <i class="fa-brands fa-google"></i>
                    </div>                                                            

                </div>
            </div>
        </div>
        <main>
            <div class="slider">
                <div class="single-slide">
                    <div class="slide">
                        <div class="slide-img"><img src="<?php echo URLROOT; ?>/img/customer/hero.jpg" alt=""></div>
                        <div class="slide-info">
                            <div class="slide-info-head">
                                <h3>02</h3> <div class="center-line"></div>
                            </div>
                            <div class="slide-text">
                                <p>The Koratuwa Dairy Farm was launched with the vision of providing fresh quality dairy products to Sri Lankan consumers and to contribute towards the development of the local dairy industry.</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</section> -->
<section class="product_cat">
<!-- <img class="bg-img1" src="<?php echo URLROOT; ?>/img/customer/hero.jpg" alt=""> -->
    <div class="container">
        <?php foreach ($data['productCategory'] as $productCategory) : ?>

        <!-- <a href="<?php echo URLROOT?>/Customer/viewProductDetails/<?php echo $productCategory->product_id ?>" class="feature" > -->
            <div class="cardContent">
                <h1><div class="product_name"><?php echo $productCategory->product_name ?></div></h1>
                <div class="img">
                    <a href="<?php echo URLROOT?>/Customer/viewProductDetails/<?php echo $productCategory->product_id ?>" class="feature" >
                    <img src="<?php echo UPLOADS . $productCategory->image ?>" width='200px' height='250px'></a>
                </div>
            
                <br>
                <div class="product_price">Rs. <?php echo $productCategory->unit_price ?></div>
                
                <input type="button" value="Add to Cart" class="AddtoCartBtn">
            </div>
        
       
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
<!-- <footer>
        <div class="container">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contacts</a></li>
            </ul>
            <p>&copy; All rights reserved.</p>
        </div>
</footer> -->

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/customer.js"></script>