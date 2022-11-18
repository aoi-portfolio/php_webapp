<!DOCTYPE html>
<head>
<form action="upload.php" method="post" enctype="multipart/form-data">
<link rel="stylesheet" href="upload.css">
</head>
<body>
<div id="formWrapper">
<div id="form">
<p class="title">投稿</p>
<p>コメント</p>
<textarea name="text" rows="5" cols="48" wrap="soft"></textarea>
<label>
<input class="input-file" id="file01" type="file" name="file">画像を追加
</label>
<p class="js-file01">選択されていません。</p>
<input type="submit" name="submit" value="Upload">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="upload.js"></script>
</div>
</div>
</form>
</html>