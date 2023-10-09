<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des clients</title>
    <!-- Chargement des fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/undraw_revenue_re_2bmg.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Accueil
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
        <h2>Liste des clients</h2>
        <?php
        // Connexion à la base de données
        $servername = 'localhost';
        $username = 'root';
        $password = 'Root';
        $dbname = 'gestion_stock';

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérification de la connexion
        if ($conn->connect_error) {
            die('La connexion à la base de données a échoué : ' . $conn->connect_error);
        }

        // Récupération des clients depuis la base de données
        $sql = 'SELECT * FROM produit';
        $result = $conn->query($sql);

        //   if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo '<thead><tr><th>Nom</th><th>designation</th><th>quantite</th><th>Action</th></tr></thead><tbody>';
        /* while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                //  echo "<td>" . $row['id_produit'] . "</td>";
                echo '<td>' . $row['nom'] . '</td>';
                echo '<td>' . $row['designation'] . '</td>';
                echo '<td>' . $row['quantite'] . '</td>';

                echo '</tr>';
            }

            echo '</tbody></table>';
        } else {
            echo 'Aucun produit trouvé.'; */
        ?>

        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['designation']; ?></td>
                    <td><?php echo $row['quantite']; ?></td>
                    <td>
                        <!-- Bouton Modifier -->
                        <a href="modifier_produit.php?id=<?php echo $row['id_produit']; ?>" class="btn btn-primary">Modifier</a>
                        <!-- Bouton Supprimer -->
                        <a href="supprimer_produit.php?id=<?php echo $row['id_produit']; ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>


    </div>

    <!-- Chargement des fichiers JS de Bootstrap (optionnel, pour certaines fonctionnalités) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>