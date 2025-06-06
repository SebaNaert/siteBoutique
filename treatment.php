<?php

    if(isset($_POST['nom']))
    {
        $err=0;

        if(empty($_POST['nom'])){
            $err = 1;
        } else {
            $nom = htmlspecialchars($_POST['nom']);
            require "db.php";
            $req = $pdo -> prepare("SELECT * FROM produits WHERE nom=?");
            $req->execute([$nom]);
            $don = $req->fetch();
            if($don)
            {
                $err = 4;
            }
            $req->closeCursor();
        }
        if(empty($_POST['description']))
        {
            $err = 2;
        }else{
            $description = htmlspecialchars($_POST['description']);
        }
        if(empty($_POST['prix']))
        {
            $err = 3;
        } else {
            $prix = floatval($_POST['prix']);
        }
        if($err == 0)
        {
            if(isset($_FILES['image']))
            {
                if($_FILES['image']['error']==0)
                {
                    $dossier = 'images/';
                    $fichier = basename($_FILES['image']['name']);
                    $tailleMaxi = 2000000;
                    $taille = filesize($_FILES['image']['tmp_name']);
                    $extensions = ['.png', '.gif', '.jpg', '.jpeg'];
                    $mimes = ["image/jpeg","image/gif","image/png"];
                    $extension = strrchr($_FILES['image']['name'], '.');
                    $mime = $_FILES['image']['type'];
                    if($taille > $tailleMaxi)
                    {
                        $err = "i5";
                    }

                    if(!in_array($extension,$extensions))
                    {
                        $err = "i6";
                    }

                    if(!in_array($mime,$mimes))
                    {
                        $err= "i7";
                    }
                    if($err==0)
                    {

                        $fichier = strtr($fichier,
                        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier); 
                        $fichiercplt = rand().$fichier;

                        if(move_uploaded_file($_FILES['image']['tmp_name'],$dossier.$fichiercplt))
                        {
                            $insert = $pdo->prepare("INSERT INTO produits(nom,image,description,prix) VALUES(:nom,:cover,:descri,:prix)");
                            $insert->execute([
                                ":nom" => $nom,                            
                                ":descri" => $description,
                                ":cover" => $fichiercplt,
                                ":prix" => $prix
                            ]);
                            header("LOCATION:index.php?upload=success");
                            exit();
                        }else{
                            header("LOCATION:index.php?error=i8");
                            exit();
                        }
                    } else {
                        header("LOCATION:index.php?error=".$err);
                        exit();
                    }
                }else {
                    header("LOCATION:index.php?error=i".$_FILES['image']['error']);
                    exit();
                }
            } else {
                header("LOCATION:index.php?error=3");
            }
            
                
            
        } else {
            header("LOCATION:index.php?error=".$err);
            exit();
        }
    } else {
        header("LOCATION:index.php");
        exit();
    }
?>
