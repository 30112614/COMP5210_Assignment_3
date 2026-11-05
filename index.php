<?php
include 'db.php';
$stmt = $pdo->query("SELECT * FROM scp_subjects");
$subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCP Foundation - Catalogue Index</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <div class="header-bar">
            <img src="./images/scp-logo.jpg" alt="SCP Foundation Logo">
            <h1>SCP Foundation Catalogue</h1>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="./index.php" class="active">Home</a></li>
            <li><a href="./scp-002.html">SCP-002</a></li>
            <li><a href="./scp-003.html">SCP-003</a></li>
            <li><a href="./scp-004.html">SCP-004</a></li>
            <li><a href="./scp-005.html">SCP-005</a></li>
            <li><a href="./scp-006.html">SCP-006</a></li>
        </ul>
    </nav>

    <main>
        <h1 class="item-title">Field Agent Database Overview</h1>
        
        <!-- Task 1: Appropriate messages alerting users -->
        <?php if (isset($_GET['message'])): ?>
            <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
                <?= htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <div style="margin-bottom: 20px;">
            <a href="create.php" style="background: #007bff; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Add New SCP Record</a>
        </div>

        <div class="articles-container">
            <?php foreach ($subjects as $row): ?>
                <article class="card">
                    <div>
                        <h2><?= htmlspecialchars($row['item_number']); ?></h2>
                        <p>Object Class: <?= htmlspecialchars($row['object_class']); ?></p>
                        <p><?= htmlspecialchars(substr($row['description'], 0, 100)); ?>...</p>
                    </div>
                    <div>
                        <a href="update.php?id=<?= $row['id']; ?>" style="color: orange; margin-right: 10px;">Edit</a>
                        <a href="delete.php?id=<?= $row['id']; ?>" style="color: red;" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>SCP Foundation Only</p>
    </footer>
</body>
</html>