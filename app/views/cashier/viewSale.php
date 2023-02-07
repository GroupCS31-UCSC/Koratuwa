<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewSale.css">


<!-- Flash massages -->

<session>
  <div class="container" style="overflow-x: auto;">
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
    </tr>
    <tr>
      <td>S2</td>
      <td>P303</td>
      <td>300</td>
      <td>Yayawardana</td>
      <td>0714345654</td>
      <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT; ?>/Cashier/updateSale"><button class="updateBtn">UPDATE</button></a>
        </div>
      </td>
    </tr>
    <br><br><br><br><br>
  </table>

  <input type="button" value="Add Sale" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Cashier/addSale' ">


<?php require APPROOT.'/views/include/footer.php'; ?>
