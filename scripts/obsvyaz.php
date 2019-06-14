
<?php 
	require_once '../connection.php';
	$connectAddRW = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectAddRW));

	$obname = $_POST['username']; 
	$obEmail = htmlspecialchars(mysqli_real_escape_string($connectAddRW, $_POST['usermail'])); 
	$obphone = $_POST['subject']; 
	$obtext =  htmlspecialchars(mysqli_real_escape_string($connectAddRW, $_POST['text'])); 

	$commandInsertOBS = "INSERT INTO svyaz(name, email, phone, message) VALUES ('$obname', '$obEmail', '$obphone', '$obtext')";
	

	$rwAddQuery = mysqli_query($connectAddRW, $commandInsertOBS) or die ("Ошибка " . mysqli_error($connectAddRW));

	if ($rwAddQuery) {
		header("Refresh:0; url=../index.php?page=obspasiba"); 
	}

	mysqli_close($connectAddRW);
?>