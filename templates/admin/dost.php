 <style type="text/css">
      html,body {
        height: 100%;
      }
  </style>
<div class="container">
<div id="manager1Welcome">
	<h1 style="margin-top: 20px;">Добро пожаловать на страницу управления заказами.</h1>
</div>

<?php 
	require_once 'connection.php';
	$connectMB = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectMB));
	$manager1command = "SELECT * FROM delivery";
	$manager1query = mysqli_query($connectMB, $manager1command) or die("Error" . mysqli_error($connectMB));
?>
<div class="row">
<div id="manager1ControlPage">
	<div style '= " width: 100%; ">
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
			<?php 
				if ($manager1query) {
					while ($loadDeliveryInfo = mysqli_fetch_array($manager1query)) {
						?>
						<tr>
							<td><?php echo $loadDeliveryInfo['order_id']; ?></td>
							<td><?php echo $loadDeliveryInfo['names_dev']; ?></td>
							<td><?php echo $loadDeliveryInfo['price_dev']; ?></td>
							<td><?php echo $loadDeliveryInfo['number_dev']; ?></td>
							<td><?php echo $loadDeliveryInfo['email_dev']; ?></td>
							<td><?php echo $loadDeliveryInfo['full_name']; ?></td>
							<td><?php echo $loadDeliveryInfo['address']; ?></td>
							<td><?php echo $loadDeliveryInfo['dev_index']; ?></td>
							<td><?php echo $loadDeliveryInfo['date']; ?></td>
							<td><?php echo $loadDeliveryInfo['pass_number'];?></td>
							<td><a href="index.php?page=admin-reddos&ds-id=<?php echo $loadDeliveryInfo['order_id']; ?>" class="btn btn-primary">Редактировать</a></td>
						</tr>
						<?php
					}
				}
			?>
			</tbody>
		</table>
	</div>
</div>

<?php
	mysqli_close($connectMB);
?></div></div>