<?php require APPROOT.'/views/include/header.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/collection_details.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<section></section>

<div class="container" style="overflow-x: auto;">

    <div class="viewBox">
        <!-- <div class="viewBoxHeader">

        <a class="close" href="<?php echo URLROOT; ?>/Milk_Collection_Officer/viewMilkCollection">&times;</a>
        </div> -->
        
        <?php foreach ($data['cView'] as $cView) : ?>
        <h2>Milk Collection ID :<?php echo $data['mcId']; ?> </h2>
        <h3>Collected Date :<?php echo $cView->collected_date; ?></h3>
        <h4>Collected Time :<?php echo $cView->collected_time; ?></h4>
        <h4>Stall ID :<?php echo $cView->stall_id; ?></h4>
        <?php break; ?>
        <?php endforeach; ?>
        
        <table>
            <thead>
            <tr>
                <th> COW ID</th>
                <th> QUANTITY</th>
            </tr>
            </thead>
            <tbody id='newData'>
            <?php foreach ($data['cView'] as $cView) : ?>
            <tr>
            <td><?php echo $cView->cow_id; ?></td>
            <td><?php echo $cView->quantity; ?></td>
            </tr><br>
            <?php endforeach; ?>
            </tbody>

        </table>
        
        
    </div>

    <!-- <div class="viewBox2"> -->
    <table class="tableForm">
        <tbody id="newData2">
        <?php foreach ($data['ordDetails'] as $ord) : ?>
            <tr>
                <td>Supply_Order_Id</td>
                <td><?php echo $ord->supply_order_id; ?></td>
            </tr>
            <tr>
                <td>Supplier_Id</td>
                <td><?php echo $ord->supplier_id; ?></td>
            </tr>
            <tr>
                <td>Supplier_Name</td>
                <td><?php echo '' ?></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><?php echo $ord->quantity; ?></td>
            </tr>
            <tr>
                <td>Unit_Price</td>
                <td><?php echo $ord->unit_price; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?php echo $ord->status; ?></td>
            </tr>
            <!-- <tr>
                <td>Quantity</td>
                <td id="Model_Quantity"><?php echo $ord->quantity; ?></td>
            </tr> -->
            <?php endforeach; ?>
        </tbody>           
    </table>
        
        
    <!-- </div> -->
</div>






    
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>


      