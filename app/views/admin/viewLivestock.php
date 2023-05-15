<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewLivestock.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>

<!-- ______________________________________________________________________________________________________-->
<h2>Cattle</h2>
<section>
  <div class="container" style="overflow-x: auto;">
  <!-- <div class="profile-search-area"> -->
  <div class="search-container">

  <div class="search-icon"><button><i class="fa-solid fa-magnifying-glass"></i></button></div>

  <div class="search-box"><input type="text" id="searchInput" placeholder="Search for Cow IDs..." onkeyup="searchFunc();">
     
   </div> 
   </div> 
  <!-- <input type="button" value="Refresh" class="refreshBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewLivestock' "> -->
  <div class="table-wrapper">
    <table id="detailsTable">
      <thead>
          <th col-index = 1>Cow Id</th>
          <th col-index = 2>
            <select class="table-filter" onchange="filter_rows()">
              <option value="all">Stall Id</option>
            </select>
          </th>
          <th col-index = 3>
            <select class="table-filter" onchange="filter_rows()">
              <option value="all">Gender</option>
            </select>
          </th>
          <th col-index = 4>
            <select class="table-filter" onchange="filter_rows()">
              <option value="all">Breed</option>
            </select>
          </th>
          <th col-index = 5>
            <select class="table-filter" onchange="filter_rows()">
              <option value="all">Milking Status</option>
            </select>
          </th>
          <!-- <th col-index = 6>Age</th> -->
          <!-- <th col-index = 7>Average Milk<br>Per Day</th> -->
          <th col-index = 8>View More</th>
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
          <!-- <td><?php echo $cow->age; ?></td> -->
          <!-- <td><?php echo '' ?></td>  -->
          <td>
            <div class="table-btns">
              <a href="#"><button class="viewBtn" onclick="openModel1('<?=$cow->cow_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
            </div>
         </td>
        </tr>
        <?php $data_index++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- popup view model1 - cattle details-->
    <div class="model fade in" id="model1" tabindex="-1">
      <div class="model-dialog">
        <div class="model-content">
          <div class="model-header">
            <button type="button" class="close" onclick="closeModel1()" ><span aria-hidden="true">×</span></button>
            <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i>Cattle Details</h4>
          </div>
          <div class="model-body">
            <table class="tableForm">
              <tbody id="newData1">
              </tbody>  
            </table>         
            <br>
          </div>
        </div>
      </div>
      <div class="modal-footer"></div>
    </div>
    


  </div>
  </div>
</section>

<section>

  <div class="divContainer">
    <!-- <div class="divContainer1"> -->
      <!-- <section class="graphBox"> -->

        <!-- <div class="box">
          <label><center>Total Cattle</center></label>
          <canvas id="cattleTot"></canvas>
        </div> -->

        <!-- <div id="test" class="box">
          <label><center>Cattle Milk</center></label>
          <canvas id="cattleMilking"></canvas>
        </div> -->

      <!-- </section> -->

    <!-- </div> -->
    <div class="divContainer2">
      <button class="removed" onclick="showOrHide()">Removed Cattle's Details</button>

      <div id="dltTableElement">
        <!-- <input type="button" value="Refresh" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/viewLivestock' "> -->
        <input type="text" id="searchInput2" placeholder="Search for Cow IDs..." onkeyup="searchFunc2();">
          <table id="detailsTable2">
            <thead>
              <th col-index = 1>Cow Id</th>
              <th col-index = 2>
                <select class="table-filter2" onchange="filter_rows2()">
                  <option value="all">Stall Id</option>
                </select>
              </th>
              <th col-index = 3>
                <select class="table-filter2" onchange="filter_rows2()">
                  <option value="all">Gender</option>
                </select>
              </th>
              <th col-index = 4>
                <select class="table-filter2" onchange="filter_rows2()">
                  <option value="all">Reason</option>
                </select>
              </th>
              <th>Removed Date</th>
              <th>View</th>
            </thead>
            <tbody>
              <?php $data_index=0 ?>
              <?php foreach ($data['dltCowview'] as $dltCow) : ?>
                <tr>
                  <td><?php echo $dltCow->cow_id; ?></td>
                  <td><?php echo $dltCow->stall_id; ?></td>
                  <td><?php echo $dltCow->gender; ?></td>
                  <td><?php echo $dltCow->reason; ?></td>
                  <td><?php echo $dltCow->removed_date; ?></td>
                  <td>
                  <div class="table-btns">
                    <a href="#"><button class="viewBtn" onclick="openModel2('<?=$dltCow->cow_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
                  </div>
                  </td>
                </tr>
              <?php $data_index++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
      </div>

    </div>
  </div>


    <!-- popup view model1 - old cattle details-->
    <div class="model fade in" id="model2" tabindex="-1">
      <div class="model-dialog">
        <div class="model-content">
          <div class="model-header">
            <button type="button" class="close" onclick="closeModel2()" ><span aria-hidden="true">×</span></button>
            <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i>Removed Cattle Details</h4>
          </div>
          <div class="model-body">
            <table class="tableForm">
              <tbody id="newData2">
              </tbody>  
            </table>         
            <br>
          </div>
        </div>
      </div>
      <div class="modal-footer"></div>
    </div>

<script>
getUniqueValuesFromColumn2();
const divElement = document.querySelector('#dltTableElement');
let isClicked = true;

let showOrHide = function(){
    if(isClicked){
        divElement.style.display='block';
        isClicked= false;
    }
    else{
        divElement.style.display='none';
        isClicked= true;
    }
    
}
</script>

</section>


<!-- notification view box -->
<div class="notifyBox" id="notifyBox">
  <?php foreach ($data['notifications'] as $notifi) : ?>
    <div class="comment-box">
      <div class="box-top">
        <div class="comment">
          <p><strong><?php echo $notifi->message; ?></strong></p> 
        </div>
        <a href="<?php echo URLROOT?>/Admin/updateNotifyStatus/<?php echo $notifi->notify_id ?>"><button class="" title="Mark As Read"><i class="fa-regular fa-eye"></i></button></a>
      </div>
      <div class="name">
        <span>In<?php echo ' stall1  '; ?>
        On<?php echo $notifi->date; ?> 
        At<?php echo $notifi->time; ?>
        By<?php echo 'emp105'; ?>
        </span>            
      </div>
    </div>
  <?php endforeach; ?>
</div>


<!-- notification -->
<script>
  const noti = document.getElementById('notifyBox');
  let isBellClicked = true;

  let showNoti = function(){
    if(isBellClicked){
      noti.style.display='block';
      isBellClicked= false;
    }
    else{
      noti.style.display='none';
      isBellClicked= true;
    }
  }
</script>

<script>
  getUniqueValuesFromColumn();
</script>






<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>


