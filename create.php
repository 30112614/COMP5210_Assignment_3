<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_number = $_POST['item_number'];
    $object_class = $_POST['object_class'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO scp_subjects (item_number, object_class, description) VALUES (?, ?, ?)");
    $stmt->execute([$item_number, $object_class, $description]);

    header("Location: index.php?message=SCP+record+successfully+created");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add SCP Record</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <main style="max-width: 600px; margin: 40px auto; padding: 20px;">
        <h1>Add New SCP Subject</h1>
        <form method="POST">
            <div style="margin-bottom: 15px;">
                <label>Item Number (e.g., SCP-007):</label><br>
                <input type="text" name="item_number" required style="width: 100%; padding: 8px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label>Object Class:</label><br>
                <input type="text" name="object_class" required style="width: 100%; padding: 8px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label>Description:</label><br>
                <textarea name="description" rows="5" required style="width: 100%; padding: 8px;"></textarea>
            </div>
            <button type="submit" style="background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 4px;">Save Record</button>
            <a href="index.php" style="margin-left: 10px;">Cancel</a>
        </form>
    </main>
</body>
</html>