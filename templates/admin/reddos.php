 <style type="text/css">
      html,body {
        height: 100%;
      }
  </style>
<div style="margin-top: 20px" class="container">
<div>
	<h1 id="manager1bUpdateDelivery">Редактирование записи</h1>
</div>
<div style="margin-bottom: 50px;">
	<a class="btn btn-primary" href="index.php?page=admin-dos">Назад</a>
</div>
<div class="row">
<?php 
	require_once 'connection.php';
	$connectM1BUPD = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectM1BUPD));

	$checkUpdData = (int)$_GET['ds-id'];

	$manageUPDCommand = "SELECT * FROM delivery";
	$manageUPDQuery = mysqli_query($connectM1BUPD, $manageUPDCommand) or die("Ошибка " . mysqli_error($connectM1BUPD));

	if ($manageUPDQuery) {
		while ($checkM1Data = mysqli_fetch_array($manageUPDQuery)) {
			if ($checkM1Data['order_id'] == $checkUpdData) {
				?>
					<div class="mb1CheckTable">
						<table class="table">
							<thead>
							<tr>
								<th>ID заказа</th>
								<th>Названия товаров</th>
								<th>Цена</th>
								<th>Тел. номер</th>
								<th>E-mail</th>
								<th>ФИО</th>
								<th>Адрес</th>
								<th>Индекс</th>
								<th>Дата доставки</th>
								<th>Номер паспорта</th>
								<th>Действия</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td><?php echo $checkM1Data['order_id'];   ?></td>
								<td><?php echo $checkM1Data['names_dev'];  ?></td>
								<td><?php echo $checkM1Data['price_dev'];  ?></td>
								<td><?php echo $checkM1Data['number_dev']; ?></td>
								<td><?php echo $checkM1Data['email_dev'];  ?></td>
								<td><?php echo $checkM1Data['full_name'];  ?></td>
								<td><?php echo $checkM1Data['address'];    ?></td>
								<td><?php echo $checkM1Data['dev_index'];  ?></td>
								<td><?php echo $checkM1Data['date'];       ?></td>
								<td><?php echo $checkM1Data['pass_number'];?></td>
							</tr>
						</tbody>
						</table>
					</div>
				<?php
			}
		}
	}
?>
<h3 id="manager1bUpdateDelivery">Для редактирования записи заполните все поля: </h3>
<div class="container">
	<div class="row">
<div class="col-2"></div>
<div class="col-8">
	<form class="form-group" action="../../scripts/devred.php" method="POST">
		<table align="center" id="manager1bUpdateTable">
			<tr>
				<td><div class="spM1BInput">Введите названия товаров: </div></td>
				<td><input type="text" name="dev_name" class="managerUPDev"></td>
			</tr>
			<tr>
				<td><div class="spM1BInput">Введите цену: </div></td>
				<td><input type="number" name="dev_price" class="managerUPDev"></td>
			</tr>
			<tr>
				<td><div class="spM1BInput">Введите тел.номер: </div></td>
				<td><input type="number" name="dev_phone" class="managerUPDev"></td>
			</tr>
			<tr>
				<td><div class="spM1BInput">Введите почту: </div></td>
				<td><input type="email" name="dev_email" class="managerUPDev"></td>
			</tr>
			<tr>
				<td><div class="spM1BInput">Введите ФИО: </div></td>
				<td><input type="text" name="dev_full_name" class="managerUPDev"></td>
			</tr>
			<tr>
				<td><div class="spM1BInput">Введите адрес: </div></td>
				<td><input type="text" name="dev_address" class="managerUPDev"></td>
			</tr>
			<tr>
				<td><div class="spM1BInput">Введите почтовый индекс: </div></td>
				<td><input type="int" min="111111" max="999999" name="dev_index" class="managerUPDev"></td>
			</tr>
			<tr>
				<td><div class="spM1BInput">Введите дату доставки: </div></td>
				<td><input type="date" name="dev_date" class="managerUPDev"></td>
			</tr>
			<tr>
				<td><div class="spM1BInput">Введите номер паспорта: </div></td>
				<td><input type="number" min="1111111111" max="9999999999" name="dev_pass_num" class="managerUPDev"></td>
			</tr>
			<tr>
				<td><div class="spM1BInput">Подтверждение:</div></td>
				<td><input type="submit" class="btn btn-primary" value="Подтвердить"></td>
			</tr>
		</table>
		<input type="hidden" name="CNOPKA" value="<?php echo $checkUpdData; ?>">
	</form>
</div>
<div class="col-2"></div>
<?php 
	mysqli_close($connectM1BUPD);
?></div></div></div></div>