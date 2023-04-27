<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/financial_manager/reports.css">
<!-- ______________________________________________________________________________________________________-->

<div class="filter">

<h2>REPORTS</h2>
<form>
    <label for="from">From :</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To :</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <input type="submit" value="Search" class="submitBtn"> 
</form>

</div>


<div class="table1">
<table>
  <h1>Expenses</h1>
      <tr>
        <th>Expense ID</th>
        <th>Date</th>
        <th>Description</th>
        <th>Amount </th>
      </tr>

      <?php foreach ($data['exreportsView'] as $expense) : ?>
      <tr>
        <td><?php echo $expense->expense_id; ?></td>
        <td><?php echo $expense->date; ?></td>
        <td><?php echo $expense->description; ?></td>
        <!-- <td><?php echo $expense->vendor; ?></td> -->
        <td><?php echo $expense->amount; ?></td>
      
    
      </tr><br>
      <?php endforeach; ?>
    </table>
    </div>

    <!-- <div class="table2">

   - <table>
  <h1>Revenues</h1>
      <tr>
        <th>Revenue ID</th>
        <th>Date</th>
        <th>Source of Revenue</th>
        <th>Amount </th>
       
      </tr>

      <?php foreach ($data['rereportsView'] as $revenue) : ?>
      <tr>
        <td><?php echo $revenue->expense_id; ?></td>
        <td><?php echo $revenue->date; ?></td>
        <td><?php echo $revenue->source; ?></td>
        <td><?php echo $revenue->amount; ?></td>
         
      
    </td>
    
      </tr><br>
      <?php endforeach; ?>
    </table> -->


  

    <!-- <input type="submit" value="Generate PDF" class="pdfBtn">  -->
    


























<!-- ______________________________________________________________________________________________________-->
<?php require APPROOT.'/views/include/footer.php'; ?>