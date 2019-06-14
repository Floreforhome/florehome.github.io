<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../img/1.jpg" alt="Первый слайд">
      	<div class="carousel-caption d-none d-md-block">
		    <h3><strong  style="font-size: 28pt; font-weight: 600; font: Arial, sans-serif;
    text-shadow: black 0 0 30px;">Интернет магазин "Флора для Дома"</strong></h3>
		    <p><strong  style="font-size: 12pt; font-weight: 500; font: Arial, sans-serif;
    text-shadow: black 0 0 30px;">Всегда только самые свежие цветы!</strong></p>
  		</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/2.jpg" alt="Второй слайд">
      	<div class="carousel-caption d-none d-md-block">
		    <h3><strong  style="font-size: 28pt; font-weight: 600; font: Arial, sans-serif;
    text-shadow: black 0 0 30px;">Интернет магазин "Флора для Дома"</strong></h3>
		    <p><strong  style="font-size: 12pt; font-weight: 500; font: Arial, sans-serif;
    text-shadow: black 0 0 30px;">Всегда только самые свежие цветы!</strong></p>
 		</div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../img/3.jpg" alt="Третий слайд">
	    <div class="carousel-caption d-none d-md-block">
		   <h3><strong  style="font-size: 28pt; font-weight: 600; font: Arial, sans-serif;
    text-shadow: black 0 0 30px;">Интернет магазин "Флора для Дома"</strong></h3>
		    <p><strong  style="font-size: 12pt; font-weight: 500; font: Arial, sans-serif;
    text-shadow: black 0 0 30px;">Всегда только самые свежие цветы!</strong></p>
	  	</div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php 
	require_once 'connection.php';
	$connectkatalog = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectkatalog)); //	подключение к базе данных
?>


<div class="container">
	<div class="card text-white bg-secondary my-5 py-4 text-center" style="background-color:white!important; border: hidden;">
      <div class="card-body">
        <p class="text-white m-0" style="font-size: 14pt; color: black!important;">Актуальные новости на сегодняшний день</p>
      </div>
    </div>

    <?php 
    require_once 'connection.php';
    $connectNews = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectNews)); //    подключение к базе данных
    $queryNewsLoad = "SELECT * FROM news";
    $loadNews = mysqli_query($connectNews, $queryNewsLoad) or die("Error" . mysqli_error($connectNews)); //  отправка запроса на получение данных
    if ($loadNews) {
        while ($newsData = mysqli_fetch_array($loadNews)) {
            //  вывод данных из базы данных начало
            echo "<div id='news-card' class='card'>";
            echo "<div class='card-header'>".$newsData['date']."</div>";
            echo "<div class='card-body'>";
            echo "<h4 style='font-size: 13pt; font-weight:600; color:black; class='card-title'>".$newsData['title']."</h4>";
            echo "<p style='font-size: 10pt; font-weight:500; color:black; class='card-text'>".$newsData['text']."</p>";
           ?> <a href="index.php?page=opennews&<?php echo "news_id=" . $newsData['news_id']; ?>" class="btn btn-primary"> Подробнее </a>
           <?php  
            echo "</div>";
            echo "</div>";
        }
    }
    mysqli_close($connectNews);
?>


	<div style="margin-top: 25px" >
	<h1>Популярные товары</h1>
	</div>
	<hr>

	<div class="row">
		<?php 
			$katalogLoad = "SELECT * FROM items";

			$loadkatalog = mysqli_query($connectkatalog, $katalogLoad) or die("Error" . mysqli_error($connectkatalog)); //	 отправка запроса на получение данных
			if ($loadkatalog) {

				$itemKey = 1; //  ключ для проверки соответствия данных
				while ($katalogDataLoad = mysqli_fetch_array($loadkatalog)) {

					if ($katalogDataLoad['sklad_id'] == $itemKey) {
						if($katalogDataLoad['populyar'] >= 30){
						
							//  вывод товаров из базы дынных начало
							echo "<div class='col-sm-4 mb-3 mb-md-4'>";
							echo "<div class='card'>";
			                echo "<a href='index.php?page=tovarpod&sklad_id=$itemKey'><img class='card-img-top' src='../img/katalog/$itemKey.jpg' alt='Card image cap'></a>";
			                echo "<div class='card-body'>";
			                echo "<h5 style='font-size: 14pt; font-weight:600; color:black; class='card-title'>".$katalogDataLoad['name'] ."</h5>";
			                echo "<p style='font-size: 10pt; font-weight:500; color:black;' class='card-text'>".$katalogDataLoad['description']."</p>";
			                echo "<p style='font-size: 18pt; font-weight:600; color: green;' class='card-text'>". $katalogDataLoad['price']." Руб.</p>";
			                ?>
			               
			               <a class='btn btn-primary' style="bottom: 0;" href="index.php?page=tovarpod&<?php echo "sklad_id=" . $itemKey; ?>">Подробнее</a>
			               <?php
			                echo "</div>";
			                echo "</div>";
			                echo "</div>";

			                //  вывод товаров из базы дынных конец
						}
					}
					$itemKey++;
				}
			}
			mysqli_close($connectkatalog);
		?>
	</div>
</div>
