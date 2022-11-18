<?php
session_start();
$mail = $_POST['mail'];
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
//指定したハッシュがパスワードにマッチしているかチェック
if (password_verify($_POST['pass'], $member['pass'])) {
    //DBのユーザー情報をセッションに保存
    $_SESSION['id'] = $member['id'];
    $_SESSION['name'] = $member['nam'];
    $_SESSION['pass'] = $_POST['pass'];
    $msg = 'ログインしました。';
    $link = '<META http-equiv="Refresh" content="3;URL=index.php">';
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login_form.php">戻る</a>';
}
?>

<h1><?php echo $msg; ?></h1>
<?php echo $link;