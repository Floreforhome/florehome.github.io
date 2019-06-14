 <style type="text/css">
      html,body {
        height: 100%;
      }
  </style>
<div class="container">
<div style="margin-top: 10px">
    <h1>Хвойные: </h1>
</div>
<hr>

<?php 
    require_once 'connection.php';
    $connectkatalog = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectkatalog)); //  подключение к базе данных
?>
<div class="row">
    <?php 
        $typ_tovar=""; 
        $typ_tovar= $katalogDataLoad['type'];
        $katalogLoad = "SELECT * FROM items";

        $loadkatalog = mysqli_query($connectkatalog, $katalogLoad) or die("Error" . mysqli_error($connectkatalog)); //   отправка запроса на получение данных

        if ($loadkatalog) {

            $itemKey = 1; //  ключ для проверки соответствия данных
            while ($katalogDataLoad = mysqli_fetch_array($loadkatalog)) {

                if ($katalogDataLoad['sklad_id'] == $itemKey) {
                        if ($katalogDataLoad['type'] == 'Хвойное') {
                        //  вывод товаров из базы дынных начало
                            echo "<div class='col-sm-4 mb-3 mb-md-4' >";
                            echo "<div class='card' id='card-katalog'>";
                            echo "<a href='index.php?page=tovarpod&sklad_id=$itemKey'><img class='card-img-top' src='../img/katalog/$itemKey.jpg' alt='Card image cap'></a>";
                            echo "<div class='card-body'>";
                            echo "<h5 style='font-size: 14pt; font-weight:600; color:black; class='card-title'>".$katalogDataLoad['name'] ."</h5>";
                            echo "<p style='font-size: 10pt; font-weight:500; color:black;' class='card-text'>".$katalogDataLoad['description']."</p>";
                            echo "<p style='font-size: 18pt; font-weight:600; color: green;' class='card-text'>". $katalogDataLoad['price']." Руб.</p>";
                        
                        echo "</div>";
                        ?><div class="container" style="text-align: right; margin-bottom: 10px;"> <a class='btn btn-primary' style="bottom: 0;" href="index.php?page=tovarpod&<?php echo "sklad_id=" . $itemKey; ?>">Подробнее</a></div><?
                        echo "</div>";
                        echo "</div>";

                        //  вывод товаров из базы дынных конец
                }
                $itemKey++;
            }
        }
    }
        mysqli_close($connectkatalog);
                ?>

</div>
</div>