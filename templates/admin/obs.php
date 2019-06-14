 <style type="text/css">
      html,body {
        height: 100%;
      }
  </style>
<div class="container">
	
<h1 style="margin-top: 20px;">Добро пожаловать на страницу управления обратной связью</h1>
<?php 
	require_once 'connection.php';
	$connectAWR = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectAWR));
	$adminAWRCmd = "SELECT * FROM svyaz";
	$adminAWRQuery = mysqli_query($connectAWR, $adminAWRCmd) or die("Error" . mysqli_error($connectAWR));
?>
<div class="row">
<div id="adminWtcRewPage" style="width: 100%;">
	<table class="table">
		<thead>
		<tr>
			<th scope="col">ID сообщения</th>
			<th scope="col">Имя</th>
			<th scope="col">E-mail</th>
			<th scope="col">Телефон</th>
			<th scope="col">Сообщение</th>
		</tr>
		</thead>
		<tbody>
		<?php 
			if ($adminAWRQuery) {
				while ($loadARwData = mysqli_fetch_array($adminAWRQuery)) {
					?>
					<tr>
						<td><?php echo $loadARwData['sv_id']; ?></td>
						<td><?php echo $loadARwData['name']; ?></td>
						<td><?php echo $loadARwData['email']; ?></td>
						<td><?php echo $loadARwData['phone']; ?></td>
						<td><?php echo $loadARwData['message']; ?></td>
					</tr>
					<?php
				}
			}
		?>
		</tbody>
	</table>
</div>
<?php
	mysqli_close($connectAWR);
?>
<br>
<div>
	<a class="btn btn-primary" href="index.php?page=admin">Назад</a>
</div>
</div></div>