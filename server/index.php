<?php
session_start();
$username = $_SESSION['name'];
$id = $_SESSION['id'];

if (isset($_SESSION['id'])) {//ログインしているとき
    $msg = 'こんにちは' . htmlspecialchars($username, \ENT_QUOTES, 'UTF-8') . 'さん';
    $link = '<a class="logout" href="logout.php">ログアウト</a>';
    $link_post = '<a class="btn btn-border-shadow btn-border-shadow--radius left" href="upload_form.php">投稿する</a>';
    $link_search = '<a class="btn btn-border-shadow btn-border-shadow--radius right" href="search_self_form.php">肌質が同じユーザーの投稿を検索する</a>';
    $link_show = '<a class="btn btn-border-shadow btn-border-shadow--radius under" href="self_form.php">自分の投稿を見る</a>';
     echo $link;
     echo $link_post;
     echo $link_search;
     echo $link_show;

} else {//ログインしていない時
    $msg = 'ログインしていません';
    $link = '<a class="login" href="login_form.php">Log In</a>';
    echo $link;
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="index.css">

<h1><?php echo $msg; ?></h1>
</html>
