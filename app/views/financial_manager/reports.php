<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/financial_manager/reports.css">
<!-- ______________________________________________________________________________________________________-->



<h2>REPORTS</h2>
<form>
    <label for="from">From:</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>">
    <label for="to">To:</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <input type="submit" value="Refresh" class="submitBtn"> 
</form>
    <table>
      <tr>
        <th>Expense ID</th>
        <th>Date</th>
        <th>Description</th>
        <!-- <th>Vendor</th> -->
        <th>Amount </th>
        <!-- <th>Action</th> -->
      </tr>

      <?php foreach ($data['reportsView'] as $expense) : ?>
      <tr>
        <td><?php echo $expense->expense_id; ?></td>
        <td><?php echo $expense->date; ?></td>
        <td><?php echo $expense->description; ?></td>
        <!-- <td><?php echo $expense->vendor; ?></td> -->
        <td><?php echo $expense->amount; ?></td>
         <!--<td>
      <a href="<?php echo URLROOT?>/Financial_Manager/updateExpense/<?php ?>"><button class="updateBtn" title="Update"><i class="fa-regular fa-pen-to-square"></i></button></a>
      <a href="<?php echo URLROOT?>/Financial_Manager/deleteExpense/<?php ?>"><button class="deleteBtn" title="Delete"><i class="fa-regular fa-trash-can"></i></button></a> -->
        <div class="table-btns">
          <!-- <a href="<?php echo URLROOT?>/financial_Manager/updateExpense/"><button class="updateBtn">UPDATE</button></a>
          <a href="<?php echo URLROOT?>/financial_Manager/deleteExpense/"><button class="deleteBtn">DELETE</button></a> -->

         
        </div>
    </td>
    
      </tr><br>
      <?php endforeach; ?>
    </table>





























<!-- ______________________________________________________________________________________________________-->
<?php require APPROOT.'/views/include/footer.php'; ?>