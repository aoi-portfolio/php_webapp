<?php
session_start ();
$name = $_POST['name'];
$_SESSION['name'] = $name;
$mail = $_POST['mail'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$dsn = "mysql:host=localhost; dbname=mydb; charset=utf8";
$username = "selfusr";
$password = "1234";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

$sql = "SELECT * FROM member WHERE mail = :mail";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':mail', $mail);
$stmt->execute();
$member = $stmt->fetch();
if ($member['mail'] == $mail) {
    $msg = '同じメールアドレスが存在します。';
    $link = '<a href="signup.php">戻る</a>';
} else {
    //登録されていなければinsert 
    $sql = "INSERT INTO member(nam, mail, pass) VALUES (:nam, :mail, :pass)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':nam', $name);
    $stmt->bindValue(':mail', $mail);
    $stmt->bindValue(':pass', $pass);
    $stmt->execute();
    $sql = "SELECT id FROM member WHERE mail = :mail";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':mail', $mail);
    $stmt->execute();
    $ID = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['id'] = $ID['id'];
    $msg = '会員登録が完了しました';
    $link = '<a href="question_form.php">次へ</a>';
}

?>
<link rel="stylesheet" href="register.css">
<body>
<div id="formWrapper">
<div id="form">
<p class="title"><?php echo $msg; ?></p><!--メッセージの出力-->
<?php echo $link; ?>
</div>
</div>
</body>