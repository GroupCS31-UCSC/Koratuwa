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
        <td>2022-03-04</td>
        <td>Yogurt 100</td>
        <td>Deliver</td>
        <td>Yayawardana</td>
        <td>
            <div class="table-btns">
                <a href="<?php echo URLROOT; ?>/Cashier/generateInvoice"><button class="updateBtn">Generate Invoice</button></a>
            </div>
        </td>
    </tr>
    <tr>
        <td>S2</td>
        <td>Order2</td>
        <td>2022-03-04</td>
        <td>Milk bottle 200</td>
        <td>Pickup</td>
        <td>Gunathilaka</td>
        <td>Delivered</td>
    </tr>
    <br><br><br><br><br>
  </table>


<?php require APPROOT.'/views/include/footer.php'; ?>
