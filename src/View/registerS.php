<?php 
session_start();
include('../../common/funcs.php');

$uid=$_SESSION['uid'];
echo $uid;
return;