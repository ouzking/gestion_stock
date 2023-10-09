<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupération des données soumises depuis le formulaire
        $idProduit = $_POST['nom'];
        $typeMouvement = $_POST['type_mouvement'];
        $quantite = $_POST['quantite'];

        // Date et heure actuelles
        $dateMouvement = date('Y-m-d H:i:s');

        // Connexion à la base de données
        $servername = 'localhost';
        $username = 'root';
        $password = 'Root';
        $dbname = 'gestion_stock';
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die('Connexion échouée : ' . $conn->connect_error);
        }

        // Début de la transaction
        $conn->begin_transaction();

        // Requête d'insertion des données dans la table "mouvement"
        $sqlInsert = "INSERT INTO mouvementsstock (ProduitID, TypeMouvement, Quantite, DateMouvement) VALUES ('$idProduit', '$typeMouvement', '$quantite', '$dateMouvement')";

        if ($conn->query($sqlInsert) === true) {
            // Mise à jour de la table "produit" en fonction du type de mouvement
            if ($typeMouvement == 'Entree') {
                $sqlUpdate = "UPDATE produit SET quantite = quantite + '$quantite' WHERE id_produit = '$idProduit'";
            } elseif ($typeMouvement == 'Sortie') {
                $sqlUpdate = "UPDATE produit SET quantite = quantite - '$quantite' WHERE id_produit = '$idProduit'";
            }

            if ($conn->query($sqlUpdate) === true) {
                $conn->commit();
                header('Location: afficher_mvt.php'); // Déplacer le header en premier
                //  echo 'Mouvement enregistré avec succès et mise à jour de la quantité effectuée.';
            } else {
                $conn->rollback();
                header('Location: index.php'); // Déplacer le header en premier
                echo 'Erreur lors de la mise à jour de la quantité : ' . $conn->error;
            }
        } else {
            $conn->rollback();
            echo "Erreur lors de l'enregistrement du mouvement : " . $conn->error;
        }

        $conn->close();
    }

    ?>
</body>

</html>