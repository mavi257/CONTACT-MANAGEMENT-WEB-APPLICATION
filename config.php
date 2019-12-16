<?php
include_once('include/Database.php');
define('SS_DB_NAME', 'id11954474_test');
define('SS_DB_Contact', 'id11954474_root');
define('SS_DB_PASSWORD', 'password');
define('SS_DB_HOST', 'localhost');

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, SS_DB_Contact, SS_DB_PASSWORD);
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$db 	=	new Database($pdo);
?>