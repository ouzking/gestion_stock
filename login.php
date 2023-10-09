<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $conn = mysqli_connect("localhost", "root", "Root", "gestion_stock");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT user_id, password_hash FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password_hash"])) {
            $_SESSION["user_id"] = $row["user_id"];
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "User not found.";
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

    <title>Connexion</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-sm-12 col-md-5 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Connexion</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="mb-3">
                                <label class="form-label">Username: </label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mot de pass</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Login">
                            <a href="register.php" class="btn btn-secondary">inscrire</a>

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