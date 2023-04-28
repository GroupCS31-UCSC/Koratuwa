<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/financial_manager/viewExpense.css">


<?php flash('addExpense_flash') ?>
<?php flash('updateExpense_flash') ?>
<?php flash('deleteExpense_flash') ?>

<!-- <div class="section">
<h2>Expenses</h2>

</div> -->
<div class="row">
  <div class="column left">
 
  <div class="graphBox">

<div class="box">
  <label><center>Expenses</center></label>
  <canvas id="ch2"></canvas>
</div>



</div>

  </div>

  
  <div class="column right">
  <h2>EXPENSES</h2>
  <input type="button" value="Add Expense" class="paddBtn" onclick="location.href='<?php echo URLROOT; ?>/financial_Manager/addExpense' ">
    <table>
      <tr>
        <th>Expense ID</th>
        <th>Date</th>
        <th>Description</th>
        <!-- <th>Vendor</th> -->
        <th>Amount </th>
        <!-- <th>Action</th> -->
      </tr>

      <?php foreach ($data['expenseView'] as $expense) : ?>
      <tr>
        <td><?php echo $expense->expense_id; ?></td>
        <td><?php echo $expense->date; ?></td>
        <td><?php echo $expense->description; ?></td>
        <!-- <td><?php echo $expense->vendor; ?></td> -->
        <td><?php echo $expense->amount; ?></td>
       
        </div>
    </td>
    
      </tr><br>
      <?php endforeach; ?>
    </table>

   



  
      </div>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/fm.js"></script>
