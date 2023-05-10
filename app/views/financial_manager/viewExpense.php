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

<?php 
    // print_r($data['expenseChart']);
    $propertyNames = array_keys(get_object_vars($data['expenseChart'][1]));
    print_r( $data['expenseChart'][1]);   
    print_r($data['expenseChart'][1]->{$propertyNames[0]}); //8000
    echo "<br>";
    // print_r($data['expenseChart'][0][$propertyNames[0]]);
    ?>


</div>

  </div> 

  
  
  <div class="column right">
  <h2>EXPENSES</h2>
<br><br>


  <!-- search -->
  <input type="text" id="searchInput" placeholder="Search By Expense Type..." onkeyup="searchFunc();">

  <!-- date filter -->
  <form action="<?php echo URLROOT; ?>/Financial_Manager/viewExpense" method="POST" >
    <label for="from">From :</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To :</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <input type="submit" value="Search" class="submitBtn"> 
  </form>

  <!-- refresh button -->
  <input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Financial_Manager/viewExpense' ">

  <input type="button" value="Add Expense" class="paddBtn" onclick="location.href='<?php echo URLROOT; ?>/financial_Manager/addExpense' ">    
    <table id="detailsTable">
      <thead>
        <th>Expense ID</th>
        <th>Date</th>
        <th>Description</th>
        <!-- <th>Vendor</th> -->
        <th>Amount </th>
        <!-- <th>Action</th> -->
      </thead>
      <tbody>
      <?php foreach ($data['expenseView'] as $expense) : ?>
      <tr>
        <td><?php echo $expense->expense_id; ?></td>
        <td><?php echo $expense->date; ?></td>
        <td><?php echo $expense->description; ?></td>
        <!-- <td><?php echo $expense->vendor; ?></td> -->
        <td><?php echo $expense->amount; ?></td>   
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>

   



  
      </div>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/fm.js"></script>
