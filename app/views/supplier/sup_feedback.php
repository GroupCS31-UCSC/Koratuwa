<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/sup_feedback.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>

    <div class="wrapper">
    <section></section>
        <div class="container">
            <form>
                <h1>Give Your Feedback</h1>
                
                <div class="id">
                    <input type="text" placeholder="Full name">
                    <i class="far fa-user"></i>
                </div>
                <div class="id">
                    <input type="email" placeholder="Email address">
                    <i class="far fa-envelope"></i>
                </div>
                <textarea cols="15" rows="5" placeholder="Enter your opinions here..."></textarea>
                <button>Send</button>
            </form>
            
        </div>
    </div>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/supplier.js"></script>