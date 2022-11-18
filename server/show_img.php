
    <?php
$dsn = "mysql:host=localhost; dbname=mydb; charset=utf8";
$username = "selfusr";
$password = "1234";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $msg = $e->getMessage();
}

    // データベースから画像を取得する
    $query = "SELECT * FROM images ORDER BY uploaded_on DESC";

    if($query->num_rows > 0){
        while($row = $query->fetch_assoc()){
            $imageURL = 'uploads/'.$row["file_name"];
    ?>
        <img src="<?php echo $imageURL; ?>" alt="" />
    <?php }
    }else{ ?>
        <p>画像が見つからず表示されません..
        </p>
    <?php } ?>
    </div>
    </body>
</html>