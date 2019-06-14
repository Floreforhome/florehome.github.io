<?php 
	require_once '../connection.php';
	$connectM1SUpd = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectM1SUpd));

	$checkUpdData1 = (int)$_POST['CNOPKA'];

	$updateNames = mysqli_real_escape_string($connectM1SUpd, $_POST['dev_name']);
	$updatePrice = (int)$_POST['dev_price'];
	$updateNumber = (int)$_POST['dev_phone'];
	$updateEmail = mysqli_real_escape_string($connectM1SUpd, $_POST['dev_email']);
	$updateFIO = mysqli_real_escape_string($connectM1SUpd, $_POST['dev_full_name']);
	$updateAddress = mysqli_real_escape_string($connectM1SUpd, $_POST['dev_address']);
	$updateIndex = mysqli_real_escape_string($connectM1SUpd, $_POST['dev_index']);
	$updateDate = $_POST['dev_date'];
	$updatePassport = (int)$_POST['dev_pass_num'];

	$updateM1BDevCmd = "UPDATE delivery SET names_dev = '$updateNames', price_dev = '$updatePrice', number_dev = '$updateNumber', email_dev = '$updateEmail', full_name = '$updateFIO', address = '$updateAddress', dev_index = '$updateIndex', `date` = '$updateDate', pass_number = '$updatePassport' WHERE order_id = '$checkUpdData1'";

	$updateM1BDevQuery = mysqli_query($connectM1SUpd, $updateM1BDevCmd) or die ("Ошибка " . mysqli_error($connectM1SUpd));

	if ($updateM1BDevQuery) {
		header("Refresh:0; url=../index.php?page=admin-dos"); // возврат на главную страницу после успешного выполнения всех запросов
	}
	mysqli_close($connectM1SUpd);
?>