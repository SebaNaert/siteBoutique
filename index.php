<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil Boutique</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Nos produits</h1>
    <div class="produits">
        <?php
        $stmt = $pdo->query("SELECT * FROM produits");
        while ($row = $stmt->fetch()) {
            echo '<div class="produit">';
            echo '<a href="produit.php?id=' . $row['id'] . '">';
            echo '<img src="' . $row['image'] . '" alt="' . htmlspecialchars($row['nom']) . '">';
            echo '<h2>' . htmlspecialchars($row['nom']) . '</h2>';
            echo '<p>' . $row['prix'] . ' €</p>';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>