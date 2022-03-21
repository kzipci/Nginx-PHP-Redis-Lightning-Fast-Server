<?php 

session_name('USER1');
session_start();

$_SESSION["db"] = 'SESSION Değişken';

echo $_SESSION['db'];