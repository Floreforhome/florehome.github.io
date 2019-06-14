 <style type="text/css">
      html,body {
        height: 100%;
      }
  </style>
<?php 
	require_once 'connection.php';
	$connectNewsOpn = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectNewsOpn)); //	подключение к базе данных
?>

<div class="container">
	<?php 
		$queryOpenedNews = "SELECT * FROM news";
		$loadOpNews = mysqli_query($connectNewsOpn, $queryOpenedNews); //	 отправка запроса на получение данных

		if ($loadOpNews) {
			$newOpID = (int)$_GET['news_id']; //  получение идентификатора новости

			while ($newsOpnData = mysqli_fetch_array($loadOpNews)) {
				if ($newsOpnData['news_id'] == $newOpID) {
					?>
					<!------------------------------- ВЫВОД НОВОСТИ НАЧАЛО ---------------------------------->
					<div class="row" style="margin-top: 25px">

                <div class="col-md-6">
                    <img style="max-width: 100%; border: 1px solid #fff;box-shadow: 0px 2px 15px rgba(100, 100, 100, 0.7);" src="../img/57.jpg" class="img-responsive" alt="Утепление балкона с внутренней отделкой пластиковыми панелями. Монтаж эл. теплого пола"> 
                </div>
            <div class="col-md-6">
                <span style="font-size:30px; font-weight: 700;"><?php echo $newsOpnData['title']; ?></span>
                <br>
                <span style="font-size:15px; font-weight: 400;"><?php echo $newsOpnData['date'];?></span>
				<div style="margin-top: 50px">
                <p><span style="font-weight: 500"><?php echo $newsOpnData['text']; ?></span></p>
				</div>
                    

                    <p></p>

                    <p></p>
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