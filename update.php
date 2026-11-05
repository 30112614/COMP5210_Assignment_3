<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM scp_subjects WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_number = $_POST['item_number'];
    $object_class = $_POST['object_class'];
    $description = $_POST['description'];

    $updateStmt = $pdo->prepare("UPDATE scp_subjects SET item_number = ?, object_class = ?, description = ? WHERE id = ?");
    $updateStmt->execute([$item_number, $object_class, $description, $id]);

    header("Location: index.php?message=SCP+record+successfully+updated");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit SCP Record</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <main style="max-width: 600px; margin: 40px auto; padding: 20px;">
        <h1>Edit SCP Subject</h1>
        <form method="POST">
            <div style="margin-bottom: 15px;">
                <label>Item Number:</label><br>
                <input type="text" name="item_number" value="<?= htmlspecialchars($row['item_number']); ?>" required style="width: 100%; padding: 8px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label>Object Class:</label><br>
                <input type="text" name="object_class" value="<?= htmlspecialchars($row['object_class']); ?>" required style="width: 100%; padding: 8px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label>Description:</label><br>
                <textarea name="description" rows="5" required style="width: 100%; padding: 8px;"><?= htmlspecialchars($row['description']); ?></textarea>
            </div>
            <button type="submit" style="background: #ffc107; color: black; padding: 10px 20px; border: none; border-radius: 4px;">Update Record</button>
            <a href="index.php" style="margin-left: 10px;">Cancel</a>
        </form>
    </main>
</body>
</html>