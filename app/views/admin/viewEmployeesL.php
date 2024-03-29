<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/viewEmployees.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<?php $addEmpFlash = flash('addEmp_flash'); ?>
<?php $updateEmpFlash = flash('updateEmp_flash'); ?>
<?php $dltEmpFlash = flash('dltEmp_flash'); ?>

<?php if($addEmpFlash || $updateEmpFlash || $dltEmpFlash): ?>
  <div class="flash-msg" style="display:block;" >
    <?php echo $addEmpFlash; ?>
    <?php echo $updateEmpFlash; ?>
    <?php echo $dltEmpFlash; ?>
  </div>
<?php endif; ?>

<div class="container" style="overflow-x: auto;">

<div class="mytabs">
  <!-- tab1 -->
  <input type="radio" id="tab1" name="mytabs">
    <label for="tab1">Registered Employees</label>
      <div class="tab"><p>
        <div class="systemUsers">

          <div class="search-section">
              <div class="search-bar">
            
              <form id="searchForm" action="<?php echo URLROOT; ?>/Admin/searchSysEmployees" method="GET">

              <!-- employee details search -->
              <button><i class="fa-solid fa-magnifying-glass"></i></button>
              <select name="status" id="status" value="<?php echo $data['status']; ?>">
              <?php if($data['status']==='currentEmp'):?>
                <option value="currentEmp" selected>Current Employees</option>
              <?php else:?>
                <option value="currentEmp">Current Employees</option>
              <?php endif;?>

              <?php if($data['status']==='pastEmp'):?>
                <option value="pastEmp" selected>Past Employees</option>
              <?php else:?>
                <option value="pastEmp">Past Employees</option>
              <?php endif;?>      
              </select>

              <!-- <div class="main-search"> -->
                  <input type="text" name="search" placeholder="Filter by Employee Name " autocomplete="off" value="<?php echo $data['search'] ?>" >
                  <!-- <input type="text" oninput="return showIcon()" class="searchName" name="search" placeholder="Filter by Employee Name " autocomplete="off" value="<?php echo $data['search'] ?>" > -->
                  <!-- <div class="img"><span class="fa fa-close"></span></div> -->
                  
              <!-- </div> -->

              </form>

              </div>
          </div>
                    

          <section class="table1Section">
            <!-- <div class="container" style="overflow-x: auto;"> -->
              
            <?php foreach ($data['empView'] as $emp) : ?>
            <?php if($emp->existence == 1): ?>
              <section class="table-upperSection">
                <div class="upper">
                  <input type="button" value="Add New Employee" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/addEmployees' ">
                <div>
              </section>

              <table>
                <tr>
                  <!-- <th>Image</th> -->
                  <th>Employee Id</th>
                  <th>Name</th>
                  <th>Employment</th>
                  <!-- <th>NIC</th> -->
                  <th>Contact Number</th>
                  <th>Gender</th>
                  <!-- <th>Email</th> -->
                  <!-- <th>Last Accessed On</th> -->
                  <th>Action</th>
                  <!-- <th>More Details</th> -->
                </tr>

                <?php $data_index=0 ?>
                <?php foreach ($data['empView'] as $emp) : ?>
                <tr>
                  <!-- <td><img src="<?php echo USERS . $emp->image ?>" width='20' height='20'></td> -->
                  <td><?php echo $emp->employee_id; ?></td>
                  <td><?php echo $emp->employee_name; ?></td>
                  <td><?php echo $emp->employment; ?></td>
                  <td><?php echo $emp->contact_number; ?></td>
                  <td><?php echo $emp->gender; ?></td>
                  <!-- <td><?php echo ''; ?></td> -->
                  <td>
                    <div class="table-btns">
                      <a href="<?php echo URLROOT?>/Admin/updateEmployees/<?php echo $emp->employee_id ?>"><button class="updateBtn" title="Update"><i class="fa-regular fa-pen-to-square"></i></button></a>
                      <a href="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->employee_id ?>"><button class="deleteBtn" title="Delete"><i class="fa-regular fa-trash-can"></i></button></a>
                      <a href="#"><button class="viewBtn" onclick="openModel3('<?=$emp->employee_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
                    <!-- <div class="table-btns">
                      <a href="<?php echo URLROOT?>/Users/userProfile/<?php echo $emp->employee_id ?>"><button class="viewBtn" title="View More Details"></button></a>
                    </div> -->
                    </div>

                  <!-- 
                  <form id="EditForm" action="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>">
                  <button class="deleteBtn" onclick="deletion(event)">Delete</button>
                  </form> -->
                  
                  </td>

                </tr><br>
                <?php $data_index++; ?>
                <?php endforeach; ?>

              </table>

            <?php else: ?>
              <table>
                <tr>
                  <th>Name</th>
                  <th>Employment</th>
                  <th>NIC</th>
                  <th>Contact Number</th>
                  <th>Gender</th>
                  <!-- <th>Service Time</th> -->
                  <th>Resigned Date</th>
                  <!-- <th>More Details</th> -->
                </tr>

                <?php $data_index=0 ?>
                <?php foreach ($data['empView'] as $emp) : ?>
                <tr>
                  <td><?php echo $emp->employee_name; ?></td>
                  <td><?php echo $emp->employment; ?></td>
                  <td><?php echo $emp->nic; ?></td>
                  <td><?php echo $emp->contact_number; ?></td>
                  <td><?php echo $emp->gender; ?></td>
                  <!-- <td><?php echo $emp->service_time; ?></td> -->
                  <td><?php echo $emp->removed_date; ?></td>

                </tr><br>
                <?php $data_index++; ?>
                <?php endforeach; ?>
                

              </table>

            <?php endif; ?>
            <?php break; ?>
            <?php endforeach; ?>


                


          </section>

        </div>
      </p>
        <!-- popup view model3 - employee details-->
        <div class="model fade in" id="model3" tabindex="-1">
            <div class="model-dialog">
              <div class="model-content">
                <div class="model-header">
                  <button type="button" class="close" onclick="closeModel3()" ><span aria-hidden="true">×</span></button>
                  <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i>Employee Details</h4>
                </div>
                <div class="model-body">
                  <table class="tableForm">
                    <tbody id="newData3">
                    </tbody>  
                  </table>         
                  <br>
                </div>
              </div>
            </div>
            <div class="modal-footer"></div>
          </div>
      </div>

  <!-- tab2 -->
  <input type="radio" id="tab2" name="mytabs" checked="checked">
      <label for="tab2">Labourers</label>
        <div class="tab"><p>
          <div class="systemUsers">

            <div class="search-section">
                <div class="search-bar">
              
                <form id="searchForm" action="<?php echo URLROOT; ?>/Admin/searchLabours" method="GET">

                <!-- employee details search -->
                <select name="status" id="status" value="<?php echo $data['status']; ?>">
                <?php if($data['status']==='currentLabours'):?>
                  <option value="currentLabours" selected>Current labourers</option>
                <?php else:?>
                  <option value="currentLabours">Current labourers</option>
                <?php endif;?>

                <?php if($data['status']==='pastLabours'):?>
                  <option value="pastLabours" selected>Past labourers</option>
                <?php else:?>
                  <option value="pastLabours">Past labourers</option>
                <?php endif;?>      
                </select>

                <!-- <div class="main-search"> -->
                    <input type="text" name="search" placeholder="Filter by Employee Name " autocomplete="off" value="<?php echo $data['search'] ?>" >
                    <!-- <input type="text" oninput="return showIcon()" class="searchName" name="search" placeholder="Filter by Employee Name " autocomplete="off" value="<?php echo $data['search'] ?>" > -->
                    <!-- <div class="img"><span class="fa fa-close"></span></div> -->
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                <!-- </div> -->

                </form>

                </div>
            </div>
                      

            <section class="table1Section">
              <!-- <div class="container" style="overflow-x: auto;"> -->
                
              <?php $data_index=0 ?>
              <?php foreach ($data['labView'] as $lab) : ?>
              <?php if($lab->existence == 1): ?>
                <section class="table-upperSection">
                  <div class="upper">
                    <input type="button" value="Add New Labour" class="addBtn" onclick="location.href='<?php echo URLROOT; ?>/Admin/addLabours' ">
                  <div>
                </section>
                <table>
                  <tr>
                    <th>Employee Id</th>
                    <th>Name</th>
                    <!-- <th>NIC</th> -->
                    <th>Contact Number</th>
                    <th>Gender</th>
                    <th>Action</th>
                  </tr>

                  <?php foreach ($data['labView'] as $lab) : ?>
                  <tr>
                    <td><?php echo $lab->laborer_id; ?></td>
                    <td><?php echo $lab->name; ?></td>
                    <td><?php echo $lab->contact_number; ?></td>
                    <td><?php echo $lab->gender; ?></td>
                    <td>
                      <div class="table-btns">
                      <a href="<?php echo URLROOT?>/Admin/updateLabours/<?php echo $lab->laborer_id ?>"><button class="updateBtn" title="Update"><i class="fa-regular fa-pen-to-square"></i></button></a>
                      <a href="<?php echo URLROOT?>/Admin/deleteLabours/<?php echo $lab->laborer_id ?>"><button class="deleteBtn" title="Delete"><i class="fa-regular fa-trash-can"></i></button></a>
                      <a href="#"><button class="viewBtn" onclick="openModel4('<?=$lab->laborer_id?>')" id="<?php echo($data_index) ?>"><i class="fas fa-eye"></i></button></a>
                      </div>

                    <!-- 
                    <form id="EditForm" action="<?php echo URLROOT?>/Admin/deleteEmployees/<?php echo $emp->email ?>">
                    <button class="deleteBtn" onclick="deletion(event)">Delete</button>
                    </form> -->
                    
                    </td>

                  </tr><br>
                  <?php $data_index++; ?>
                  <?php endforeach; ?>

                </table>

              <?php else: ?>
                <table>
                  <tr>
                    <th>Name</th>
                    <th>NIC</th>
                    <th>Contact Number</th>
                    <th>Gender</th>
                    <!-- <th>Service Time</th> -->
                    <th>Resigned Date</th>
                    <!-- <th>More Details</th> -->
                  </tr>

                  <?php foreach ($data['labView'] as $lab) : ?>
                  <tr>
                    <td><?php echo $lab->name; ?></td>
                    <td><?php echo $lab->nic; ?></td>
                    <td><?php echo $lab->contact_number; ?></td>
                    <td><?php echo $lab->gender; ?></td>
                    <!-- <td><?php echo $lab->service_time; ?></td> -->
                    <td><?php echo $lab->removed_date; ?></td>

                  </tr><br>
                  <?php endforeach; ?>

                </table>

              <?php endif; ?>
              <?php break; ?>
              <?php endforeach; ?>

            </section>

          </div>
        </p>
          <!-- popup view model4 - labour details-->
          <div class="model fade in" id="model4" tabindex="-1">
              <div class="model-dialog">
                <div class="model-content">
                  <div class="model-header">
                    <button type="button" class="close" onclick="closeModel4()" ><span aria-hidden="true">×</span></button>
                    <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i>Labour Details</h4>
                  </div>
                  <div class="model-body">
                    <table class="tableForm">
                      <tbody id="newData4">
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


</div>


<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>

<script>
  const fm = document.getElementById('msg-flash');
  fm.style.display = 'block';
  setTimeout(function() {
    fm.style.display = 'none';
  }, 1000);
</script>

