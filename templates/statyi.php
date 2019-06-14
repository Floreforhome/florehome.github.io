   <style type="text/css">
      html,body {
        height: 100%;
      }
  </style>
  <div class="container">
	  		<h1 style="margin-top: 25px">Полезные статьи</h1>

			<?php 
		    require_once 'connection.php';
		    $connectst = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectst)); //    подключение к базе данных
		    $querystLoad = "SELECT * FROM statyi";
		    $loadst = mysqli_query($connectst, $querystLoad) or die("Error" . mysqli_error($connectst)); //  отправка запроса на получение данных
		    if ($loadst) {
		        while ($stData = mysqli_fetch_array($loadst)) {
		            //  вывод данных из базы данных начало
		            echo "<div id='news-card' class='card'>";
		            echo "<div style='font-size: 14pt;' class='card-header'>".$stData['name']."</div>";
		            echo "<div class='card-body'>";
		            echo "<h4 style='font-size: 13pt; font-weight:600; color:black; class='card-title'>".$stData['title']."</h4>";
		            echo "<p style='font-size: 10pt; font-weight:500; color:black; class='card-text'>".$stData['text']."</p>";
		           ?> <a href="index.php?page=opstatyi&<?php echo "st_id=" . $stData['st_id']; ?>" class="btn btn-primary"> Подробнее </a>
		           <?php  
		            echo "</div>";
		            echo "</div>";
		        }
		    }
		    mysqli_close($connectst);
		?>

</div>