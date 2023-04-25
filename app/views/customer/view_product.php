<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/view_product.css">
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>

<section>
    <div class="container">

        <div class="product_img">
        
            <img class="pic_product" src="<?php foreach ($data['productDetails'] as $productCategory) : ?><?php echo UPLOADS . $productCategory->image; ?><?php endforeach; ?>"width='200' height='400'>
            <!-- <img class="pic_product" src="<?php echo UPLOADS . $productCategory->image ?>" width='200' height='200'>     -->
        </div>

        <div class="feature_form">
            <div class="form_container">
                <h1>Product Details</h1>
                
                <form action="<?php echo URLROOT; ?>/Customer/addToCart/<?php echo $data['productDetails'][0]->product_id?>" method="POST">
                    <input type="hidden" name="unit_price" value="<?php echo $data['productDetails'][0]->unit_price?>">
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

                    <div class="quantity-selector">
                      <button  type="button" onclick="decrement()">-</button>
                      <label id="quantityLabel" for="quantityInput">1</label>
                      <input type="hidden" name="quantity" id="quantityInput" value="1" id="quantity"/>
                      <button type="button" onclick="increment()">+</button>  
                    </div>
                    
                    <div class="feature1">
                        <div class="form-input-title">Total Price:</div>
                        <label id="total-price" data-quantity="<?php echo $data['productDetails'][0]->unit_price ?>"><?php echo $data['productDetails'][0]->unit_price ?></label>
                        <input type="hidden" id="totalPrice"/>
                    </div>

                    <!-- <div class="feature1">
                        <input type="button" value="Buy Now" class="buynowBtn" onclick="location.href='<?php echo URLROOT; ?>/Customer/buyNow' ">

                    </div> -->
                    <div class="feature1">
                        <input type="submit" name="add_to_carts" class="AddtoCartBtn" value="Add To Cart">
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