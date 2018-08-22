<?php
require_once "database.php";
require_once "memo.php";
$database = new Database();
$db = $database->getConnection();
$memo = new Memo($db);
print_r($_POST);
var_dump($_POST);
if ($_POST) {
	$title = strtoupper( $_POST['title_create']);
	$memo->Add( $title,$_POST['description_create']);	
}
header("location:index.php");
?>