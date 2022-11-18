<html lang="ja">
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
    
    $sql = "SELECT * FROM images WHERE details_id = '".$id."'";
    $query = $dbh->prepare($sql);
    $query->execute();
    if( $row > 0){
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $imageURL = 'uploads/'.$row["file_name"];
    ?>
        <img src="<?php echo $imageURL; ?>" alt="" />
    <?php }
    }else{ ?>
       
    <p>画像が見つからず表示されません..</p>
    <?php } ?>
</html>