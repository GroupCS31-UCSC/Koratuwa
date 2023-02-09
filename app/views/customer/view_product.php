<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/view_product.css">
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<section>
    <div class="container">
        <div class="feature">
            <div class="product_img">
                <img class="pic_product" src="<?php echo URLROOT; ?>/img/customer/yourget.png">
                <!-- <img src="<?php echo UPLOADS . $data['productDetails']->image ?>"> -->
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
                        <!-- <input type="button" value="Buy Now" class="buynowBtn" onclick=""> -->
                        <input type="button" value="Buy Now" class="buynowBtn" onclick="location.href='<?php echo URLROOT; ?>/Customer/buyNow' ">

                    </div>
                    <div class="feature1">
                        <!-- <input type="button" value="Add to Cart" class="AddtoCartBtn" onclick=""> -->
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