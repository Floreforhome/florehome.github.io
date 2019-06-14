<?php 
	require_once '../connection.php';
	$connectAddPr = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectAddPr));

	$curProductID = (int)$_POST['currentProduct'];
	$curProductCount = (int)$_POST['productCount'];

	$totalCount = $curProductCount;

	$opCommand = "SELECT * FROM cart";
	$opQuery = mysqli_query($connectAddPr, $opCommand);

	$deleteKey = 1;

	if ($opQuery) {
		while ($optimazeCartLoad = mysqli_fetch_array($opQuery)) {

			if ($optimazeCartLoad['Items_item_id'] == $curProductID) {
				$totalCount += $optimazeCartLoad['it_kolvo']; // подсчет количества совпадающих товаров
				$deleteKey++;
			}
		}
	}
	
	if ($deleteKey > 1) {
		$commandOptimizeCart = "DELETE FROM cart WHERE Items_item_id = '$curProductID'";
		$optimizeCartQuery = mysqli_query($connectAddPr, $commandOptimizeCart);
		$curProductCount = $totalCount;
	}

	$commandInsertProduct = "INSERT INTO cart(Items_item_id, it_name, it_price, it_kolvo) SELECT sklad_id, name, price,'$curProductCount' FROM items WHERE sklad_id = '$curProductID'";

	$cartAddQuery = mysqli_query($connectAddPr, $commandInsertProduct) or die ("Ошибка " . mysqli_error($connectAddPr));

	if ($cartAddQuery) {
		// header("location:php://history.go(-1)");
		header("Refresh:0; url=../index.php?page=tovarpod&sklad_id=$curProductID");
	}

	mysqli_close($connectAddPr);
?>