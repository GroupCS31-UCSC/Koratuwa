<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/view_product.css">
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<section>
    <div class="container">
        <div class="feature">
            <div class="product_img">
            
                <img class="pic_product" src="<?php foreach ($data['productDetails'] as $productCategory) : ?><?php echo UPLOADS . $productCategory->image; ?><?php endforeach; ?>"width='200' height='400'>
                <!-- <img class="pic_product" src="<?php echo UPLOADS . $productCategory->image ?>" width='200' height='200'>     -->
            </div>
        </div>
        <div class="feature_form">
            <div class="form_container">
                <h1>Product Details</h1>
                <form action="<?php echo URLROOT; ?>/Customer/buyNow" method="POST">

                    <div class="feature1">
                        <div class="form-input-title">Product Name:</div>
                        <label><?php foreach ($data['productDetails'] as $product) : ?><?php echo $product->product_name; ?><?php endforeach; ?></label>
                    </div>
                    <div class="feature1">
                        <div class="form-input-title">Price:</div>
                        <label>RS. <?php foreach ($data['productDetails'] as $product) : ?><?php echo $product->unit_price; ?><?php endforeach; ?></label>
                    </div>
                    <div class="feature1">
                        <div class="form-input-title">Ingreadients:</div>
                        <label><?php foreach ($data['productDetails'] as $product) : ?><?php echo $product->ingredients; ?><?php endforeach; ?></label>
                    </div>
                    <!-- <div class="feature1">
                        <div class="form-input-title">Quantity</div>
                        <div class="quantity">
                            <span class="minus">-</span>
                            <span class="num"></span>
                            <span class="plus">+</span>
                        </div>
                    </div> -->
                    <div class="feature1">
                        <div class="form-input-title">Enter quantity:</div>
                        <input type="text" name="quantity" id="quantity" class="quantity" value="<?php echo $data['quantity']; ?>">
                    </div>
                    <div class="feature1">
                        <div class="form-input-title">Total Price:</div>
                        <label><?php foreach ($data['productDetails'] as $product) : ?><?php echo $product->unit_price * 2 ; ?><?php endforeach; ?></label>
                    </div>
                    <div class="feature1">
                        <input type="button" value="Buy Now" class="buynowBtn" onclick="location.href='<?php echo URLROOT; ?>/Customer/buyNow' ">

                    </div>
                    <div class="feature1">
                        <input type="button" value="Add to Cart" class="AddtoCartBtn" onclick="location.href='<?php echo URLROOT; ?>/Customer/addToCart' ">
                    </div>                                                             
                </form>
            </div>
        </div>
    </div>
</section>
<section id="section2">

        <div id="feedback-main">
            <div id="feedback-div">
                <form action="contact.php" method="post" class="form" id="feedback-form1" name="form1" enctype="multipart/form-data">

                <p class="name">
                    <input name="name" type="name" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" required placeholder="Name" id="feedback-name" />
                </p>

                <p class="email">
                    <input name="email" type="email" class="validate[required,custom[email]] feedback-input" id="feedback-email" placeholder="Email" required />
                </p>

                <p class="text">
                    <textarea name="comment" type="comment" class="validate[required,length[6,300]] feedback-input" id="feedback-comment" required placeholder="Hey, I really love the site but I believe that you could incorporate some ..... and also get rid of the ...... on the section."></textarea>
                </p>

                <div class="feedback-submit">
                    <input type="submit" value="SEND" id="feedback-button-blue" />
                    <div class="feedback-ease"></div>
                </div>
                </form>
            </div>
        </div>
            <a href="#section2"><button id="popup" class="feedback-button" onclick="toggle_visibility()">Feedback</button></a>
                    

</section>
          
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/customer.js"></script>