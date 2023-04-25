<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/addCattle.css">
<?php $stall=$_GET['Stall']??'STALL1';?>

<div class="form-container">
	<div class="form-header">
		<center><h1>Add Milk collect</h1></center>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Livestock_Manager/addCattleMilking" method="POST" enctype="multipart/form-data
    ">
        <input type="hidden" name="stallId" value="<?php echo $stall;?>">
        <!-- Cow Id -->
        <!-- <div class="form-input-title">COW ID</div>
        <span class="form-invalid"><?php echo $data[0]['cowId_err']; ?></span>
        <label for="Select the Cattle"></label>
        <?php $values = $data[1]?> -->
        


        <table>
            <tr>
                <th>COW ID</th>
                <th>QUANTITY</th>
            </tr>
            <tbody>
            <?php $values = $data[1];
            foreach($values as $cows):
            ?>
            <tr>
                <td>
                <label for="Cattle" value="" name="cowId[]"><?=$cows->cow_id?></label>
                </td>
                <td>
                <!-- <span class="form-invalid"><?php echo $data[0]['quantity_err']; ?></span> -->
                <input type="hidden" name="stall" value="<?php echo $stall;?>">
                <input type="number" id="<?php $cows->cow_id ?>" name="quantity[]" id="vaccinationQuantity" class="quantity" value="<?php echo $data[0]['quantity'];?>" required>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>

        <!-- <div class="form-input-title">COW ID</div>
        <span class="form-invalid"><?php echo $data[0]['cowId_err']; ?></span>
        <label for="Select the Cattle"></label> -->
        <!-- <?php $values = $data[1]?>

        <select name="cowId" id="cowId">
            <?php foreach($values as $cow_id):?>
                <option value="<?=$cow_id->cow_id?>" name="cowId"><?=$cow_id->cow_id?></option>
            <?php endforeach;?>
            
        </select> -->
    
		<br>
		<input type="submit" value="Submit" class="submitBtn">
  </form>
</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
