<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emoji";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["name"])) {
        $id = $_POST["id"];
        $name = $_POST["name"];

        $update_sql = "UPDATE emoji_naam SET naam = :name WHERE id = :id";
        $stmt = $conn->prepare($update_sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "Record updated successfully";
            header("Location: index.php");
            exit;
        } else {
            echo "Error updating record";
        }
    }

    $id = $_GET["id"] ?? null;
    if ($id !== null) {
        $select_sql = "SELECT id, naam FROM emoji_naam WHERE id = :id";
        $stmt = $conn->prepare($select_sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $emoji_id = $result["id"];
            $emoji_name = $result["naam"];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Emoji</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

<div class="container">
    <h1>Edit Emoji</h1>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $emoji_id; ?>">
        <input type="text" name="name" value="<?php echo $emoji_name; ?>">
        <input type="submit" value="Save Changes" class="add-btn add-btn-center">
    </form>
</div>


<style>
  <?php include "style.css" ?>
</style>


</body>
</html>

<?php
        } else {
            echo "No emoji found with ID: $id";
        }
    } else {
        echo "No ID specified";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$conn = null;
?>
