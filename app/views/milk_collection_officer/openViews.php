<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/view_milk_collection.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>
<!-- _________________________________________________________________________
 View milk collections of each cattle -->
<table class="tableForm">
    <tbody id="newData">
        <tr>
            <th>Cow ID</th>
            <th>Quantity (L)</th> 
        </tr>
        <?php foreach ($data['farmCollectionView'] as $Cattle_milking) : ?>
        <tr>          
            <td><?php echo $Cattle_milking->cow_id; ?></td> 
            <td><?php echo $Cattle_milking->quantity; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php require APPROOT.'/views/include/footer.php'; ?>