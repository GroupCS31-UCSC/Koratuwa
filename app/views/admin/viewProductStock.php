<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewProductStock.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<div class="container">

    <div class="container1">

    <?php foreach ($data['pStockView'] as $stockV) : ?>

        <!-- search -->
        <input type="text" id="searchInput5" placeholder="Search for Stock IDs..." onkeyup="searchFunc5();">

        <!-- date filter -->
        Filter by Manufactured Date: <br>
        <form action="<?php echo URLROOT; ?>/Admin/viewProductStock/<?php echo $stockV->product_id ?>" method="POST" >
            <label for="from">From :</label>
            <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
            <label for="to">  To :</label>
            <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
            <input type="submit" value="Search" class="submitBtn"> 
        </form>

        <!-- refresh -->
        <input type="button" value="Refresh" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewProductStock/<?php echo $stockV->product_id ?>' ">

    <?php break; ?>    
    <?php endforeach; ?>

        <div class="table-wrapper">
            <table id="stockTable">
                <thead>
                    <th>Stock Id</th>
                    <th>Manufactured<br>Date</th>
                    <th>Expiry<br>Date</th>
                    <th>Quantity</th>
                </thead>
                <tbody>
                    <?php $tot=0 ?>
                    <?php foreach ($data['pStockView'] as $psv) : ?>
                    <tr>
                    <td><?php echo $psv->stock_id; ?></td>
                    <td><?php echo $psv->mfd_date; ?></td>
                    <td><?php echo $psv->exp_date; ?></td>
                    <td><?php echo $psv->quantity; ?></td>
                    <?php $tot = $tot + $psv->quantity ?>
                    </tr><br>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>


    <div class="container2">
            <div class="graph">

            </div>
            
            <div class="tot">
                Total Production : <?php echo $tot; ?>
            </div>
    </div>

</div>










<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
