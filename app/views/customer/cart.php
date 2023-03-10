<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/add_to_cart.css">
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
<br>
<br>
<br>
<br>
<br>
<?php
$subtotal = 0;

if(isset($data['products']) && !empty($data['products'])){
    foreach($data['products'] as $product){
        $subtotal += $product->total_price;
        ?>
        <div>
            <h3><?php echo $product->product_name?></h3>
            <h3><?php echo $product->total_price?></h3>
            <h3><?php echo $product->quantity?></h3>
            <img src="<?php echo UPLOADS . $product->image?>" width="100">
        </div>
        
        <?php
    }
    ?>
    <br>
    <br>
            <h3><?php echo $subtotal?></h3>
            <!-- checkout button -->
    <?php
}else {
    ?>
    <div>
        <h1>Empty Cart</h1>
    </div>
    <?php
}

?>




<?php require APPROOT.'/views/include/footer.php'; ?>
<!-- <script src="<?php echo URLROOT; ?>/js/customer.js"></script> -->
