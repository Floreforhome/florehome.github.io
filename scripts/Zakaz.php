<?php 
	require_once '../connection.php';

	$userEmail = $_POST['email']; // получение почты пользователя
	$userNumber = (int)$_POST['phone']; // получение номера телефона пользователя
	$userFullName = $_POST['name']; // получение имени пользователя
	$priceInCart = 0; // переменная для подсчета общей стоимости товаров в корзине
	$connectConfirmOrder = mysqli_connect($hostname, $username, $password, $database) or die("Error" . mysqli_error($connectConfirmOrder)); // подключение к базе данных
	$confirmOrderCartQuery = "SELECT * FROM cart"; // получение данных из корзины
	$confirmQueryCart = mysqli_query($connectConfirmOrder, $confirmOrderCartQuery); // выполнение запроса на получение данных из корзины
	$namesProductInCart = ""; // переменная для хранения названия товаров в заказе
	if($confirmQueryCart) {
		while ($queryCartDev = mysqli_fetch_array($confirmQueryCart)) {
			$namesProductInCart .= $queryCartDev['it_name'] . ", "; // составление строки с именами товаров
			$priceInCart += $queryCartDev['it_price'] * $queryCartDev['it_kolvo']; // подсчет обшей стоимости товаров
			$inCartID = $queryCartDev['cart_id'];
		}
	}
	$confirmQueryAddDev = "INSERT INTO delivery(names_dev, price_dev, number_dev, email_dev, full_name, Cart_cart_id) VALUES ('$namesProductInCart', '$priceInCart', '$userNumber', '$userEmail', '$userFullName', '$inCartID')"; // запрос на добавление данных из корзины в заказ
	$confirmAddQuery = mysqli_query($connectConfirmOrder, $confirmQueryAddDev) or die ("Ошибка " . mysqli_error($connectConfirmOrder)); // выполнение запроса 
	$cleanCartQuery1 = mysqli_query($connectConfirmOrder, "SET FOREIGN_KEY_CHECKS = 0"); // отключение проверки внешних ключей
	$cleanCartQuery2 = mysqli_query($connectConfirmOrder, "TRUNCATE TABLE cart"); // очистка корзины
	$cleanCartQuery2 = mysqli_query($connectConfirmOrder, "SET FOREIGN_KEY_CHECKS = 1"); // включение проверки внешних ключей

	if ($confirmAddQuery) {
		header("Refresh:0; url=../index.php?page=spasiba"); // возврат на главную страницу после успешного выполнения всех запросов
	}

	mysqli_close($connectConfirmOrder);
?>