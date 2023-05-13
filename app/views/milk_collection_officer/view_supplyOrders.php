<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/milk_collection_officer/mco_dashboard.php';  ?>

<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/mco/view_supplyOrders.css">
<!-- ______________________________________________________________________________________________________-->
<!-- 
<div class="container" style="overflow-x: auto;"> -->
<!-- <section></section> --> 

<div class="mytabs">
  <!-- tab1 -->
  <input type="radio" id="tab1" name="mytabs" checked="checked">
    <label for="tab1">Ongoing Orders</label>
    <div class="tab">

          <div class="ongoingOrders">
  
          <table>
              <tr>
                <th>Supply Order Id</th>
                <th>Supplier</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Supply Date</th>
                <th>Status</th>
              </tr>
            <?php $data_index=0 ?>
            <?php foreach ($data['ordView'] as $ordView) : ?>
              <?php if($ordView->status == "Ongoing"): ?>

              <tr>
                <td><?php echo $ordView->supply_order_id; ?></td>
                <td><?php echo $ordView->supplier_id; ?>      
                <td><?php echo $ordView->quantity; ?></td>
                <td><?php echo $ordView->unit_price; ?></td>
                <td><?php echo $ordView->supply_date; ?></td>
                <td>
                  <div class="table-btns">
                    <!-- <a href="#popup1"><button class="pendingBtn">Pending</button></a> -->
                    <button class="pendingBtn" onclick="openModel2('<?=$ordView->supply_order_id?>')" id="<?php echo($data_index) ?>" >Pending</button></button>
                  </div> 
                </td>
              </tr>
              <?php endif; ?> 
              <?php $data_index++; ?> 
            <?php endforeach; ?>

            </table>

          </div>

      <!-- popup view - pending orders checking-->
      <div class="model fade in" id="model" tabindex="-1">
        <div class="model-dialog">
          <div class="model-content">
            <div class="model-header">
              <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
            </div>
            <div class="model-body">
              <h3 class="Model-title"><i class="fa fa-circle-o-notch" aria-hidden="true"></i>Order Checking...</h3>  
            </div>          
            <div class="modal-footer">
              <div class="form-group">
                <form id="update-form" action="<?php echo URLROOT?>/Milk_Collection_Officer/updateCollected/">
                  <input type="submit" class="collected" value="Accept">
                </form>
                <form id="reject-form" action="<?php echo URLROOT?>/Milk_Collection_Officer/updateRejected/">
                  <input type="submit" class="rejected" value="Reject">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      </p>

    </div>

  <!-- tab 2 -->
  <input type="radio" id="tab2" name="mytabs">
    <label for="tab2">Completed Orders</label>
    <div class="tab">
    <div class="search-box"><input type="text" id="searchInput" placeholder="Search By Order IDs..." onkeyup="searchFunc();">
      <div class="pastOrders">
        <table id="detailsTable">
          <tr>
            <th>Supply Order Id</th>
            <th>Supplier</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Supply Date</th>
            <th>Status</th>
            <th>More</th>
          </tr>

          <?php foreach ($data['ordView'] as $ordView) : ?>
          <?php if($ordView->status != "Ongoing"): ?>

          <tr>
            <td><?php echo $ordView->supply_order_id; ?></td>
            <td><?php echo $ordView->supplier_id; ?>       
            <td><?php echo $ordView->quantity; ?></td>
            <td><?php echo $ordView->unit_price; ?></td>
            <td><?php echo $ordView->supply_date; ?></td>
            <td>
            <?php if($ordView->status == 'Collected') : ?>
              <span class="status collected">Collected</span>
            <?php else : ?>
              <span class="status rejected">Rejected</span>
            <?php endif; ?>
            </td> 

            <td>
            <div class="table-btns">
              <a href="<?php echo URLROOT?>/Milk_Collection_Officer/collectionDetails/<?php echo $ordView->supply_order_id; ?>"><button class="viewBtn">View Invoice</button></a>
            </div> 
            </td>
          </tr>
          <?php endif ?> 
          <?php endforeach; ?>

        </table>

      </div>
      </p>
    </div>


</div>


<script>
  function openModel2(id)
  {
    const form = document.getElementById("update-form");
    form.action = "<?php echo URLROOT?>/Milk_Collection_Officer/updateCollected/"+id;
    const form2 = document.getElementById("reject-form");
    form2.action = "<?php echo URLROOT?>/Milk_Collection_Officer/updateRejected/"+id;

    document.getElementById("model").classList.add("open-model");
  }
  
  function closeModel(){
      const model = document.getElementById("model").classList.remove("open-model");
  }
  
  
</script> 


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
<!-- <script src="<?php echo URLROOT; ?>/js/mco.js"></script> -->
