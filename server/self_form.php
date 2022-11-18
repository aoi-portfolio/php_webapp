<html lang="ja">
<link rel="stylesheet" href="search_self_form.css">
<body>
<div id="form">
<?php
    session_start();
    $dsn = "mysql:host=localhost; dbname=mydb; charset=utf8";
    $username = "selfusr";
    $password = "1234";

    try {
        $dbh = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $msg = $e->getMessage();
    }
    
    $id= $_SESSION['id'];

    $sql = "SELECT COUNT(*) FROM images WHERE details_id = '".$id."'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();

    $sql = "SELECT * FROM images WHERE details_id = '".$id."'";
    $query = $dbh->prepare($sql);
    $query->execute();
    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        $comment = $row["comment"]; 
        $imageURL = 'uploads/'.$row["file_name"];
        ?>
        <p>コメント</p>
        <p><?php echo $comment; ?></p>
        <br>
        <p class="resize"><img src="<?php echo $imageURL; ?>" alt="" /></p>
        <br>
    <?php }
    if(empty($comment)) { ?>
    <br>
    <p>まだ投稿がありません......</p>
    <p>初めての投稿をしましょう！</p>
    <a class="upload" href="upload_form.php">投稿する</a>
    <?php } ?>
    </div>
    </body>
    </html>