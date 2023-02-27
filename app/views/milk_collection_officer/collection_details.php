<?php require APPROOT.'/views/include/header.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/collection_details.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<section></section>

<div class="container" style="overflow-x: auto;">

    <div class="viewBox">
        <div class="viewBoxHeader">

        <a class="close" href="<?php echo URLROOT; ?>/Milk_Collection_Officer/viewMilkCollection">&times;</a>
        </div>
        
        <?php foreach ($data['cView'] as $cView) : ?>
        <h2>Milk Collection ID :<?php echo $data['mcId']; ?> </h2>
        <h3>Collected Date :<?php echo $cView->collected_date; ?></h3>
        <h4>Collected Time :<?php echo $cView->collected_time; ?></h4>
        <h4>Stall ID :<?php echo $cView->stall_id; ?></h4>
        <?php break; ?>
        <?php endforeach; ?>
        
        <?php foreach ($data['cView'] as $cView) : ?>
           cow id: <?php echo $cView->cow_id; ?>
        <?php endforeach; ?>
        
    </div>

</div>

<!-- 
<div class="container2">
    <div class="box">
    

        jjjjj
      Cow ID
      
    </div>
</div> -->


    
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>


      