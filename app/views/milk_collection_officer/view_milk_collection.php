<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/view_milk_collection.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<div class="container" style="overflow-x: auto;">
<section>
</section>

<div class="tableSection">
  <h1>Koratuwa Internal Milk Collection</h1>

  <table>
    <tr>
      <th>Collection Id</th>
      <th>Collected Date</th>
      <th>Collected Time</th>
      <th>Stall Id</th>
      <th>Quantity(L)</th>
      <th>More</th>       
    </tr>
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

  </table>
</div>


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
          <thead>
            <tr>
            
            <th>Cow ID</th>
            <th>Quantity</th>
            </tr>
            </thead>
            <tbody id="newData">
            <tr>
              <td id="Model_Cow_Id"></td>
              <td id="Model_Quantity"></td>
            </tr>
          </tbody>           
        </table><br>
      </div>
    </div>
  </div>
  <div class="modal-footer"></div>
</div>
<!-- ---------------------------- -->
    
  
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>
