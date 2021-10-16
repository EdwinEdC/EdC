<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])){

?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>MAY THE FORCE BE WITH YOU, <?php echo $_SESSION['name']; ?></h1>
	<a href="logout.php">LOGOUT</a>
	<a href="se_pg.html">CHECK YOUR MISSIONS</a>
</body>
</html>

<?php
}else{
	header("Location: index.php");
	exit();
}
?>