<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewSale.css">


<!-- Flash massages -->

<input type="button" value="Add Sale" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Cashier/addSale' ">



<table>
  <tr>
    <th>Sale ID</th>
    <th>Product ID</th>
    <th>Prize</th>
    <th>Name</th>
    <th>Contact no</th>
    <th>Action</th>
  </tr>

  
  <tr>
    <td>S1</td>
    <td>P303</td>
    <td>300</td>
    <td>Gunathilaka</td>
    <td>0715667876</td>
    <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT; ?>/Cashier/updateSale"><button class="updateBtn">UPDATE</button></a>
        </div>
    </td>
  </tr><br>

</table>




<?php require APPROOT.'/views/include/footer.php'; ?>
