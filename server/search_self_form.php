<html lang="ja">
<link rel="stylesheet" href="search_self_form.css">
<body>
    <div id="form">
    <h3>同じ肌質の人の投稿一覧</h3>
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

    $sql = "SELECT COUNT(*) FROM images";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    
    $sql = "SELECT skn_type FROM details WHERE details_id = '".$id."'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $type = $stmt->fetch();
    $sql = "SELECT * FROM images WHERE skn_type = '".$type[0]."' AND NOT (details_id = '".$id."')";
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
        <?php
    }
    if(empty($comment)){
            ?><a>投稿が見つかりません。</a><?php
    }
    ?>
    </div>
</body>
</html>