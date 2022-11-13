<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'admin.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'upload'){
	$login = $crud->upload();
	
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'export'){
	$logout = $crud->export();

}

if($action == 'update'){
	$logout = $crud->update();

}
if($action == 'truncate'){
	$logout = $crud->truncate();

}
if($action == 'insert'){
	$logout = $crud->insert();

}

?>