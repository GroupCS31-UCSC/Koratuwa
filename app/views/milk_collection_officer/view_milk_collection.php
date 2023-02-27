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
      
  <?php foreach ($data['milkView'] as $mc) : ?>
    <tr>
      <td><?php echo $mc->milk_collection_id; ?></td>
      <td><?php echo $mc->collected_date; ?></td>
      <td><?php echo $mc->collected_time; ?></td>
      <td><?php echo $mc->stall_id; ?></td>
      <td><?php echo $mc->quantity; ?></td>
      <td>
      <div class="table-btns">
        <a href="<?php echo URLROOT?>/Milk_Collection_Officer/collectionDetails/<?php echo $mc->milk_collection_id ?>"><button class="viewBtn">View</button></a>
      </div>
      <!------------ set price popup window ---------------->
    <div id="popup1" class="overlay">
    <div class="popup">
      <h2>collection details</h2>
      <a class="close" href="#">&times;</a>
      <div class="content">
      <?php foreach ($data['cView'] as $cView) : ?>
      Cow ID<?php echo $cView->cow_id; ?>
      <?php endforeach; ?>
      
        
      </div>
    </div>
  </div>
  <!------------------------------------------------------>
      
      </td>
    </tr>
  <?php endforeach; ?>

  </table>
</div>


    
  
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>
