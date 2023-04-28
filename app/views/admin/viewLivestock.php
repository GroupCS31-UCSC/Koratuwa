<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewLivestock.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<section>
  <div class="container" style="overflow-x: auto;">
  <!-- <div class="profile-search-area">
      <input type="text" placeholder="Search accounts..." id="searchInput">
  </div> -->
    <table class="cattle-table" id="cattle-table">
      <thead>
        <tr>
          <th>Cow Id</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Breed</th>
          <th>Milking Status</th>
          <th>Average Milk<br>Per Day</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $data_index=0 ?>
        <?php foreach ($data['livestockView'] as $cow) : ?>
        <tr>
          <td><?php echo $cow->cow_id; ?></td>
          <td><?php echo $cow->age; ?></td>
          <td><?php echo $cow->gender; ?></td>
          <td><?php echo $cow->cow_breed; ?></td>
          <td><?php echo $cow->milking_status; ?></td> 
          <td><?php echo '' ?></td> 
          <td>
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel('<?=$cow->cow_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
            </div>
          
          </td>
        </tr><br>
        <?php $data_index++; ?>
        <?php endforeach; ?>
      </tbody>

  </table>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
