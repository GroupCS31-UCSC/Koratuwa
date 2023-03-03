<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/livestock_manager/livestock_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/viewCattle.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/livestock_manager/subNavBar.css">


<div class="container" style="overflow-x: auto;">

<div class="model fade in" id="model" style="display: block;padding-right: 17px;">
    <div class="model-dialog">
        <div class="model-content">
            <div class="model-header">
                <button type="button" class="close" onclick="closeModel()" ><span aria-hidden="true">×</span></button>
                <h4 class="Model-title"><i class="fa fa-info-circle edit-color"></i> Cattle Details</h4>
            </div>
            <div class="model-body">
            <?php foreach ($data['cattleDetailsView'] as $cattleDetailsView) : ?>
                <form class="">
                <label for="Age">Age: </label>
                <label for="value"><?php echo $cattle->age ?></label><br>
                <label for="gender">Gender: </label>
                <label for="value"><?php echo $cattle->gender ?></label>
                <!-- <tr>
                      <th>Age</th>
                      <th>gender</th>
                      <th>Milking Status</th>
                    </tr>
                    <tr>
                      <td><?php echo $cattle->age ?></td>
                      <td><?php echo $cattle->gender ?></td>
                      <td><?php echo $cattle->milking_status ?></td>
                    </tr>    <?php endforeach; ?>                -->
                  </form><br>
                </div>
              </div>
            </div>
          </div>
</div>

<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/lm.js"></script>