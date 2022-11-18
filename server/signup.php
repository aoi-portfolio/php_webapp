<?php session_start(); ?>
<!DOCTYPE html>
<form action="register.php" method="post">
<link rel="stylesheet" href="signup.css">
<script src="https://code.jquery.com/jquery-2.1.0.min.js" ></script>
<body>
<script type="text/javascript" src="signup.js"></script>
<div id="formWrapper">
<div id="form">
<p class="title">新規登録</p>
<div class="form-item">
<p class="formLabel">Name</p>
<input type="text" name="name" id="name" class="form-style" autocomplete="off" required />
</div>
<div class="form-item">
<p class="formLabel">Email</p>
<input type="email" name="mail" id="mail" class="form-style" autocomplete="off" required />
</div>
<div class="form-item">
<p class="formLabel">Password</p>
<input type="password" name="pass" id="pass" class="form-style" required />
<!-- <div class="pw-view"><i class="fa fa-eye"></i></div> -->
</div>
<div class="form-item">
<p class="pull-left"><a href="login_form.php"><small>既に登録済みの方はこちら</small></a></p>
<input type="submit" class="register pull-right" value="register">
<div class="clear-fix"></div>
</div>
</div>
</div>
</body>
</form>
</html>