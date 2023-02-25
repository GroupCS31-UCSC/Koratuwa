<?php require APPROOT.'/views/include/header.php'; ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/home.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/buttons.css">
<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/forms.css"> -->


<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/users/profile.css">

<?php foreach ($data['userProfile'] as $user) : ?>

    <ul><?php echo $emp->image; ?>
    <li>User Id : <?php echo $user->employee_id; ?></li>
    <li>Full Name :<?php echo $user->employee_name; ?></li>
    <li>Nic :<?php echo $user->nic; ?></li>
    <li>Address :<?php echo $user->address; ?></li>
    <li>Contact Number :<?php echo $user->contact_number; ?></li>
    <li>Date of Birth :<?php echo $user->dob; ?></li>
    <li>Age :</li>
    <li>Gender :<?php echo $user->gender; ?></li>
    <li>Email :<?php echo $user->email; ?></li>
    <li>Salary :<?php echo $user->salary; ?></li>
    <li>Service From :</li>
    <li>Service Time :</li>
    <li>Employment :<?php echo $user->employment; ?></li>

</ul>

<?php endforeach; ?>


<?php require APPROOT.'/views/include/footer.php'; ?>
