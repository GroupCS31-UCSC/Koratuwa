<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewFeed.css">

<div class="flash-msg">
  <?php flash('addfeed_flash') ?>
  <?php flash('updatefeed_flash') ?>
  <?php flash('deletefeed_flash') ?>
</div>

<div class="search-add">
  <div class="search-area">
    <!-- <form action="<?php echo URLROOT; ?>/Livestock_Manager/searchCattle" method="POST"> -->
      <input type="text" name="search" id="search" class="search" placeholder="Search by COW ID">
      <span class="icon"><i class="fa-solid fa-search"></i></span>
    <!-- </form> -->
  </div>
  <input type="button" value="Add New Feed record" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Livestock_Manager/addFeedMonitoring' ">
</div>

<div class="container" style="overflow-x: auto;">
  <table>
    <tr>
      <th>Date</th>
      <th>Cow ID</th>
      <th>Note</th>
      <th>Action</th>
    </tr>
    <tr>
      <td>Feb 20, 2023</td>
      <td>COW101</td>
      <td>Next Week follow this routine.</td>
      <td>
        <div class="feedItem fade in" id="feedItem" tableindex="-1" style="display: block;padding-right: 17px;">
          <div class="feedItem-dialog">
            <div class="feedItem-content">
              <div class="feedItem-header">
                <button type="button" class="close" onclick="closeFeedItem()" ><span aria-hidden="true">×</span></button>
                <h4 class="feedItem-title"><i class="fa fa-info-circle edit-color"></i> Item Details</h4>
              </div>
              <div class="feedItem-body">
                <table class="table table-bordered table-striped table-responsive">
                  <tr>
                    <th>Food Item</th>
                    <th>Item Quantity</th>
                    <th>Feeding Time</th>
                  </tr>
                  <tr>
                    <td>Grass</td>
                    <td>10.00 KG</td>
                    <td>8:00 AM</td>
                  </tr>
                  <tr>
                    <td>Salt</td>
                    <td>1.00 KG</td>
                    <td>04:30 PM</td>
                  </tr>
                  <tr>
                    <td>Water</td>
                    <td>5.00 KG</td>
                    <td>10:30 AM</td>
                  </tr>                           
                </table><br>
              </div>
            </div>
          </div>
        </div>
        <div class="table-btns">
          <a href="#"><button class="viewBtn" onclick="openFeedItem()">VIEW</button></a>
          <a href="#"><button class="updateBtn">UPDATE</button></a>
          <a href="#"><button class="deleteBtn">DELETE</button></a>
        </div>
      </td>
    </tr>
    <tr>
      <td>Feb 15, 2023</td>
      <td>COW102</td>
      <td>Regular Same food until notice.</td>
      <td>
        <div class="feedItem fade in" id="feedItem" tableindex="-1" style="display: block;padding-right: 17px;">
          <div class="feedItem-dialog">
            <div class="feedItem-content">
              <div class="feedItem-header">
                <button type="button" class="close" onclick="closeFeedItem()" ><span aria-hidden="true">×</span></button>
                <h4 class="feedItem-title"><i class="fa fa-info-circle edit-color"></i> Item Details</h4>
              </div>
              <div class="feedItem-body">
                <table class="table table-bordered table-striped table-responsive">                     <tr>
                    <th>Food Item</th>
                    <th>Item Quantity</th>
                    <th>Feeding Time</th>
                  </tr>
                  <tr>
                    <td>Grass</td>
                    <td>10.00 Gram</td>
                    <td>8:00 AM</td>
                  </tr>
                  <tr>
                    <td>Salt</td>
                    <td>1.00 Gram</td>
                    <td>10:00 AM</td>
                  </tr>
                  <tr>
                    <td>Water</td>
                    <td>5.00 KG</td>
                    <td>10:30 AM</td>
                  </tr>                           
                </table><br>
              </div>
            </div>
          </div>
        </div>
        <div class="table-btns">
          <a href="#"><button class="viewBtn" onclick="openFeedItem()">VIEW</button></a>
          <a href="#"><button class="updateBtn">UPDATE</button></a>
          <a href="#"><button class="deleteBtn">DELETE</button></a>
        </div>
      </td>
    </tr>
  </table>
</div>

      

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/lm.js"></script>
