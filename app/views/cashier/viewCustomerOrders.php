<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewSale.css">


<!-- Flash massages -->

<session>
  <div class="container" style="overflow-x: auto;">
    <table>
    <tr>
        <th>Sale ID</th>
        <th>Order ID</th>
        <th>Date</th>
        <th>Status</th>
        <th>Receiving Method</th>
        <th>Customer Name</th>
        <th>Action</th>
    </tr>
  
    <tr>
        <td>S1</td>
        <td>Order1</td>
        <td>2023-02-10</td>
        <td>Pending</td>
        <td>Deliver</td>
        <td>Yayawardana</td>
        <td>
            <div class="table-btns">
                <a href="<?php echo URLROOT; ?>/Cashier/updateOrderStatus"><button class="updateBtn">UPDATE</button></a>
                <a href="<?php echo URLROOT; ?>/Cashier/generateReceipt"><button class="deleteBtn">Generate receipt</button></a>
            </div>
        </td>
    </tr>
    <tr>
        <td>S2</td>
        <td>Order2</td>
        <td>2023-02-10</td>
        <td>Processing</td>
        <td>Pickup</td>
        <td>Gunathilaka</td>
        <td>
            <div class="table-btns">
                <a href="<?php echo URLROOT; ?>/Cashier/updateOrderStatus"><button class="updateBtn">UPDATE</button></a>
                <a href="<?php echo URLROOT; ?>/Cashier/generateReceipt"><button class="deleteBtn">Generate receipt</button></a>
            </div>
        </td>
    </tr>
    <tr>
        <td>S3</td>
        <td>Order3</td>
        <td>2023-02-08</td>
        <td>Delivered</td>
        <td>Deliver</td>
        <td>Yayawardana</td>
        <td>
            <div class="table-btns">
                <a href="<?php echo URLROOT; ?>/Cashier/updateOrderStatus"><button class="updateBtn">UPDATE</button></a>
                <a href="<?php echo URLROOT; ?>/Cashier/generateReceipt"><button class="deleteBtn">Generate receipt</button></a>
            </div>
        </td>
    </tr>
    <br><br><br><br><br>
  </table>


<?php require APPROOT.'/views/include/footer.php'; ?>
