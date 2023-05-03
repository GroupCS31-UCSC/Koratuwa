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
                            <!-- <?php echo $product->timestamp ?> -->
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
                    <input type="button" value="Buy Now" class="buynowBtn"  onclick="paymentGateway()">
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

<script src="<?php echo URLROOT ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

<script>
        function paymentGateway(){
        // var bookingType = type;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = ()=>{
            if(xhttp.readyState == 4){ 
                
                let obj=JSON.parse(xhttp.responseText);
                console.log(obj);
                // Payment completed. It can be a successful failure.
                

                // Put the payment variables here
                var payment = {
                    "sandbox": true,
                    "merchant_id": "1223042",    // Replace your Merchant ID
                    "return_url": "<?= URLROOT?>Customer/customerHome",     // Important
                    "cancel_url": "<?= URLROOT?>/Customer/cart",     // Important
                    "notify_url": "http://sample.com/notify",
                    "order_id": obj['order_id'], 
                    "items": "Payment from <?= $_SESSION['user_id']?>", //Add Name
                    "amount": obj["amount"],
                    "currency": obj["currency"],
                    "hash": obj["hash"], // *Replace with generated hash retrieved from backend
                    "first_name": obj["first_names"],
                    "last_name": obj["last_name"],
                    "email": obj["email"],
                    "phone": obj["phone"],
                    "address": obj["address"],
                    "city": obj["city"],
                    "country": "Sri Lanka",
                    "delivery_address": "No. 46, Galle road, Kalutara South",
                    "delivery_city": "Kalutara",
                    "delivery_country": "Sri Lanka",
                    "custom_1": "",
                    "custom_2": ""
                };

                payhere.startPayment(payment);
            }
        };
        xhttp.open("GET","<?=URLROOT?>/Customer/paymentDetails/"+<?= $subtotal?>,true);
        xhttp.send();
    }

    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        
        placeOrder(<?= $subtotal?>,'http://localhost/koratuwa');
        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    function placeOrder(payment,purl){
        console.log(purl);
        // ajax request liyala back end controller ekata data yawanna
        $.ajax({
                    type: "POST",
                    url: purl+"/Customer/onlineOrd",
                    data: {
                        amount: payment
                    },
                    dataType: "JSON",
                    success: function(response) {
                        // alert('<?= URLROOT ?> / CustomerLocker / viewLockerArticle / ' + response);

                        if(response){
                            //traveler's booking dashboard
                            window.location = '<?= URLROOT ?>/Pages/home';
                        }
                        
                        
                    },
                    error:function () {
                        alert("Wada naaa");
                    }

                });
        // let xhr=new XMLHttpRequest();
        // xhr.open("POST","http://localhost/koratuwa/Customer/onlineOrd",true);
        // xhr.onload=()=>{
        // if (xhr.readyState===XMLHttpRequest.DONE) {
        //     if (xhr.status===200) {
        //         console.log("HI");
        //     }
        // }
        
        // }
        // let amount="amount="+payment
        // xhr.send(amount);

    }
</script>

<?php require APPROOT.'/views/include/footer.php'; ?>
<!-- <script src="<?php echo URLROOT; ?>/js/customer.js"></script> -->
