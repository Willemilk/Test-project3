<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emoji";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
        $delete_id = $_POST["delete"];
        $delete_sql = "DELETE FROM emoji_naam WHERE id = :delete_id";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bindParam(":delete_id", $delete_id);
        if ($stmt->execute()) {
            echo "Emoji deleted successfully";
        } else {
            echo "Error deleting emoji";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["emoji_id"]) && isset($_POST["emoji_name"])) {
        $emoji_id = $_POST["emoji_id"];
        $emoji_name = $_POST["emoji_name"];
        $insert_sql = "INSERT INTO emoji_naam (id, naam) VALUES (:emoji_id, :emoji_name)";
        $stmt = $conn->prepare($insert_sql);
        $stmt->bindParam(":emoji_id", $emoji_id);
        $stmt->bindParam(":emoji_name", $emoji_name);
        if ($stmt->execute()) {
            echo "New emoji added successfully";
        } else {
            echo "Error adding emoji";
        }
    }
    
    $select_sql = "SELECT id, naam FROM emoji_naam";
    $result = $conn->query($select_sql);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emoji Collecting Game</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

<div class="navbar">
    <div class="logo">Emoji Game</div>
    <div class="menu">
    <a href="about.php">About</a>
    <a href="index.php">Home</a>
    </div>
</div>

<div class="container">
    <h1>Emoji Collecting Game</h1>
    
    <button onclick="location.href='create.php';" class="add-btn">Voeg een nieuwe emoji toe</button>

    <ul class="emojis-list">
        <?php
        if ($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<li class='emoji-item'>";
                echo "ID: " . $row["id"] . " - Naam: " . html_entity_decode($row["naam"]);
                echo "<form method='post' action='" . $_SERVER["PHP_SELF"] . "' class='delete-form'>";
                echo "<input type='hidden' name='delete' value='" . $row["id"] . "'>";
                echo "<input type='submit' value='Verwijder' class='delofedit'>";
                echo "</form>";
                echo "<form method='get' action='edit.php' class='edit-form'>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<input type='submit' value='Bewerk' class='delofedit'>";
                echo "</form>";
                echo "</li>";
            }
        } else {
            echo "<li>Geen emoji's gevonden.</li>";
        }
        ?>
    </ul>
</div>

<style>
  <?php include "style.css" ?>
</style>

</body>
</html>

<?php
$conn = null;
?>
