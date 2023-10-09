<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="images/undraw_revenue_re_2bmg.svg" alt="" width="30" height="24"
                    class="d-inline-block align-text-top">
                Acceuil
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="afficher.php">Les produits</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="afficher_mvt.php">Les mouvements</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="deconnexion.php" class="btn btn-outline-success">Déconnexion</a>
                </form>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <h1>Le magazin</h1>


        <div class="row">
            <div>
                <!-- Formulaire d'enregistrement de produit -->
                <form action="traitement_produit.php" method="post" class="container mt-5">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>

                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation :</label>
                        <input type="text" class="form-control" id="designation" name="designation" required>
                    </div>

                    <div class="mb-3">
                        <label for="quantite" class="form-label">Quantite :</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajouter le produit</button>
                </form>

            </div>
            <div>
                <!-- Formulaire d'enregistrement de mouvement de stock -->
                <form action="mvt.php" method="post" class="container mt-5">
                    <div class="mb-3">
                        <select name="nom" id="nom">
                            <?php
                            // Connexion à la base de données
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "gestion_stock";
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            if ($conn->connect_error) {
                                die("Connexion échouée : " . $conn->connect_error);
                            }

                            // Récupération des données
                            $sql = "SELECT id_produit, nom FROM produit";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["id_produit"] . "'>" . $row["nom"] . "</option>";
                                }
                            } else {
                                echo "<option value=''>Aucun produit trouvé</option>";
                            }

                            $conn->close();
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="radio" name="type_mouvement" value="Entree" required> Entrée
                        <input type="radio" name="type_mouvement" value="Sortie" required> Sortie
                    </div>
                    <div class="mb-3">
                        <label for="quantite" class="form-label">Quantite :</label>
                        <input type="number" class="form-control" id="quantite" name="quantite" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer le mouvement</button>
                </form>
            </div>
        </div>




    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>