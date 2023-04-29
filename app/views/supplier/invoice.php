<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/supplier/invoice.css">
<?php require APPROOT.'/views/supplier/supplier_dashboard.php'; ?>
<!-- -------------------------------------------------------------------->

<div class="viewBox">

        
            <?php foreach ($data['supOrd'] as $supOrd) : ?>
            <ul  id='newData'>
                <li><?php echo $supOrd->supply_order_id; ?></li>
            </ul>
            <?php endforeach; ?>

        
</div>

<script>
//-------------- view sup orders------------------//
function openModel1(id){
  // var id = data["id"];
  const url ="/koratuwa/Supplier/viewOrder/"+id;
  const form = new FormData();
  form.append("id", id);
  fetch(url, {
    method: "GET"
  }).then(response => response.text())
  .then(data => {
      // console.log(data);
    if(data){
    const domp=new DOMParser();
    const doc= domp.parseFromString(data,'text/html');
    const newData = doc.getElementById('newData');
    document.getElementById("newData").innerHTML = newData.innerHTML;
    
    }

  });
  document.getElementById("model").classList.add("open-model");

  
}    
</script>