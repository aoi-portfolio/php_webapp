<!DOCTYPE html>
<form action="login.php" method="post">
<link rel="stylesheet" href="login.css">
<script src="https://code.jquery.com/jquery-2.1.0.min.js" ></script>
<script type="text/javascript" src="login.js"></script>
<body>
<div id="formWrapper">
<div id="form">
<p class="title">ログイン</p>
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
<p class="pull-left"><a href="signup.php"><small>新規登録</small></a></p>
<input type="submit" class="login pull-right" value="ログイン">
<div class="clear-fix"></div>
</div>
</div>
</div>
</body>
</form>
</html>