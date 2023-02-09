<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/customer/buy_now.css">
<?php require APPROOT.'/views/customer/cus_dashboard.php'; ?>
<head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
<section>
<div class="container">
  <div class="title">
      <h2>Deliver to: <?php echo $_SESSION['user_name']; ?></h2>
  </div>
<div class="d-flex">
  <form action="" method="">
    <label>
      <span class="fname">First Name <span class="required">*</span></span>
      <input type="text" name="fname">
    </label>
    <label>
      <span class="lname">Last Name <span class="required">*</span></span>
      <input type="text" name="lname">
    </label>
    <label>
      <span>Company Name (Optional)</span>
      <input type="text" name="cn">
    </label>
    <label>
      <span>Address <span class="required">*</span></span>
      <input type="text" name="houseadd" placeholder="House number and street name" required>
    </label>
    <!-- <label>
      <span>&nbsp;</span>
      <input type="text" name="apartment" placeholder="Apartment, suite, unit etc. (optional)">
    </label> -->
    <label>
      <span>Town / City <span class="required">*</span></span>
      <input type="text" name="city"> 
    </label>
    <label>
      <span>Postcode / ZIP <span class="required">*</span></span>
      <input type="text" name="city"> 
    </label>
    <label>
      <span>Phone <span class="required">*</span></span>
      <input type="tel" name="city"> 
    </label>
    <label>
      <span>Email Address <span class="required">*</span></span>
      <input type="email" name="city"> 
    </label>
  </form>
  <div class="Yorder">
    <table>
      <tr>
        <th colspan="2">Your order</th>
      </tr>
      <tr>
        <td>item total</td>
        <td>RS. 800</td>
      </tr>
      <tr>
        <td>Delivery Fee</td>
        <td>RS. 199</td>
      </tr>
      <tr>
        <td>Total Payment</td>
        <td>RS. 999</td>
      </tr>
    </table><br>
    <div>
      <input type="radio" name="dbt" value="dbt" checked> Direct Bank Transfer
    </div>
    <p>
        Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
    </p>
    <div>
      <input type="radio" name="dbt" value="cd"> Cash on Delivery
    </div>
    <div>
      <input type="radio" name="dbt" value="cd"> Paypal <span>
      <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">
      </span>
    </div>
    <button type="button">Place Order</button>
  </div><!-- Yorder -->
 </div>
</div>
</section>

<?php require APPROOT.'/views/include/footer.php'; ?>
<!-- <script src="<?php echo URLROOT; ?>/js/customer.js"></script> -->