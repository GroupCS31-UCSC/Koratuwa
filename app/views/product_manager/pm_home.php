<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/pm_home.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->

<?php foreach ($data['product_count'] as $pCount) : ?>
<!--cards-->
<div class="cardBox">
  <div class="card">
    <div>
    <!-- ✅ -->
      <div class="cardName">Total Products</div>
        <div class="numbers"><?php echo $pCount ?></div> 
          <div class="day1">
            <div class="circle"></div><label>last 30 days</label>
          </div> 
        </div>
      </div>

      <div class="card">
        <div>
          <div class="cardName">Fresh Milk Production(Literes)</div>
          <div class="numbers">60</div>
          <div class="day2">
            <div class="circle"></div><label>last 30 days</label>
          </div>
        </div>
      </div>

      <div class="card">
        <div>
          <div class="cardName">Flavoured Milk Production(Literes)</div>
          <div class="numbers">50</div>
          <div class="day3">
            <div class="circle"></div><label>last 30 days</label>
          </div>
        </div>
      </div>

      <div class="card">
        <div>
          <div class="cardName">Cheese Production(Kilo Gram)</div>
          <div class="numbers">10</div>
          <div class="day4">
            <div class="circle"></div><label>last 30 days</label>
          </div>
        </div>
      </div>

    </div>

    <!--Add charts-->
    <div class="graphBox">

      <div class="box">
        <label><center>Total Production</center></label>
        <canvas id="ch1"></canvas>
      </div>

      <div class="box">
        <label><center>Number of Productions</center></label>
        <canvas id="ch2"></canvas>
      </div>

    </div>
    <?php endforeach; ?>
  <!-- </div> -->




<!--
<script type="text/javascript" href="<?php echo URLROOT; ?>/public/js/myChart.js">

</script>
-->

<!-- notification view box -->
<div class="notifyBox" id="notifyBox">
  <?php foreach ($data['notifications'] as $notifi) : ?>
    <div class="comment-box">
      <div class="box-top">
        <div class="comment">
          <p><strong><?php echo $notifi->product_id; ?></strong></p> 
        </div>
        <a href="<?php echo URLROOT?>/Product_Manager/updateNotifyStatus/<?php echo $notifi->product_id ?>"><button class="" title="Mark As Read"><i class="fa-regular fa-eye"></i></button></a>
      </div>
      <div class="name">
        <span><?php echo $notifi->product_name; ?> Available Quantity is low
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

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/pm.js"></script>
