<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewLivestock.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>


<script src="<?php echo URLROOT; ?>/js/filter.js"></script>

<!-- ______________________________________________________________________________________________________-->

<section>
  <div class="container" style="overflow-x: auto;">
  <!-- <div class="profile-search-area">
      <input type="text" placeholder="Search accounts..." id="searchInput">
  </div> -->
  <div class="table-wrapper">
    <table id="cattle-table">
      <thead>
          <th col-index = 1>Cow Id</th>
          <th col-index = 2>Stall Id
            <select class="table-filter" onchange="filter_rows()">
              <option value="all"></option>
            </select>
          </th>
          <th col-index = 3>Gender
            <select class="table-filter" onchange="filter_rows()">
              <option value="all"></option>
            </select>
          </th>
          <th col-index = 4>Breed
            <select class="table-filter" onchange="filter_rows()">
              <option value="all"></option>
            </select>
          </th>
          <th col-index = 5>Milking Status
            <select class="table-filter" onchange="filter_rows()">
              <option value="all"></option>
            </select>
          </th>
          <th col-index = 6>Age</th>
          <th col-index = 7>Average Milk<br>Per Day</th>
          <th col-index = 8>Action</th>
      </thead>
      <tbody>
        <?php $data_index=0 ?>
        <?php foreach ($data['livestockView'] as $cow) : ?>
        <tr>
          <td><?php echo $cow->cow_id; ?></td>
          <td><?php echo $cow->stall_id; ?></td>
          <td><?php echo $cow->gender; ?></td>
          <td><?php echo $cow->cow_breed; ?></td>
          <td><?php echo $cow->milking_status; ?></td> 
          <td><?php echo $cow->age; ?></td>
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
    
    <script>
      window.onload = () => {
          console.log(document.querySelector("#product_stock-table > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
      };

      getUniqueValuesFromColumn();
    </script>

  </div>
  </div>
</section>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
