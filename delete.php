<?php
include 'db.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("DELETE FROM scp_subjects WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php?message=SCP+record+successfully+deleted");
    exit();
} else {
    header("Location: index.php");
    exit();
}
?>