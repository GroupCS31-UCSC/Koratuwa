<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/financial_manager/reports.css">
<!-- ______________________________________________________________________________________________________-->


<h2>REPORTS</h2>

<div class="filter">

<form>
    <label for="from">From :</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To :</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <div class="form-input-container">
    <div class="form-input-wrapper"><input type="submit" value="Search" class="submitBtn"> </div>
    <div class="form-input-wrapper"><input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/financial_manager/reports' "></div>
    </div>
</form>

</div>


<div class="table1">
<table>
  <h1>Expenses</h1><br>
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
        <td><?php echo $expense->amount; ?></td>
      
    
      </tr>
      <?php endforeach; ?>
    </table>
    </div>

     <div class="table2">

   <table>
  <h1>Revenues</h1><br>
      <tr>
        <th>Sale/Order ID</th>
        <th>Date</th>
        <th>Source of Reveneue</th>
        <th>Amount </th>
       
      </tr>

      <?php foreach ($data['rereportsView'] as $revenue) : ?>
      <tr>
        <td><?php echo $revenue->saleOrder_id; ?></td>
        <td><?php echo $revenue->revenue_date; ?></td>
        <td><?php echo $revenue->source; ?></td>
        <td><?php echo $revenue->amount; ?></td>
         
      
    </td>
    
      </tr>
      <?php endforeach; ?>
    </table>

    </div>


   

     <a href="<?php echo URLROOT?>/financial_Manager/generateFinanceReport/"><button class="pdfBtn">Genarate Report</button></a>
  



<!-- ______________________________________________________________________________________________________-->
<?php require APPROOT.'/views/include/footer.php'; ?>


<script language="javascript">
        var today = new Date();
        // today.setDate(today.getDate() + <?php echo 14?>);
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        console.log(today, dd, mm, yyyy);
        console.log("test");
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        $('#from').attr('max',today);
        $('#to').attr('max',today);

        
    </script>
