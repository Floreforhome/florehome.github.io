<?php 
    require_once 'connection.php';
    $connectOP = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectOP)); //  подключение к базе данных
?>

<div>
    <?php
    $typ_tovar=""; 
        $queryOpenProduct = "SELECT * FROM items";
        $openProduct = mysqli_query($connectOP, $queryOpenProduct) or die("Ошибка " . mysqli_error($connectOP)); //  отправка запроса на получение данных

        if ($openProduct) {
            $itemKey = 1;
            $opID = (int)$_GET['sklad_id']; //  получение идентификатора продукта

            while ($openData = mysqli_fetch_array($openProduct)) {
                if ($openData['sklad_id'] == $opID) {
                    ?>
                    <div class="row" style="margin-top: 25px">

                <div class="col-md-6">
                    <img style="max-width: 100%; border: 1px solid #fff;box-shadow: 0px 2px 15px rgba(100, 100, 100, 0.7);" src="../img/katalog/<?php echo $opID?>.jpg" class="img-responsive" alt=""> 
                </div>
            <div class="col-md-6">
                <span style="font-size:30px; font-weight: 700;"><?php echo $openData['name']; ?></span>
                <br>
                <span style="font-size:25px; font-weight: 700;"><?php echo $openData['price'];?></span><span style="font-size:18px;"> Руб.</span>
                    <p><span style="font-weight: 500;"><?php echo $openData['type']; ?></span></p>

                    <p><span style="font-size:15px; font-weight: 400;"><?php echo $openData['full_description']; ?></span></p>

                    <p></p>

                    <p></p>
                </div>
            </div>
                    <!------------------------------- ВЫВОД ДАННЫХ О ПРОДУКТЕ НАЧАЛО ---------------------------------->
                    <div class="row" style="margin-bottom: 25px">
                    <div class="col-md-9"> 
                    </div>
                    <div class="col-md-3">
                        <form action="../scripts/addCart.php" method="POST">
                        <input type="hidden" name="currentProduct" value="<?php echo $opID; ?>">
                        <p style="font-size: 14pt"> Введите количество товара: </p>
                        <input style="width: 200px" type="number" name="productCount" value="1" class="currentProductCount">
                        <input name="addProductInCart" type="submit" value="Добавить в корзину" class="btn btn-primary">
                        </form>
                        
                    </div>
                     </div>
                     <div class="container">
                        <div style="margin-top: 25px" >
                        <h1>Похожие товары</h1>
                        </div></div>
                        <hr>

                     <!------------------------------- ВЫВОД ДАННЫХ О ПРОДУКТЕ КОНЕЦ ---------------------------------->
                     <div class="row">

                    <?php
                    $typ_tovar= $openData['type'];
                }
            }
        }


            $katalogLoad = "SELECT * FROM items";
            $loadkatalog = mysqli_query($connectOP, $katalogLoad) or die("Error" . mysqli_error($connectOP)); //   отправка запроса на получение данных
            if ($loadkatalog) {
                $itemKey = 1; //  ключ для проверки соответствия данных
                while ($katalogDataLoad = mysqli_fetch_array($loadkatalog)) {

                    if ($katalogDataLoad['sklad_id'] == $itemKey) {

                        if ($katalogDataLoad['type'] == $typ_tovar) {
                            //  вывод товаров из базы дынных начало
                            echo "<div class='col-sm-4 mb-3 mb-md-4'>";
                            echo "<div class='card'>";
                            echo "<a href='index.php?page=product&id=$itemKey'><img class='card-img-top' src='../img/katalog/$itemKey.jpg' alt='Card image cap'></a>";
                            echo "<div class='card-body'>";
                            echo "<h5 style='font-size: 14pt; font-weight:600; color:black; class='card-title'>".$katalogDataLoad['name'] ."</h5>";
                            echo "<p style='font-size: 10pt; font-weight:500; color:black;' class='card-text'>".$katalogDataLoad['description']."</p>";
                            echo "<p style='font-size: 18pt; font-weight:600; color: green;' class='card-text'>". $katalogDataLoad['price']." Руб.</p>";
                            ?>
                            <a class='btn btn-primary' href="index.php?page=tovarpod&<?php echo "sklad_id=" . $itemKey; ?>">Подробнее</a>

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
            mysqli_close($connectOP);
        ?>
        
</div>


</div>








