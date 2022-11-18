<!DOCTYPE html>
<form action="question.php" method="post">
<link rel="stylesheet" href="question.css">
<script type="text/javascript" src="question.js"></script>
<div class="container">
    <h2>自分の肌質について答えてください。</h2>
    <h3>性別</h3>
    <group class="inline-radio">
    <div><input type="radio" name="sex" value=1 required><label>男性</label></div>
    <div><input type="radio" name="sex" value=2 required><label>女性</label></div>
    </group>
    <h3>肌の乾燥は気になりますか</h3>
    <group class="inline-radio">
    <div><input type="radio" name="dry" value=1 required><label>気になる</label></div>
    <div><input type="radio" name="dry" value=2 required><label>気にならない</label></div>
    </group>
    <h3>日中の肌のてかりが気になりますか</h3>
    <group class="inline-radio">
    <div><input type="radio" name="oily" value=1 required><label>気になる</label></div>
    <div><input type="radio" name="oily" value=2 required><label>気にならない</label></div>
    </group>
    <h3>にきびができやすいですか</h3>
    <group class="inline-radio">
    <div><input type="radio" name="acne" value=1 required><label>できにくい</label></div>
    <div><input type="radio" name="acne" value=2 required><label>できやすい</label></div>
    </group>
    <h3>肌の色見が気になりますか</h3>
    <group class="inline-radio">
    <div><input type="radio" name="skinclr" value=1 required><label>気になる</label></div>
    <div><input type="radio" name="skinclr" value=2 required><label>気にならない</label></div>
</group>
<group class="inline-radio">
    <div><input type="submit"><label>送信</lebel></div>
</group>    
</div>
</form>
</html>