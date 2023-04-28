<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewSale.css">


<!-- Flash massages -->

<session>
  <div class="container" style="overflow-x: auto;">
    <table>
    <tr>
        <th>Order ID</th>
        <th>Date</th>
        <!-- <th>Time</th> -->
        <th>Status</th>
        <!-- <th>Receiving Method</th> -->
        <th>Payment Method</th>
        <th>Total Payment</th>
        <th>Payment Status</th>
        <th>Receipt ID</th>
        <th>Customer ID</th>
        <th>Action</th>
    </tr>
    <tr>
        <?php foreach ($data ['onlineOrderView'] as $online_order) : ?>
        <td><?php echo $online_order->order_id ?></td>
        <td><?php echo $online_order->ordered_date ?></td>
        <!-- <td><?php echo $online_order->order_time ?></td> -->
        <td><?php echo $online_order->status ?></td>
        <!-- <td><?php echo $online_order->receiving_method ?></td> -->
        <td><?php echo $online_order->payment_method ?></td>
        <td><?php echo $online_order->total_payment ?></td>
        <td><?php echo $online_order->payment_status ?></td>
        <td><?php echo $online_order->receipt_id ?></td>
        <td><?php echo $online_order->customer_id ?></td>
        <td>
            <div class="table-btns">
            <a href="<?php echo URLROOT?>/Cashier/updateSale/<?php echo $online_order->order_id ?>"><button class="updateBtn"><i class="fa-regular fa-pen-to-square"></i></button></a>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
</session>


<?php require APPROOT.'/views/include/footer.php'; ?>
