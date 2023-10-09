<?php
// Connexion à la base de données (comme vous l'avez déjà fait)
$servername = 'localhost';
$username = 'root';
$password = 'Root';
$dbname = 'gestion_stock';

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die('La connexion à la base de données a échoué : ' . $conn->connect_error);
}

// Récupération de l'ID du produit depuis l'URL
if (isset($_GET['id'])) {
    $produitId = $_GET['id'];
} else {
    die('ID du produit non spécifié.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de la suppression ici
    // Supprimer le produit de la base de données
    $sql = "DELETE  FROM produit WHERE id_produit = $produitId";

    if ($conn->query($sql) === TRUE) {
        // La suppression a réussi, redirigez l'utilisateur vers la page de liste des produits
        header('Location: afficher.php');
        exit;
    } else {
        echo 'Erreur lors de la suppression du produit : ' . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer le produit</title>
    <!-- Chargement des fichiers CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>Supprimer le produit</h2>
        <p>Êtes-vous sûr de vouloir supprimer ce produit ? Cette action est irréversible.</p>
        <form method="post">
            <button type="submit" class="btn btn-danger">Oui, supprimer</button>
            <a href="afficher.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
    <!-- Chargement des fichiers JS de Bootstrap (optionnel, pour certaines fonctionnalités) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>