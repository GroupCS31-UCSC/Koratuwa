<?php require APPROOT.'/views/include/header.php'; ?>
<?php require APPROOT.'/views/cashier/cashier_dashboard.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/cashier/viewSale.css">


<!-- <div class="flash-msg">
  <?php flash('addSale_flash') ?>
  <?php flash('updateSale_flash') ?>
  <?php flash('deleteSale_flash') ?>
</div>


<div class="search-add">
  <div class="search-area"> -->
    <!-- <form action="<?php echo URLROOT; ?>/Livestock_Manager/searchCattle" method="POST"> -->
      <!-- <input type="text" name="search" id="search" class="search" placeholder="Search by COW ID">
      <span class="icon"><i class="fa-solid fa-search"></i></span> -->
    <!-- </form> -->
  <!-- </div>
  <input type="button" value="Add Sale" class="add-btn" onclick="location.href='<?php echo URLROOT; ?>/Cashier/addSale' ">
</div> -->
<div class="form-container">
	<div class="form-header">
		<h3>Customer Bill</h3>
	</div>
	<br>
	<form action="<?php echo URLROOT; ?>/Cashier/addSale" method="POST">
    <!--Customer name-->
		<div class="form-input-title">Customer Name</div>
    <input type="text" name="customer_name" id="customer_name" class="customer_name" value="">        
    <!--Contact no-->
    <div class="form-input-title">Contact no</div>
    <input type="text" name="contact_no" id="contact_no" class="contact_no" value="">
    <!-- products -->
    <div class="form-input-title">Products</div>
    <select name="products" id="products">
      <option value="Fresh milk">Fresh Milk</option>
      <option value="Flavourd milk">Flavord milk</option>
      <option value="Yogurt">Yogurt</option>
    </select>
    <div class="form-input-title">Quantity</div>
    <input type="text" name="quantity" id="quantity" class="quantity" value="">    
    <div class="product">
      <table>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Prize</th>
          <th>Action</th>
        </tr>
        <tr>
          <td>Fresh milk</td>
          <td><a href=""><button>+</button></a>03<a href=""><button>-</button></a></td>
          <td>300</td>
          <td>
            <a href="<?php echo URLROOT; ?>/Cashier/deleteSale"><button class="deleteBtn">X</button></a>
          </td>
        </tr>
        <tr>
          <td>Yogurt</td>
          <td><a href=""><button>+</button></a>02<a href=""><button>-</button></a></td>
          <td>300</td>
          <td>
            <a href="<?php echo URLROOT; ?>/Cashier/deleteSale"><button class="deleteBtn">X</button></a>
          </td>
        </tr>
      </table>
    </div>
    <div class="bill">
      <table>
        <tr>
          <td>Total Amount:</td>
          <td>600</td>
        </tr>
        <tr>
          <td>Discount:</td>
          <td>0</td>
        </tr>
        <tr>
          <th>Grand Total:</th>
          <th>600</th>
        </tr>
      </table>
    </div>
	  <br>
	  <input type="submit" value="Submit" class="submitBtn">
  </form>
</div>

<div class="container" style="overflow-x: auto;">
    <table>
    <tr>
      <th>Sale ID</th>
      <th>Name</th>
      <th>Contact no</th>
      <th>Action</th>
    </tr>
  
    <tr>
      <td>S1</td>
      <td>Gunathilaka</td>
      <td>0715667876</td>
      <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT; ?>/Cashier/updateSale"><button class="updateBtn">UPDATE</button></a>
        </div>
      </td>
    </tr>
    <tr>
      <td>S2</td>
      <td>Yayawardana</td>
      <td>0714345654</td>
      <td>
        <div class="table-btns">
          <a href="<?php echo URLROOT; ?>/Cashier/updateSale"><button class="updateBtn">UPDATE</button></a>
        </div>
      </td>
    </tr>
  </table>

  
</div>

  


<?php require APPROOT.'/views/include/footer.php'; ?>
