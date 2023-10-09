<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "Root";
$dbname = "gestion_stock";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Requête pour récupérer les données de la table "mouvement"
$sql = "SELECT m.*, p.nom AS nom_produit FROM mouvementsstock m
        INNER JOIN produit p ON m.ProduitID = p.id_produit
        ORDER BY m.DateMouvement DESC"; // Vous pouvez ajuster cette requête selon vos besoins

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>L'affichage les mouvements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/undraw_revenue_re_2bmg.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Gestock
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="afficher.php">Afficher les produits</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="afficher_mvt.php">Afficher les mouvements</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="deconnexion.php" class="btn btn-outline-success">deconexion</a>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Liste des mouvements</h1>


        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>Date et heure du mouvement : " . $row["DateMouvement"] . "</p>";
                echo "<p>Type de mouvement : " . $row["TypeMouvement"] . "</p>";
                echo "<p>Produit : " . $row["nom_produit"] . "</p>";
                echo "<p>Quantité : " . $row["Quantite"] . "</p>";
                echo "<hr>";
            }
        } else {
            echo "Aucun mouvement trouvé.";
        }

        $conn->close();
        ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>