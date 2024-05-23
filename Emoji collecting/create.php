<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emoji";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Emoji</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

<div class="container">
    <h1>Add New Emoji</h1>
    
    <form method="post" action="index.php">
        <select name="emoji" id="emoji">
        <option value="😀">😀</option>
            <option value="😃">😃</option>
            <option value="😄">😄</option>
            <option value="😁">😁</option>
            <option value="😆">😆</option>
            <option value="😅">😅</option>
            <option value="😂">😂</option>
            <option value="🤣">🤣</option>
            <option value="😊">😊</option>
            <option value="😇">😇</option>
            <option value="🙂">🙂</option>
            <option value="🙃">🙃</option>
            <option value="😉">😉</option>
            <option value="😌">😌</option>
            <option value="😍">😍</option>
            <option value="🥰">🥰</option>
            <option value="😘">😘</option>
            <option value="😗">😗</option>
            <option value="😙">😙</option>
            <option value="😚">😚</option>
            <option value="😋">😋</option>
            <option value="😛">😛</option>
            <option value="😝">😝</option>
            <option value="😜">😜</option>
            <option value="🤪">🤪</option>
            <option value="🤨">🤨</option>
            <option value="🧐">🧐</option>
            <option value="🤓">🤓</option>
            <option value="😎">😎</option>
            <option value="🥸">🥸</option>
            <option value="🤩">🤩</option>
            <option value="😏">😏</option>
            <option value="😒">😒</option>
            <option value="😞">😞</option>
            <option value="😔">😔</option>
            <option value="😟">😟</option>
            <option value="😕">😕</option>
            <option value="🙁">🙁</option>
            <option value="☹️">☹️</option>
            <option value="😣">😣</option>
            <option value="😖">😖</option>
            <option value="😫">😫</option>
            <option value="😩">😩</option>
            <option value="🥺">🥺</option>
            <option value="😢">😢</option>
            <option value="😭">😭</option>
            <option value="😤">😤</option>
            <option value="😠">😠</option>
            <option value="😡">😡</option>
            <option value="🤬">🤬</option>
            <option value="🤯">🤯</option>
            <option value="😳">😳</option>
            <option value="🥵">🥵</option>
            <option value="🥶">🥶</option>
            <option value="😱">😱</option>
            <option value="😨">😨</option>
            <option value="😰">😰</option>
            <option value="😥">😥</option>
            <option value="😓">😓</option>
            <option value="🤗">🤗</option>
            <option value="🤔">🤔</option>
            <option value="🤭">🤭</option>
            <option value="🤫">🤫</option>
            <option value="🤥">🤥</option>
            <option value="😶">😶</option>
            <option value="😐">😐</option>
            <option value="😑">😑</option>
            <option value="😬">😬</option>
            <option value="🙄">🙄</option>
            <option value="😯">😯</option>
            <option value="😦">😦</option>
            <option value="😧">😧</option>
            <option value="😮">😮</option>
            <option value="😲">😲</option>
            <option value="🥱">🥱</option>
            <option value="😴">😴</option>
            <option value="🤤">🤤</option>
            <option value="😪">😪</option>
            <option value="😵">😵</option>
            <option value="🤐">🤐</option>
            <option value="🥴">🥴</option>
            <option value="🤢">🤢</option>
            <option value="🤮">🤮</option>
            <option value="🤧">🤧</option>
            <option value="😷">😷</option>
            <option value="🤒">🤒</option>
            <option value="🤕">🤕</option>
            <option value="🤑">🤑</option>
            <option value="🤠">🤠</option>
            <option value="👽">👽</option>
            <option value="👾">👾</option>
            <option value="🤖">🤖</option>
            <option value="🎃">🎃</option>
            <option value="😺">😺</option>
            <option value="😸">😸</option>
            <option value="😹">😹</option>
            <option value="😻">😻</option>
            <option value="😼">😼</option>
            <option value="😽">😽</option>
            <option value="🙀">🙀</option>
            <option value="😿">😿</option>
            <option value="😾">😾</option>        </select>
        <input type="text" name="emoji_id" placeholder="Enter ID for the emoji">
        <input type="text" name="emoji_name" placeholder="Enter name for the emoji">
        <div class="selected-emoji"></div>
        <input type="submit" value="Add Emoji" class="add-btn add-btn-center">
    </form>
</div>

<style>
  <?php include "style.css" ?>
</style>

</body>
</html>

<?php
$conn = null;
?>





































































