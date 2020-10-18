<?php
// pripojeni k databazi - local host a uzivatel
$connection = mysqli_connect('localhost', '', '');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
// vybrani databaze
$select_db = mysqli_select_db($connection, 'bc_prace');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?> 