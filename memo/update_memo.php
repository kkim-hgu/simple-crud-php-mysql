<?php
require_once "database.php";
require_once "memo.php";
$database = new Database();
$db = $database->getConnection();
$memo = new Memo($db);
print_r($_POST);
var_dump($_POST);
if ($_POST) {
	$title = strtoupper( $_POST['title_update']);
	$memo->Update($_POST['id_update'], $title,$_POST['description_update']);	
}
header("location:index.php");
?>