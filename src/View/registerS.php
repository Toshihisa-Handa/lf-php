<?php 
session_start();
include('../../common/funcs.php');

$uid=$_SESSION['tests'];
echo $uid;
return;