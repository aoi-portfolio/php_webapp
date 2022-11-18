<?php
$dsn = "mysql:host=localhost; dbname=mydb; charset=utf8";
$username = "selfusr";
$password = "1234";
try {
    $dbh = new PDO($dsn, $username, $password);
    $dbh->query("set names utf8");
} catch (PDOException $e) {
    $msg = $e->getMessage();
}
session_start();
$dtls = $_SESSION['id'];

$sql = "SELECT skn_type FROM details WHERE details_id = $dtls";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$skn_type = $stmt->fetch(PDO::FETCH_ASSOC);

$comment = $_POST['text'];
// ファイルのアップロード先
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // 特定のファイル形式の許可
    $allowTypes = array('jpg','png','jpeg','gif','pdf','JPG');
    if(in_array($fileType, $allowTypes)){
        // サーバーにファイルをアップロード
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // データベースに画像ファイル名を挿入
            $insert = "INSERT INTO images(file_name, uploaded_on, details_id, comment, skn_type) VALUES ('".$fileName."', NOW(), '".$dtls."', '".$comment."','".$skn_type['skn_type']."')";
            if($insert){
                $stmt = $dbh->prepare($insert);
                $stmt->execute();
                $statusMsg = "投稿されました";
            }else{
                $statusMsg = "ファイルのアップロードに失敗しました、もう一度お試しください";
            } 
        }else{
            $statusMsg = "申し訳ありませんが、ファイルのアップロードに失敗しました";
        }
    }else{$statusMsg = '申し訳ありませんが、アップロード可能なファイル（形式）は、JPG、JPEG、PNG、GIF、PDFのみです';
    }
}else{
    $statusMsg = 'アップロードするファイルを選択してください';
}

// ステータスメッセージを表示
?>
<h1>投稿</h1>
<?php echo $statusMsg; ?>
<a href="index.php">ホームへ</a>