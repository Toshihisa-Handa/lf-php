<?php
session_start();
include('../app/funcs/funcs.php');
include(__DIR__ . '/../app/config.php');

//loginCheck()

$pdo = Database::dbcon();


$uid = $_SESSION['uid'];
include('common/header-icon.php');
