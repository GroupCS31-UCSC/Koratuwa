<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/view_suppliers.css">
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->


<section></section>
  
  <div class="container" style="overflow-x: auto;">
  <h1>Koratuwa Milk Suppliers</h1>
  <div class="search-box"><input type="text" id="searchInput" placeholder="Search for Suppliers..." onkeyup="searchFunc();"></div>
  <div class="table-wrapper1">
  <table id="detailsTable">
    <thead>
      <th>Supplier Id</th>
      <th>Name</th>
      <!-- <th>Nic</th> -->
      <th>Contact Number</th>
      <th>Address</th>
      <!-- <th>Email</th> -->
    </thead>
    <tbody>
    <?php foreach ($data['supView'] as $supView) : ?>
    <tr>
      <td><?php echo $supView->supplier_id; ?></td>
      <td><?php echo $supView->name; ?></td>
      <td><?php echo $supView->contact_number; ?></td>
      <td><?php echo $supView->address; ?></td>
      <!-- <td><?php echo $supView->email; ?></td> -->
    </tr><br>
    <?php endforeach; ?>
    </tbody>
  </table>
  </div>
  </div>
 
  <script>
  //search for table 1-------------------------------------------------------------------------------------------------------------

//search bar
function searchFunc(){
    //declare variables
    var input,filter,table,tr,td,i,textValue;

    input = document.getElementById("searchInput");

    // to search case-sensitive
    filter = input.value.toUpperCase();
    table = document.getElementById("detailsTable");

    tr = table.getElementsByTagName("tr");

    //loop through all table rows and hide those don't match the search
    for(i=0; i < tr.length; i++){
        td=tr[i].getElementsByTagName("td")[0];
        if(td){
            textValue = td.textContent || td.innerText;

            if(textValue.toUpperCase().indexOf(filter) > -1)
            {
                tr[i].style.display = "";
            }
            else{
                tr[i].style.display = "none";
            }
        }
    }
}


</script>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/mco.js"></script>
