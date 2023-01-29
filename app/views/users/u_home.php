
<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/home.css">
<!--_________________________________________________________________________________________ -->

<div class="bg">
  <div class="navbar">
    <img class="img-logo" src="<?php echo URLROOT; ?>/img/koratuwa.png" alt="logo"></span>
    <div class="topmenu">
      <ul>
        <!-- <li><a href="<?php echo URLROOT; ?>/Users/u_home">Home</a></li> -->
        <li><a href="#section1">Home</a></li>
        <li><a href="#section2">About</a></li>
        <li><a href="#section3">Products</a></li>
        <li><a href="#section4">Contact</a></li>
        <li><a href="<?php echo URLROOT; ?>/Users/login">Login</a></li>
        <li><a href="<?php echo URLROOT; ?>/Users/selection">Register</a></li>
      </ul>
    </div>
    </div>

  <div id="section1">
   <img class="img-bg" src="<?php echo URLROOT; ?>/img/bg-copy.jpg" alt="no"> 
  <h1>WELCOME TO KORATUWA</h1>
  </div>

<div id="section2">

<div class="about">

<img class="img-ab" src="<?php echo URLROOT; ?>/img/about.png" alt="no">
<div class="about-text">
  <h1>About Us</h1>
  <h5><span>Koratuwa</span> Dairy Farm</h5>
  <p>The Koratuwa Dairy Farm was launched with the vision of providing fresh quality dairy products to Sri Lankan consumers and to contribute towards the development of the local dairy industry. 
    Our milk products are produced using quality pure cow’s milk from thr Koratuwa Farm.</p>
    <p>Our  dairy products including Fresh Milk, Flavoured Milk,Yogurt and Cheese are all produced within our  farm.
     The technology used within the farm ensures that our products meet the dairy requirements of the Sri Lankan market while maintaining high standards.</p>
</div>
</div>
</div>

<div id="section3">
<!-- <img class="product-bg" src="<?php echo URLROOT; ?>/img/productbg.jpg" alt="no">  -->
<h1>Our Products</h1>
<div class="gallery">
  <div class="content">
  <img class="img-content" src="<?php echo URLROOT; ?>/img/mi.jpeg" alt="no"> 
  <h3>Fresh Milk</h3>

  <h6></h6>
 <ul>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star"></i></li>
 </ul>
<button class="buy" onclick="location.href='<?php echo URLROOT; ?>/Users/registerCustomer' ">Buy Now</button>
</div>

<div class="content">
  <img class="img-content" src="<?php echo URLROOT; ?>/img/flav.png" alt="no"> 
  <h3>Flavoured Milk</h3>

  <h6></h6>
 <ul>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star"></i></li>
 </ul>
 <button class="buy" onclick="location.href='<?php echo URLROOT; ?>/Users/registerCustomer' ">Buy Now</button>
</div>
<div class="content">
  <img class="img-content" src="<?php echo URLROOT; ?>/img/y.png" alt="no"> 
  <h3>Yoghurt</h3>
  
  <h6></h6>
 <ul>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star"></i></li>
  <li><i class="fa fa-star"></i></li>
 </ul>
 <button class="buy" onclick="location.href='<?php echo URLROOT; ?>/Users/registerCustomer' ">Buy Now</button>
</div>

<div class="content">
  <img class="img-content" src="<?php echo URLROOT; ?>/img/cheese.jpeg" alt="no"> 
  <h3>Cheese</h3>
  
  <h6></h6>
 <ul>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star checked"></i></li>
  <li><i class="fa fa-star"></i></li>
  <li><i class="fa fa-star"></i></li>
 </ul>
 <button class="buy" onclick="location.href='<?php echo URLROOT; ?>/Users/registerCustomer' "  >Buy Now</button>
</div>
</div>
</div>

<div id="section4">
  <div class="title">
  <h1>Contact Us</h1>
  </div>

  <div class="box">
    <!-- form -->
        <div class="contact form">
          <h3>  Send a message</h3>
          <form >
            <div class="formBox">
                <div class="row50">
                  <div class="inputBox">
                    <span>Fist Name</span>
                    <input type="text" placeholder="John">
                  </div>
                  <div class="inputBox">
                    <span>Last Name</span>
                    <input type="text" placeholder="Doe">
                  </div>
                </div>
                <div class="row50">
                  <div class="inputBox">
                    <span>Email</span>
                    <input type="text" placeholder="johndoe@gmail.com">
                  </div>
                  <div class="inputBox">
                    <span>Mobile</span>
                    <input type="text" placeholder="+94770430770">
                  </div>
                </div>
                <div class="row100">
                  <div class="inputBox">
                    <span>Message</span>
                    <textarea name="" id="" cols="30" rows="10" placeholder="Write your message here"></textarea>
                  </div>
                  </div>
                  <div class="row100">
                  <div class="inputBox">
                    <input type="submit" value="Send">
                  </div>
                  </div>
            </div>
          </form>
        </div>
  <!-- info box -->
        <div class="contact info">
          <h3>Contact Info</h3>
          <div class="infoBox">
    <div>
      <span> <i class="fa-solid fa-location-dot"></i></span>
    
        <a href="https://www.google.com/maps/dir//88+Koratuwa+Road,+Anguruwatota/@6.93152,79.84527,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3ae259a7e5f7d0d9:0xdb661fcae3dfaf19!2m2!1d79.9153106!2d6.9315251">No 88, Koratuwa Road, Anguruwatota</a>
      
    </div>

    <div>
      <span> <i class="fa-solid fa-envelope"></i></span>
        <a href="mailto:koratuwa@gmail.com">koratuwa@gmail.com</a>
      
    </div>

    <div>
     <span> <i class="fa-solid fa-phone"></i></span>
        <a href="tel:"+91770673739"> +91 77 067 3739</a>
      
    </div>

    <div>
     <span> <i class="fa-brands fa-facebook-f"></i></span>
        <a href="https://www.facebook.com/koratuwa.dairyfarm"> Koratuwa Facebook</a>
      
    </div>


          </div>

        </div>
  <!-- map -->
        <div class="contact map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d126741.02853873825!2d79.84527000684272!3d6.931519971299209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3ae259a7e5f7d0d9%3A0xdb661fcae3dfaf19!2s88%20Koratuwa%20Road%2C%20Anguruwatota!3m2!1d6.9315251!2d79.9153106!5e0!3m2!1sen!2slk!4v1671284002649!5m2!1sen!2slk"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        </div>
  </div>

</div>





</div>
<?php require APPROOT.'/views/include/footer.php'; ?>
