<?php
require_once "database.php";
require_once "memo.php";
$database = new Database();
$db = $database->getConnection();
$memo = new Memo($db);
print_r($_POST);
var_dump($_POST);
if ($_GET['id']) {
	$memo->Remove($_GET['id']);
}

header("location:index.php");
?>