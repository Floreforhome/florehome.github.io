 <style type="text/css">
      html,body {
        height: 100%;
      }
  </style>
<div class="container">
<div id="cartHD" style="margin-top: 30px">
    <h1 id="headCart">Ваша корзина:</h1>
</div>
<?php 
  require_once 'connection.php';
  
  $connectCart = mysqli_connect($servername, $username, $password, $database) or die("Error" . mysqli_error($connectCart)); //  подключение к базе данных
  $queryCartLoad = "SELECT * FROM cart";
  $loadCart = mysqli_query($connectCart, $queryCartLoad) or die("Error" . mysqli_error($connectCart)); //  отправка запроса на получение данных

  global $totalCartPrice;
  $cartKey = 0;
     if ($loadCart) {
      while ($cartData = mysqli_fetch_array($loadCart)) {
      //  вывод данных из базы данных начало
      $cartID = $cartData['Items_item_id'];
      $obprice = 0;
      $obprice += ($cartData['it_price'] * $cartData['it_kolvo']);
      ?>
      <div class="container">
  <table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%"></th>
        <th style="width:10%; font-size: 12pt">Цена</th>
        <th style="width:8%; font-size: 12pt">Количество</th>
        <th style="width:22%; font-size: 12pt" class="text-center">Полная стоимость</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-th="Product">
          <div class="row">
            <div class="col-sm-2 hidden-xs"><img src="../img/katalog/<?php echo $cartID?>.jpg" alt="..." style="height: 100px; width: 100px;" class="img-responsive"/></div>
            <div style="margin-left: 50px" class="col-sm-8">
              <h4 class="nomargin"><?php echo $cartData['it_name'];?></h4>
            </div>
          </div>
        </td>
        <td style="font-size: 12pt" data-th="Price"> <?php echo $cartData['it_price'] . " ₽"; ?></td>
        <td style="font-size: 12pt; text-align: center;" data-th="Quantity" >
          <?php echo $cartData['it_kolvo']; ?>
        </td>
        <td style="font-size: 12pt" data-th="Subtotal" class="text-center"><?php echo $obprice . " ₽";  ?></td>
        <td class="actions" data-th="">
           <form action="../scripts/removecart.php" method="POST">
          <input type="submit" name="removeProduct" value="Удалить" class="btn btn-success">
          <input type="hidden" name="removeFromCart" value="<?php echo $cartData['Items_item_id']; ?>">
        </form>
        </td>
      </tr>
    </tbody>
 <?php
      //  вывод данных из базы данных конец
      $totalCartPrice += ($cartData['it_price'] * $cartData['it_kolvo']);
      if ($cartData['cart_id'] != NULL) {
        $cartKey = 1; 
      }
    }
    if ($cartKey != 0) {
      ?>
      <tfoot>
      <tr>
        <td><a href="index.php?page=katalog" class="btn btn-warning"><i class="fa fa-angle-left"></i> Вернуться в магазин</a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td style="font-size: 10pt" class="hidden-xs text-center"><strong> Общая сумма заказа: <span style="font-weight: 600;"><?php echo $totalCartPrice . " ₽"; ?></span></strong></td>
        <td class="hidden-xs"><button id="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success" type="submit">Оформить заказ <i class="fa fa-angle-right"></i></button></td>
        
      </tr>
    </tfoot>
      <?php
    } else {
      ?>
      <div class="container" style="text-align: center;">
        <h2 style="margin-bottom: 50px;" id='cartIsEmpty'>Ваша корзина пуста</h2>
        <svg id="i-cart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="180" height="180" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path d="M6 6 L30 6 27 19 9 19 M27 23 L10 23 5 2 2 2" />
          <circle cx="25" cy="27" r="2" />
          <circle cx="12" cy="27" r="2" />
        </svg>
      </div>
      <?php
    }
  }
  mysqli_close($connectCart);
?>
    </table>
  </div>   
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Оформление заказа</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                  <form id="contactForm" action="../scripts/Zakaz.php" method="post">
                    <div class="form-group">
                        <label for="name">Ваше имя:</label>
                        <input id="name" class="form-control" name="name" required type="text" placeholder="Введите ваше имя">
                    </div>
                    <div class="form-group">
                        <label for="email">Ваш E-mail:</label>
                        <input id="email" class="form-control" name="email" required type="text" placeholder="Введите Email-адрес">
                    </div>
                    <div class="form-group">
                        <label for="phone">Ваш телефон:</label>
                        <input id="phone" class="form-control" name="phone" required type="text" placeholder="Введите номер телефона">
                    </div>
                    
                    <button id="button" class="btn btn-success" type="submit">Оформить заказ</button>
                    <div class="result">
                        <span id="answer"></span>
                        <span id="loader" style="display:none"><img src="images/loader.gif" alt=""></span>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>

