 <style type="text/css">
      html,body {
        height: 100%;
      }
  </style>
<div class="container">
	<div class="row">
 <div id="cont">
	<h5> Форма для связи </h5>
	<form action="../scripts/obsvyaz.php" method="post"  autocomplete="on">
		<p style="font-size: 13pt"> <label for="username" class="iconic user" > Имя <span class="required">*</span></label> <input style="width: 100%;" type="text" name="username" id="username"  required="required" placeholder="Ваше имя"  /> </p>
 
		<p style="font-size: 13pt"> <label for="usermail" class="iconic mail-alt"> E-mail адрес <span class="required">*</span></label> <input style="width: 100%;" type="email" name="usermail" id="usermail" placeholder="Ваш Email-адрес" required="required"  /> </p>
 
 
		<p style="font-size: 13pt"> <label for="subject" class="iconic quote-alt"> Номер телефона </label> <input style="width: 100%;" type="text" name="subject" id="subject"  placeholder="Ваш номер телефона" /> </p>
 
		<p style="font-size: 13pt"> <label for="message" class="iconic comment"> Сообщение  <span class="required">*</span></label> <textarea name="text" style="width: 100%;" placeholder="Введите сообщение"  required="required" ></textarea> </p>
 
		<p style="font-size: 13pt" class="indication"> Все поля со <span class="required">*</span> должны быть заполнены.</p>
 
		<input class='btn btn-primary' style="width: 100%;" type="submit" value="Отправить сообщение!" />      
	</form>                             
</div>
</div></div>