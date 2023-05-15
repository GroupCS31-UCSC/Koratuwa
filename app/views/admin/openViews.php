<?php require APPROOT.'/views/include/header.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/collection_details.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/modelViews.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<!-- viewLivestock page- model1 view - cattle details -->
<table class="tableForm">
    <tbody id="newData1">
    <?php foreach ($data['cattle'] as $cattle) : ?>
        <tr>
            <td>Cow Id</td>
            <td><?php echo $cattle->cow_id; ?></td>
        </tr>
        <tr>
            <td>Stall Id</td>
            <td><?php echo $cattle->stall_id; ?></td>
        </tr>
        <tr>
            <td>DOB</td>
            <td><?php echo $cattle->dob; ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $cattle->gender; ?></td>
        </tr>
        <tr>
            <td>Breed</td>
            <td><?php echo $cattle->cow_breed; ?></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><?php echo $cattle->age; ?></td>
        </tr>
        <tr>
            <td>Milking Status</td>
            <td><?php echo $cattle->milking_status; ?></td>
        </tr>
        <tr>
            <td>Registered Method</td>
            <td><?php echo $cattle->reg_method; ?></td>
        </tr>
        <tr>
            <td>Registered Date</td>
            <td><?php echo $cattle->reg_date;?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>           
</table>

<!-- viewLivestock page- model2 view - deleted cattle details -->

<table class="tableForm">
    <tbody id="newData2">
    <?php foreach ($data['dltCattle'] as $dltCattle) : ?>
        <tr>
            <td>Cow Id</td>
            <td><?php echo $dltCattle->cow_id; ?></td>
        </tr>
        <tr>
            <td>Stall Id</td>
            <td><?php echo $dltCattle->stall_id; ?></td>
        </tr>
        <tr>
            <td>Removed Date</td>
            <td><?php echo $dltCattle->removed_date; ?></td>
        </tr>
        <tr>
            <td>Reason to Remove</td>
            <td><?php echo $dltCattle->reason; ?></td>
        </tr>
        <tr>
            <td>If Sold; price </td>
            <td><?php echo $dltCattle->sold_price;?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>           
</table>

<!-- viewEmployees page- model1 view - current employee details -->

<table class="tableForm">
    <tbody id="newData3">
    <?php foreach ($data['empProfileData'] as $emp) : ?>
        <tr>
            <td>Employee Id</td>
            <td><?php echo $emp->employee_id; ?></td>
        </tr>
        <tr>
            <td>Employee Name</td>
            <td><?php echo $emp->employee_name; ?></td>
        </tr>
        <tr>
            <td>NIC</td>
            <td><?php echo $emp->nic; ?></td>
        </tr>
        <tr>
            <td>Contact Number</td>
            <td><?php echo $emp->contact_number; ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $emp->gender; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $emp->address; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>           
</table>



<!-- viewEmployees page- model2 view - labour details -->

<table class="tableForm">
    <tbody id="newData4">
    <?php foreach ($data['labProfileData'] as $lab) : ?>
        <tr>
            <td>Labourer Id</td>
            <td><?php echo $lab->laborer_id; ?></td>
        </tr>
        <tr>
            <td>Labourer Name</td>
            <td><?php echo $lab->name; ?></td>
        </tr>
        <tr>
            <td>NIC</td>
            <td><?php echo $lab->nic; ?></td>
        </tr>
        <tr>
            <td>Contact Number</td>
            <td><?php echo $lab->contact_number; ?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $lab->gender; ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo $lab->address; ?></td>
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


      