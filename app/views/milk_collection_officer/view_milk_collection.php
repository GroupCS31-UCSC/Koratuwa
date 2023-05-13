<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/view_milk_collection.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>

<div class="container" style="overflow-x: auto;">
<section>
</section>

<div class="tableSection">
  <h1>Koratuwa Internal Milk Collection</h1>

  <!-- <form action="<?php echo URLROOT; ?>/Milk_Collection_officer/viewMilkCollection" method="POST" >
    <div class="filter">
      <label for="from">From :</label>
      <input type="date" id="from" name="from" value="<?php echo $data['from']; ?>"><br>
      <label for="to">  To :</label>
      <input type="date" id="to" name="to" value="<?php echo $data['to']; ?>">
      <div class="form-input-container">
      <div class="form-input-wrapper"><input type="submit" value="Search" class="submitBtn"> </div>
    </div>
  </form> -->
  <!-- <div class="form-input-wrapper"><input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Milk_Collection_officer/viewMilkCollection' "></div> -->

  <table id="detailsTable">
    <thead>
      <th col-index = 1>Collection Id</th>
      <th col-index = 2>Collected Date</th>
      <th col-index = 3>Collected Time</th>
      <th col-index = 4>
        <select class="table-filter" onchange="filter_rows()">
            <option value="all">Stall Id</option>
        </select></th>
      <th>Quantity(L)</th>
      <th>View More</th>       
    </thead>
    <tbody>
      <?php $data_index=0 ?>
      <?php foreach ($data['milkView'] as $mc) : ?>
        <tr>
          <td><?php echo $mc->milk_collection_id; ?></td>
          <td><?php echo $mc->collected_date; ?></td>
          <td><?php echo $mc->collected_time; ?></td>
          <td><?php echo $mc->stall_id; ?></td>
          <td><?php echo $mc->quantity; ?></td>
          <td>
          <div class="table-btns">
            <!-- <a href="<?php echo URLROOT?>/Milk_Collection_Officer/collectionDetails/<?php echo $mc->milk_collection_id ?>"><button class="viewBtn">View</button></a> -->
            <a href="#"><button class="viewBtn" onclick="openModel1('<?=$mc->milk_collection_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
          </div>
          </td>
        </tr>
        <?php $data_index++; ?> 
      <?php endforeach; ?>
  </tbody>
  </table>
</div>

<script>
  getUniqueValuesFromColumn();
</script>

<!----------------- popup view ---------------->
<div class="model fade in" id="model" tabindex="-1">
  <div class="model-dialog">
    <div class="model-content">
      <div class="model-header">
        <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
        <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i> Milk Collection Details</h4>
      </div>
      <div class="model-body">
        <table class="tableForm">
            <tbody id="newData">
          </tbody>           
        </table><br>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>
<!-- ---------------------------- -->
    
  
<?php require APPROOT.'/views/include/footer.php'; ?>

