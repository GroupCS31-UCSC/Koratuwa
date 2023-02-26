<?php require APPROOT.'/views/include/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/admin/employeeProfile.css">
<?php require APPROOT.'/views/admin/admin_dashboard.php';  ?>
<!-- ______________________________________________________________________________________________________-->

<?php foreach ($data['empProfileData'] as $emp) : ?>

<ul><?php echo $emp->image; ?>
    <li>Employee Id : <?php echo $emp->employee_id; ?></li>
    <li>Full Name :<?php echo $emp->employee_name; ?></li>
    <li>Nic :<?php echo $emp->nic; ?></li>
    <li>Address :<?php echo $emp->address; ?></li>
    <li>Contact Number :<?php echo $emp->contact_number; ?></li>
    <li>Date of Birth :<?php echo $emp->dob; ?></li>
    <li>Age :<?php echo time_diff($emp->dob); ?></li>
    <li>Gender :<?php echo $emp->gender; ?></li>
    <li>Email :<?php echo $emp->email; ?></li>
    <li>Salary :<?php echo $emp->salary; ?></li>
    <li>Service From :</li>
    <li>Service Time :</li>
    <li>Employment :<?php echo $emp->employment; ?></li>

</ul>


<?php endforeach; ?>
<?php require APPROOT.'/views/include/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/admin.js"></script>
 
<!-- find difference among two dates -->
<?php 
function time_diff($oldDate)
{
    $nowDate=date("Y-m-d");
    $diff=date_diff(date_create($oldDate),date_create($nowDate));
    return $diff->format('%y')." Years ".$diff->format('%m')." months ".$diff->format('%d')." days";
}
?>