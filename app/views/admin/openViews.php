<?php require APPROOT.'/views/include/header.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/collection_details.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<!-- viewLivestock page- model1 view - cattle details -->
<table class="tableForm">
    <tbody id="newData1">
    <?php foreach ($data['cattle'] as $cattle) : ?>
        <tr>
            <td>Supply_Order_Id</td>
            <td><?php echo $cattle->cow_id; ?></td>
        </tr>
        <tr>
            <td>Supplier_Id</td>
            <td><?php echo $cattle->stall_id; ?></td>
        </tr>
        <tr>
            <td>Supplier_Name</td>
            <td><?php echo '' ?></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><?php echo ''; ?></td>
        </tr>
        <tr>
            <td>Unit_Price</td>
            <td><?php echo '' ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><?php echo ''; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>           
</table>

<!-- viewLivestock page- model2 view - deleted cattle details -->

<table class="tableForm">
    <tbody id="newData2">
    <?php foreach ($data['dltCattle'] as $dltCattle) : ?>
        <tr>
            <td>Supply_Order_Id</td>
            <td><?php echo $dltCattle->cow_id; ?></td>
        </tr>
        <tr>
            <td>Supplier_Id</td>
            <td><?php echo $dltCattle->stall_id; ?></td>
        </tr>
        <tr>
            <td>Supplier_Name</td>
            <td><?php echo 'jfdod' ?></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><?php echo 'eeow'; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>           
</table>

<!-- viewEmployees page- model1 view - current employee details -->

<table class="tableForm">
    <tbody id="newData3">
    <?php foreach ($data['empProfileData'] as $emp) : ?>
        <tr>
            <td>Supply_Order_Id</td>
            <td><?php echo $emp->employee_id; ?></td>
        </tr>
        <tr>
            <td>Supplier_Id</td>
            <td><?php echo $emp->gender; ?></td>
        </tr>
        <tr>
            <td>Supplier_Name</td>
            <td><?php echo 'jfdod' ?></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><?php echo 'eeow'; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>           
</table>



<!-- viewEmployees page- model2 view - labour details -->

<table class="tableForm">
    <tbody id="newData4">
    <?php foreach ($data['labProfileData'] as $lab) : ?>
        <tr>
            <td>Supply_Order_Id</td>
            <td><?php echo $lab->laborer_id; ?></td>
        </tr>
        <tr>
            <td>Supplier_Id</td>
            <td><?php echo $lab->name; ?></td>
        </tr>
        <tr>
            <td>Supplier_Name</td>
            <td><?php echo 'jfdod' ?></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><?php echo 'eeow'; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>           
</table>




<table class="tableForm">
    <tbody id="newData5">
    <?php foreach ($data['sup'] as $sup) : ?>
        <tr>
            <td>Supplier Id</td>
            <td><?php echo $sup->supplier_id; ?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><?php echo $sup->name; ?></td>
        </tr>
        <tr>
            <td>Supplier_Name</td>
            <td><?php echo '' ?></td>
        </tr>
        <tr>
            <td>Quantity</td>
            <td><?php echo ''; ?></td>
        </tr>
        <tr>
            <td>Unit_Price</td>
            <td><?php echo '' ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><?php echo ''; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>           
</table>
    
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>


      