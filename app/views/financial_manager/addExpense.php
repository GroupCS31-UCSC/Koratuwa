<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/financial_manager/addExpense.css">
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->

<!-- <div class="row">
  <div class="column left">
 
  <div class="graphBox">

<div class="box">
  <label><center>Expenses</center></label>
  <canvas id="ch2"></canvas>
</div>



</div>

  </div>
  <div class="column right"> -->
  <div class="form-container">

<div class="form-header">
  <center><h1>Add Expense</h1></center>
</div>
<br>

<form action="<?php echo URLROOT; ?>/Financial_Manager/addExpense" method="POST" enctype="multipart/form-data"> 

  
<div class="form-input-title">Date</div>
  <span class="form-invalid"><?php echo $data['dat_err']; ?></span>
<input type="date" name="dat" id="dat" class="dat" value="<?php echo $data['dat']; ?>">


  <div class="form-input-title">Description</div>
  <span class="form-invalid"><?php echo $data['des_err']; ?></span>
  <select class="des" name="des" id="des" value="<?php echo $data['des']; ?>">
      <option value="Select">Select</option>
      <option value="Production Cost">Production Cost</option>
      <option value="Transportation Cost">Transportation Cost</option>
      <option value="Livestock Management Cost">Livestock Management Cost</option>
      <option value="Employee Management Cost">Employee Management Cost</option>
      <option value="Utility Cost">Utility Cost</option>
      <!-- <option value="Other">Other</option> -->
    </select>

     <!-- If select other
     <div id="other-input" style="display:none;">
    <label for="other">Other:</label>
    <input type="text" name="other" id="other" class="other" value="">
    </div> -->

  <div class="form-input-title">Amount</div>
  <span class="form-invalid"><?php echo $data['amo_err']; ?></span>
  <input type="number" name="amo" id="amo" class="amo" value="<?php echo $data['amo']; ?>">


  <!-- <div class="form-input-title">Recipt</div>
  <span class="form-invalid"><?php echo $data['image_err']; ?></span>
  <input type="file" name="image" id="image" class="image" value="<?php echo $data['image']; ?>"><br> --> 



   <br>
  <input type="submit" value="Submit" class="submitBtn"> 


</form>
</div>
    
 



<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/fm.js"></script>

<script>
var desSelect = document.getElementById('des');
var otherInput = document.getElementById('other-input');


desSelect.addEventListener('change', function() {

  if (desSelect.value == 'Other') {
    otherInput.style.display = 'block';
  } else {
    otherInput.style.display = 'none';
  }
});

</script>

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
        $('#dat').attr('max',today);
        // $('#to').attr('max',today);

        
    </script>