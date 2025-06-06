<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil Boutique</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouts</h1>
    <div class="ajout">
        <form action="treatment.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom">nom: </label>
                <input type="text" name="nom" id="nom">
            </div>
            <div class="form-group">
                <label for="prix">prix: </label>
                <input type="text" name="prix" id="prix">
            </div>
            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
                <label for="image">Image: </label>
                <input type="file" name="image" id="image">
            </div>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>
</html>
