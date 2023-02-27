<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/financial_manager/viewExpense.css">


<?php flash('addExpense_flash') ?>
<?php flash('updateExpense_flash') ?>
<?php flash('deleteExpense_flash') ?>

<div class="section">
<h2>Expenses</h2>
<img class="img-bg" src="<?php echo URLROOT; ?>/public/img/ex.png" alt="no"> 

</div>

<session>
  <div class="container" >
</form>

    <table>
      <tr>
        <th>Expense ID</th>
        <th>Date</th>
        <th>Description</th>
        <th>Vendor</th>
        <th>Amount </th>
        <th>Action</th>
      </tr>

      <?php foreach ($data['expenseView'] as $expense) : ?>
      <tr>
        <td><?php echo $expense->expense_id; ?></td>
        <td><?php echo $expense->date; ?></td>
        <td><?php echo $expense->description; ?></td>
        <td><?php echo $expense->vendor; ?></td>
        <td><?php echo $expense->amount; ?></td>
        <td>
        <div class="table-btns">
          <!-- <a href="<?php echo URLROOT?>/financial_Manager/updateExpense/"><button class="updateBtn">UPDATE</button></a>
          <a href="<?php echo URLROOT?>/financial_Manager/deleteExpense/"><button class="deleteBtn">DELETE</button></a> -->

          <a href="<?php echo URLROOT?>/financial_Manager/viewExpense/"><button class="viewBtn">View Recipt</button></a>
         
        </div>
    </td>
    <!-- <div class="img">
        <img src="<?php echo UPLOADS . $expense->image ?>" width='200' height='200'>
      </div> -->
      </tr><br>
      <?php endforeach; ?>
    </table>

    <input type="button" value="Add New Expense" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/financial_Manager/addExpense' ">






<?php require APPROOT.'/views/include/footer.php'; ?>
