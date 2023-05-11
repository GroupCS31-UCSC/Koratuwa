<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/financial_manager/fm_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/financial_manager/revenues.css">


<div class="row">
  <div class="column left">

   <h2>REVENUES</h2> 
<br><br>
  <!-- search -->
  <input type="text" id="searchInput2" placeholder="Search By Revenue Type..." onkeyup="searchFunc2();">

  <!-- date filter -->
  <form action="<?php echo URLROOT; ?>/Financial_Manager/viewRevenue" method="POST" >
    <label for="from">From :</label>
    <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
    <label for="to">  To :</label>
    <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
    <input type="submit" value="Search" class="submitBtn"> 
  </form>

  <!-- refresh button -->
  <input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Financial_Manager/viewRevenue' ">

 
  <table id="detailsTable2">
      <thead>
        <th>Revenue ID</th>
        <th>Date</th>
        <th>Source of Reveneue</th>
        <!-- <th>Vendor</th> -->
        <th>Amount </th>
        <!-- <th>Action</th> -->
      </thead>
      <tbody>

      <?php foreach ($data['revenueView'] as $revenue) : ?>
      <tr>
        <td><?php echo $revenue->revenue_id; ?></td>
        <td><?php echo $revenue->date; ?></td>
        <td><?php echo $revenue->source; ?></td>
        <td><?php echo $revenue->amount; ?></td>
    

        </div>
    </td>
    
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>


  </div>

  
  <div class="column right">

    
  <div class="graphBox">

<div class="box">
  <label><center>REVENUES</center></label>
  <canvas id="ch2"></canvas>
</div>



</div>


  
      </div>
</div>


<!-- <div class="row">
  <div class="column left" style="background-color:#aaa;">
    <h2>ONLINE REVENUES</h2>
    <p>Some text..</p>
  </div>
  <div class="column middle" >
    <h2>TOTAL</h2>
   
    <div class="box">
        <label><center>Number of Productions</center></label>
        <canvas id="ch2"></canvas>

        <table>
   
      </tr>

      </div>

  </div>
  <div class="column right" style="background-color:#ccc;">
    <h2>ONSITE REVENUES</h2>
    <p>Some text..</p>
  </div>
</div> -->






<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/fm.js"></script>

