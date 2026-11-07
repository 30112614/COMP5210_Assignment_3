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
            <h1>SCP Foundation Catalogue</h1>
        </div>
    </header>

    <main style="padding: 20px;">
        <h1>Field Agent Database Overview</h1>
        
        <?php if (isset($_GET['message'])): ?>
            <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                <?= htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <div style="margin-bottom: 20px;">
            <a href="create.php" style="background: #007bff; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Add New SCP Record</a>
        </div>

        <div class="articles-container">
            <?php if (empty($subjects)): ?>
                <p>No records found in the database.</p>
            <?php else: ?>
                <?php foreach ($subjects as $row): ?>
                    <article class="card" style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 5px;">
                        <h2><?= htmlspecialchars($row['item_number']); ?></h2>
                        <p><strong>Object Class:</strong> <?= htmlspecialchars($row['object_class']); ?></p>
                        <p><?= htmlspecialchars($row['description']); ?></p>
                        <div style="margin-top: 10px;">
                            <a href="update.php?id=<?= $row['id']; ?>" style="color: #d39e00; margin-right: 15px; text-decoration: none;">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" style="color: #dc3545; text-decoration: none;" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>SCP Foundation Only</p>
    </footer>

</body>
</html>