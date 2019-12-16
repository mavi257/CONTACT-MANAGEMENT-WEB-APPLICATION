<?php 
include_once('config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('contact',array('id'=>$_REQUEST['delId']));
	header('location: browse-Contact.php?msg=rds');
	exit;
}
?>