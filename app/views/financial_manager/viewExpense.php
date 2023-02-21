<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/financial_manager/viewExpense.css">


<?php flash('addExpense_flash') ?>
<?php flash('updateExpense_flash') ?>
<?php flash('deleteExpense_flash') ?>



<session>
  <div class="container" style="overflow-x: auto;">
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
          <a href="<?php echo URLROOT?>/financial_Manager/updateExpense/"><button class="updateBtn">UPDATE</button></a>
          <a href="<?php echo URLROOT?>/financial_Manager/deleteExpense/"><button class="deleteBtn">DELETE</button></a>
        </div>
    </td>
        
      </tr><br>
      <?php endforeach; ?>
    </table>

    <input type="button" value="Add New Expense" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/financial_Manager/addExpense' ">






<?php require APPROOT.'/views/include/footer.php'; ?>
