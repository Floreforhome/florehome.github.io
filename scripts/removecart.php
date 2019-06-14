<?php 
	require_once '../connection.php';
	
	$connectRemoveProduct = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectRemoveProduct));

	$removeProductID = (int)$_POST['removeFromCart'];

	$removeQuery = "SELECT * FROM cart";
	$removeThisProduct = mysqli_query($connectRemoveProduct, $removeQuery) or die("Error" . mysqli_error($connectRemoveProduct));

	if ($removeThisProduct) {
		while ($removeProductData = mysqli_fetch_array($removeThisProduct)) {
			if ($removeProductData['Items_item_id'] == $removeProductID) {
				$removeQuery1 = mysqli_query($connectRemoveProduct, "SET FOREIGN_KEY_CHECKS = 0"); // отключение проверки внешних ключей
				$productRemove = mysqli_query($connectRemoveProduct, "DELETE FROM cart WHERE Items_item_id= '$removeProductID'");
				$removeQuery2 = mysqli_query($connectRemoveProduct, "SET FOREIGN_KEY_CHECKS = 1"); // включение проверки внешних ключей
			}
		}
	}

	if ($productRemove) {
		header("Refresh:0; url=../index.php?page=cart");
	}

	mysqli_close($connectRemoveProduct);
?>