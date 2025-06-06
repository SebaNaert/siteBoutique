<?php
include 'db.php';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
} else {
    $id = 0;
}
$bdd = $pdo->prepare("SELECT * FROM produits WHERE id = ?");
$bdd->execute([$id]);
$produit = $bdd->fetch();

if (!$produit) {
    die("Produit introuvable.");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($produit['nom']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">← Retour</a>
    <h1><?php echo htmlspecialchars($produit['nom']); ?></h1>
    <img src="<?php echo $produit['image']; ?>" alt="<?php echo htmlspecialchars($produit['nom']); ?>">
    <p><?php echo nl2br(htmlspecialchars($produit['description'])); ?></p>
    <p><strong><?php echo $produit['prix']; ?> €</strong></p>
</body>
</html>