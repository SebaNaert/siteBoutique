<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil Boutique</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Nos produits </h1> 
    <h2><a href="ajout.php">Ajouter des produits</a></h2>
    <div class="produits">
        <?php
        $bdd = $pdo->query("SELECT * FROM produits");
        while ($row = $bdd->fetch()) {
            echo '<div class="produit">';
            echo '<a href="produit.php?id=' . $row['id'] . '">';
            echo '<img src="images/' . $row['image'] . '" alt="' . htmlspecialchars($row['nom']) . '">';
            echo '<h2>' . htmlspecialchars($row['nom']) . '</h2>';
            echo '<p>' . $row['prix'] . ' €</p>';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>