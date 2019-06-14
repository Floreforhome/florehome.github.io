 <style type="text/css">
      html,body {
        height: 100%;
      }
  </style>
<div class="container">
	
	<?php 
		require_once 'connection.php';
		$connectNewsOpn = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectNewsOpn)); //	подключение к базе данных
	?>

		<?php 
		$queryOpenedNews = "SELECT * FROM statyi";
		$loadOpNews = mysqli_query($connectNewsOpn, $queryOpenedNews); //	 отправка запроса на получение данных

		if ($loadOpNews) {
			$newOpID = (int)$_GET['st_id']; //  получение идентификатора новости

			while ($newsOpnData = mysqli_fetch_array($loadOpNews)) {
				if ($newsOpnData['st_id'] == $newOpID) {
					?>
					<!------------------------------- ВЫВОД НОВОСТИ НАЧАЛО ---------------------------------->
					<div class="row" style="margin-top: 25px">

                <div class="col-md-6">
                    <img style="max-width: 100%; border: 1px solid #fff;box-shadow: 0px 2px 15px rgba(100, 100, 100, 0.7);" src="../img/57.jpg" class="img-responsive" alt=""> 
                </div>
            <div class="col-md-6">
                <span style="font-size:30px; font-weight: 700;"><?php echo $newsOpnData['name']; ?></span>
                <br>
				<div style="margin-top: 50px">
				</div>
                </div>
				<div style="margin-top: 50px;" class="col-md-12">
					<p><span style="font-size: 13pt;font-weight: 400; margin-top: 50px;"><?php echo $newsOpnData['text']; ?></span></p>
				</div>
            </div>
                    <!------------------------------- ВЫВОД НОВОСТИ КОНЕЦ ---------------------------------->
                    <?php
				}
			}
		}
		mysqli_close($connectNewsOpn);
	?>

</div>