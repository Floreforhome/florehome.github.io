  <style type="text/css">
      html,body {
        height: 100%;
      }
  </style>
  <div class="container">
  <h1 style="margin-top: 25px">Новости сайта</h1>
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
</div>