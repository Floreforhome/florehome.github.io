<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Флора для Дома</title>
        <!-- Font Awesome -->
        <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="../scripts/scripts.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="css/style.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Questrial|Droid+Sans|Alice' rel='stylesheet' type='text/css'>
        <link href="favicon.ico" rel="icon" type="image/x-icon" />

    </head>
    <body>
      <?php
        require_once 'connection.php';
        $connectIndex = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectIndex));

        $indexCommand = "SELECT * FROM cart";
        $indexQuery = mysqli_query($connectIndex, $indexCommand);

        $totalCount = 0;

        if($indexQuery) {
            while ($indexLoad = mysqli_fetch_array($indexQuery)) {
                $totalCount += $indexLoad['it_kolvo'];
            }
        }
      ?>
      <nav id="nead" class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
          <a style="font-size: 16pt" class="navbar-brand" href="index.php?page=glavnaya">Флора для Дома</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto" style="font-size: 12pt">
              <li class="nav-item">
                <a class="nav-link waves-effect" href="index.php?page=glavnaya">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link waves-effect" href="index.php?page=katalog">Каталог</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории товаров</a>
                <div style="background-color: #048027" class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a style="background-color: #048950; color:white; font-size: 11pt" class="dropdown-item" href="index.php?page=kaktus">Кактусы</a>
                  <a style="background-color: #048950; color:white; font-size: 11pt" class="dropdown-item" href="index.php?page=xvoy">Хвойные</a>
                  <a style="background-color: #048950; color:white; font-size: 11pt" class="dropdown-item" href="index.php?page=sukkulent">Суккуленты</a>
                  <a style="background-color: #048950; color:white; font-size: 11pt" class="dropdown-item" href="index.php?page=cvet">Цветущие</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=news">Новости</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=statyi">Статьи</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=aboutus">О нас</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=send">Обратная связь</a>
              </li>
            </ul>
            <ul class="navbar-nav nav-flex-icons">
              <li class="nav-item">
                <a href="index.php?page=cart" class="nav-link waves-effect">
                  <span class="badge red z-depth-1 mr-1"><?php echo $totalCount;?></span>
                  <i class="fa fa-shopping-cart"></i>
                  <span class="clearfix d-none d-sm-inline-block">Корзина</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>

<div class="wrap">
          <?php 
                $page = $_GET['page'];
                if (!isset($page)) {
                  require('templates/glavnaya.php');
                } elseif ($page == 'news') {
                  require('templates/news.php');
                } elseif ($page == 'aboutus') {
                  require('templates/aboutus.php');
                } elseif ($page == 'cart') {
                  require('templates/cart.php');
                } elseif ($page == 'katalog') {
                  require('templates/katalog.php');
                } elseif ($page == 'tovarpod') {
                  require('templates/tovarpod.php');
                } elseif ($page == 'login') {
                  require('templates/login');
                } elseif ($page == 'glavnaya')  {
                  require('templates/glavnaya.php');
                } elseif ($page == 'opennews')  {
                  require('templates/opennews.php');
                } elseif ($page == 'cart') {
                  require('templates/cart.php');
                } elseif ($page == 'send') {
                  require('templates/send.php');
                } elseif ($page == 'admin') {
                  require ('templates/admin/admin-cnopki.php');
                } elseif ($page == 'admin-obs') {
                  require ('templates/admin/obs.php');
                } elseif ($page == 'admin-dos') {
                  require ('templates/admin/dost.php');
                } elseif ($page == 'admin-reddos') {
                  require ('templates/admin/reddos.php');
                } elseif ($page == 'spasiba') {
                  require ('templates/spasiba.php');
                } elseif ($page == 'opstatyi') {
                  require ('templates/opstatyi.php');
                } elseif ($page == 'statyi') {
                  require ('templates/statyi.php');
                }elseif ($page == 'obspasiba') {
                  require ('templates/obspasiba.php');
                }elseif ($page == 'kaktus') {
                  require ('templates/katalog-type-kaktus.php');
                }elseif ($page == 'xvoy') {
                  require ('templates/katalog-type-xvoy.php');
                }elseif ($page == 'sukkulent') {
                  require ('templates/katalog-type-sukkul.php');
                }elseif ($page == 'cvet') {
                  require ('templates/katalog-type-cvet.php');
                }
              ?>

<!-- Footer -->
<footer class="footer">
  <footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h4 class="text-uppercase">Цветочный магазин "Флора для дома"</h4>
        <p>Всегда самые лучшие цветы в вашем городе!</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h4 class="text-uppercase"></h4>

        <ul class="list-unstyled">
          <li>
            <a href="#!"></a>
          </li>
          <li>
            <a href="#!"></a>
          </li>
          <li>
            <a href="#!"></a>
          </li>
          <li>
            <a href="#!"></a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h4 class="text-uppercase">Ссылки</h4>

        <ul class="list-unstyled">
          <li>
            <a href="index.php?page=glavnaya">Главная</a>
          </li>
          <li>
            <a href="#!">Новости</a>
          </li>
          <li>
            <a href="#!">Каталог</a>
          </li>
          <li>
            <a href="#!">О нас</a>
          </li>
          <li>
            <a href="index.php?page=send">Обратная связь</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019г:
    <a href="#">Flowersforhome</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</footer>

<!-- Footer -->




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</div>
    </body>
</html>