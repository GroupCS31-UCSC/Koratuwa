<?php
    #specify that after going to the index.php  -----------> load the bootloader.php

    require_once '../app/bootloader.php';    #only instantiate bootloader file only by once.

    #instantiate the Core class
    $init = new Core;

?>
