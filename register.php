<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $email = $_POST["email"];

    $conn = mysqli_connect("localhost", "root", "Root", "gestion_stock");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO users (username, password_hash, email) VALUES ('$username', '$hashed_password', '$email')";
    if (mysqli_query($conn, $sql)) {
        header("Location:login.php");
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Inscription</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-5 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Inscription</h2>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col">
                                <input type="text" class="form-control" placeholder="Prenom">
                                </div>
                                <div class="col">
                                <input type="text" class="form-control" placeholder="Nom">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">Nous n'allons jamais partagé votre email.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mot de passe</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Voir</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        
                                <a href="login.php" class="btn btn-secondary">Connecter</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>