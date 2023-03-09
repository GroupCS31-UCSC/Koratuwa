<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/viewSupply.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->
<!-- navigation bar ------>
  <!-- <img class="img-bg" src="<?php echo URLROOT; ?>/img/sup2.jpg" alt="no"> -->
   <?php flash('placeSupply_flash') ?>
  <?php flash('dltSupOrder_flash') ?>
  <?php flash('updateSupply_flash') ?>
  <!-- <div class="tabel_content"> -->

    
<section class="table-container">
  
  <div class="container">
    <!-- --------serch bar-------------->
    <!-- <div class="feature">
   
    </div> -->
    <!--------- table------------------>
    <div class="feature1">
      <div class="search">
          <input type="text" class="searchTerm" placeholder="What are you looking for?">
          <button type="submit" class="searchButton">
            <i class="fa fa-search"></i>
          </button>       
      </div> 
      <!-- <div class="table-dropdown">
            <div class="dropdown-menu">
              <button class="dropdown-toggle">Topics</button>
              <ul class="list">
                <li class="list-item" style="--delay:0.2s">All</li>
                <li class="list-item" style="--delay:0.4s">Collected</li>
                <li class="list-item" style="--delay:0.6s">Not Collected</li>
                <li class="list-item" style="--delay:0.8s">@Website_Mentor</li>
              </ul>
            </div>
      </div>               -->
      <table>
          <tr>
            <th>Supply Order ID</th>
            <th>Supply Date</th>
            <th>Supply Quantity (L) </th>
            <th>Price Received Per Unit (Rs) </th>
            <!-- <th>Supplying Address</th> -->
            <th>Status</th>
            <th>Quality</th>
            <th>Action</th>
          </tr>

          <?php foreach ($data['supOrderView'] as $supOrd) : ?>
          <tr>
            <td><?php echo $supOrd->supply_order_id; ?></td>
            <td><?php echo $supOrd->supply_date; ?></td>
            <td><?php echo $supOrd->quantity; ?></td>
            <td><?php echo $supOrd->unit_price; ?></td>
            <!-- <td><?php echo ($data['supOrderView'])->supplying_address; ?></td> -->
            <td><?php echo $supOrd->status; ?></td>
            <td><?php echo $supOrd->quality; ?></td>
            <td>
              <?php if($supOrd->status == 'Not Collected') : ?>
                <div class="table-btns">
                  <a href="<?php echo URLROOT?>/Supplier/updateSupOrder/<?php echo $supOrd->supply_order_id ?>"><button class="updateBtn">UPDATE</button></a>
                  <a href="<?php echo URLROOT?>/Supplier/deleteSupOrder/<?php echo $supOrd->supply_order_id ?>"><button class="deleteBtn">DELETE</button></a>
                </div>
              <?php else : ?>
                <div class="table-btns">
                  <!-- <a href="<?php echo URLROOT?>/Supplier/updateSupOrder/<?php echo $supOrd->supply_order_id ?>"><button class="updateBtn">View</button></a> -->
                  <button onclick="openModal('<?php echo $supOrd->supply_order_id; ?>')" class="updateBtn">View Invoice</button>
                </div>
              <?php endif; ?>
            </td>
          </tr><br>
          <?php endforeach; ?>

      </table>      
    </div>
  </div>
</section>
<section class="details">
  <div class="container">
    <div class="feature2">
      <div class="title"><h1>Total Supply Milk </h1></div>
      <svg viewBox="0 0 100 140">
        <defs>
          <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey" />
                <feComposite in="SourceGraphic" in2="gooey" operator="atop"/>
          </filter>
        </defs>
        <rect id="box" x="10" y="0" width="80" height="0">
          <animate attributeName="height" from="0" to="85" dur="2s" fill="freeze" begin="1s"/>
          <animate attributeName="y" from="105" to="20" dur="2s" fill="freeze" begin="1s"/>
        </rect>
        <g>
          <path class="glass" d="M0 0 L0 140 L100 140 L100 0">
        </path>
        <rect class="glass" x="0" y="110" width="100" height="30"/>
        </g>
      </svg>   
      <div class="items">
        <h2>
          <!-- display the total milk quantity of relavant supplier -->
          <span class="counter_up" data-number="<?php echo($data['ordSum']) ?>" data-speed="10000"></span> L
        </h2>
      </div>   
    </div>

    <div class="feature2">
      <div class="graphBox">
        <div class="box">
          <label><center>Quality</center></label>
          <canvas id="quality"></canvas>
        </div>
      </div>      
    </div>

  </div>
</section>


<!-- The Modal -->
<dialog id="viewModal" class="modal">
  <div class="modal-content">
      <div class="modal-header">
        <button class="close" onclick="closeModal()">
          <span>&times;</span>
        </button>
        <h2>Koratuwa Dairy Farm</h2>
        <h2 id="title"></h2>
      </div>
      <div class="modal-body">
        <ul>
          <li>
            Your Income:
          </li>
          <li>
            asdfgh
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <h3>***</h3>
      </div>
    </div>
</dialog>



<script>
  //--------------Model form---------------------------//

  function openModal(id){
    console.log(id);
    const viewModal = document.getElementById('viewModal')
    document.getElementById('title').innerHTML = id
    viewModal.showModal()
  }

  function closeModal(){
    const viewModal = document.getElementById('viewModal');
    viewModal.close();
  }




  
  
  
  
  
  
  
  // var modal = document.getElementById("myModal");

  // var btn = document.getElementById("myBtn");

  // var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  // btn.onclick = function() {
  //   modal.style.display = "block";
  // }

  // When the user clicks on <span> (x), close the modal
  // span.onclick = function() {
  //   modal.style.display = "none";
  // }

  // When the user clicks anywhere outside of the modal, close it
  // window.onclick = function(event) {
  //   if (event.target == modal) {
  //     modal.style.display = "none";
  //   }
  // }  

  //--------------counter----------------//
  let counterup = document.querySelectorAll(".counter_up");
    let convert = Array.from(counterup);
    convert.map((counteritem) => {
      let counter = 0;
      function count() {
        counter++;
        counteritem.innerHTML = counter;
        if (counter == counteritem.dataset.number) {
          clearInterval(timing);
        }
      }
      let timing = setInterval(() => {
        count();
      }, counteritem.dataset.speed/counter);
  }); 
   
</script>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/supplier.js"></script>


        