<?php 
session_start();
include('../../common/funcs/funcs.php');
include(__DIR__.'/../../../app/config.php');

//loginCheck()

$pdo = Database::dbcon();


$uid = $_SESSION['uid'];
include('../../common/component/header-icon.php');
