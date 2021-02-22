<?php 
session_start();
include('../../common/funcs/funcs.php');
//loginCheck()

include('../../common/component/class-db.php');
$db = new DB;
$pdo = $db->dbset();

$uid = $_SESSION['uid'];
include('../../common/component/header-icon.php');
 ?>