<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/sup_feedback.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>
<section>
    <div class="wrapper">
    <section class="bg-img"></section>
            <form action="<?php echo URLROOT; ?>/Supplier/sup_feedback" method="POST">
                <h1>Give Your Feedback</h1>
                
                <!-- <div class="id">
                    <input type="text" placeholder="Full name">
                    <i class="far fa-user"></i>
                </div>
                <div class="id">
                    <input type="email" placeholder="Email address" >
                    <i class="far fa-envelope"></i>
                </div> -->
                <div class="id">
                    <textarea name="feedback" id="feedback" cols="30" rows="10" placeholder="Enter your opinion" value="<?php echo $data['feedback']; ?>"></textarea>
                    <!-- <input type="text" name="feedback" id="feedback" class="feedback" autocomplete="off" value="<?php echo $data['feedback']; ?>"> -->
                    <i class="far fa-feedback"></i>
                </div>                
                <!-- <textarea cols="15" rows="5" placeholder="Enter your opinions here..." ></textarea> -->
                <!-- <button>Send</button> -->
                <input type="submit" value="Post" class="postbtn">
            </form>
            
    </div>
</section>
<section>
    <div class="container">
    <?php foreach ($data['supFeedback'] as $supFeedback) : ?>

        <div class="feature">
            <div class="card">
               
                <div class="card-head">
                    <img class="img-user" src="<?php echo URLROOT; ?>/img/users/sasindu.jpg" alt="user">
                    <div class="sup_name">Sasindu Udayanga</div>
                    <div class="sup_date"><?php echo $supFeedback->date ?></div>
                </div>    
                <div class="sup_feedback"><?php echo $supFeedback->feedback ?></div>
            </div>
        </div>

    <?php endforeach; ?>

    </div>
</section>
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/supplier.js"></script>