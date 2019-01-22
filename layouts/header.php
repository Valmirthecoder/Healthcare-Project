<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

	// select logged in users detail
	$res = $conn->query("
		SELECT u.*, ru.name as role_name FROM users as u
			LEFT JOIN user_roles as ru 
			 ON u.role_id = ru.id 
		WHERE u.id = " . $_SESSION['user'] . "
	");
	$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC); 

?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?php echo $page_title ?> - Healthcare Prishtina</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    
	<?php echo $stylesheets ?>
	
</head>
<body>

<?php 
	require_once 'partials/nav.php';
?>
