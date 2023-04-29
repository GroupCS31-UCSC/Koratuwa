<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/product_manager/viewStock.css">
<?php require APPROOT.'/views/product_manager/pm_dashboard.php'; ?>
<!-- ______________________________________________________________________________________________________-->



<h2>Product Batches</h2>

<div class="search-section">
              <div class="search-bar">
            
              

              <!-- <div class="main-search"> -->
                  <input type="text" name="search" placeholder="Filter by Employee Name " autocomplete="off" value="<?php echo $data['search'] ?>" >
           
                  <button><i class="fa-solid fa-magnifying-glass"></i></button>
              <!-- </div> -->

              </form>

              </div>
          </div>

  <table>
      <tr>
      <th>Stock ID</th>
        <th>Product ID</th>
        <th>Manufactured Date</th>
        <th>Expiry Date</th>
        <th>Quantity</th>
        
      </tr>

      <?php foreach ($data['stockView'] as $product_stock) : ?>
      <tr>
      <td><?php echo $product_stock->stock_id; ?></td>
        <td><?php echo $product_stock->product_id; ?></td>
        <td><?php echo $product_stock->mfd_date; ?></td>
        <td><?php echo $product_stock->exp_date; ?></td>
        <td><?php echo $product_stock->quantity; ?></td>
        
     
<!-- 
        <div class="table-btns">
      <a href="<?php echo URLROOT?>/product_manager/updateStock/"><button class="updateBtn" title="Update"><i class="fa-regular fa-pen-to-square"></i></button></a>
      <a href="<?php echo URLROOT?>/product_manager/deleteStock/"><button class="deleteBtn" title="Delete"><i class="fa-regular fa-trash-can"></i></button></a>
   </div>     -->

    </td>
        
      </tr>
      <?php endforeach; ?>
    </table>
<!-- 
    <img class="img-bg" src="<?php echo URLROOT; ?>/public/img/milk-stock.jpg" alt="no"> -->
<?php require APPROOT.'/views/include/footer.php'; ?>
