<?php
session_start();
$ID = $_SESSION['id'];
$name = $_SESSION['name'];
if (isset($_SESSION['id'])) {//ログインしているとき
    $msg = htmlspecialchars($name, \ENT_QUOTES, 'UTF-8') . 'さん';
    $sex = $_POST['sex'];
    $dry = $_POST['dry'];
    $oily = $_POST['oily'];
    $acne = $_POST['acne'];
    $skinclr = $_POST['skinclr'];
    
    
    $dsn = "mysql:host=localhost; dbname=mydb; charset=utf8";
    $username = "selfusr";
    $password = "1234";
    
    try {
        $dbh = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $msg = $e->getMessage();
    }
    
        //登録されていなければinsert 
        $sql = "INSERT INTO details(details_id, sex, dry, oily, acne, skinclr,skn_type) VALUE (:details_id, :sex, :dry, :oily, :acne, :skinclr, :skn_type)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':details_id', $ID);
        $stmt->bindValue(':sex', $sex);
        $stmt->bindValue(':dry', $dry);
        $stmt->bindValue(':oily', $oily);
        $stmt->bindValue(':acne', $acne);
        $stmt->bindValue(':skinclr', $skinclr);
    
        if($sex == 1 && $dry == 1 && $oily == 1 && $acne == 1){
            $skn_type = 1;
        }elseif($sex == 1 && $dry == 1 && $oily == 1 && $acne == 2){
            $skn_type = 2;
        }elseif($sex == 1 && $dry == 1 && $oily == 2 && $acne == 1){
            $skn_type = 3;
        }elseif($sex == 1 && $dry == 1 && $oily == 2 && $acne == 2){
            $skn_type = 4;
        }elseif($sex == 1 && $dry == 2 && $oily == 1 && $acne == 1){
            $skn_type = 5;
        }elseif($sex == 1 && $dry == 2 && $oily == 1 && $acne == 2){
            $skn_type = 6;
        }elseif($sex == 1 && $dry == 2 && $oily == 2 && $acne == 1){
            $skn_type = 7;
        }elseif($sex == 1 && $dry == 2 && $oily == 2 && $acne == 2){
            $skn_type = 8;
        }elseif($sex == 2 && $dry == 1 && $oily == 1 && $acne == 1){
            $skn_type = 9;
        }elseif($sex == 2 && $dry == 1 && $oily == 1 && $acne == 2){
            $skn_type = 10;
        }elseif($sex == 2 && $dry == 1 && $oily == 2 && $acne == 1){
            $skn_type = 11;
        }elseif($sex == 2 && $dry == 1 && $oily == 2 && $acne == 2){
            $skn_type = 12;
        }elseif($sex == 2 && $dry == 2 && $oily == 1 && $acne == 1){
            $skn_type = 13;
        }elseif($sex == 2 && $dry == 2 && $oily == 1 && $acne == 2){
            $skn_type = 14;
        }elseif($sex == 2 && $dry == 2 && $oily == 2 && $acne == 1){
            $skn_type = 15;
        }elseif($sex == 2 && $dry == 2 && $oily == 2 && $acne == 2){
            $skn_type = 16;
        } 
        
        $stmt->bindValue(':skn_type', $skn_type);
        $stmt->execute();
        $msg_qst = '登録が完了しました';
        $link = '<a href="index.php">ホーム</a>';

} else {
  $msg = 'エラー';
}    

?>
<h1>いらっしゃいませ<?php echo $msg; ?></h1>
<h1><?php echo $msg_qst; ?></h1><!--メッセージの出力-->
<?php echo $link; ?>
