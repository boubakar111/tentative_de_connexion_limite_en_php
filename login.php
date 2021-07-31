<?php

session_start();

include 'config.php';

if (isset($_SESSION['ID'])) {
    header("Location:espaceAdmin.php");
    exit();
}

if (isset($_POST['submit'])) {

    $errorMsg = "";
    $time = time() - 600;
    $ipaddress = getIpAddresse();

    // requete pour lobtention de nombre de hits sur la table loginlogs

    $query = $pdo->query("SELECT count(*) as total_count from loginlogs where TryTime > $time  and IpAddress = '$ipaddress'");
    $check_login_row = $query->fetch();
    $total_count = $check_login_row['total_count'];
// si le total egale a 3 tentative
    if ($total_count == 3) {
        //Vérification de la tentative 3,
        $errorMsg = "Trop de tentatives de connexion. Veuillez vous connecter après 10 minutes";
    } else {

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $query = "SELECT * FROM admins WHERE email = '$email' AND password ='$password'";

        $result = $pdo->prepare($query);
        $result->execute();
        $result1 = $result->rowCount();
        if ($result1 > 0) {

            $row = $result->fetch();
            $_SESSION['ID'] = $row['id'];
            $_SESSION['NAME'] = $row['name'];


            $result = $pdo->prepare("DELETE FROM loginlogs WHERE IpAddress ='$ipaddress'");
            $result->execute();
            header("Location:espaceAdmin.php");
            die();

        } else {
            $total_count++;
            $rem_attm = 3 - $total_count;
            if ($rem_attm == 0) {
                $errorMsg = "Trop de tentatives de connexion. Veuillez vous connecter après 10 minutes";
            } else {
                $errorMsg = "Veuillez saisir des informations de connexion valides. $rem_attm tentatives restantes";
            }
            $tryTime = time();
            $stm = $pdo->prepare("INSERT INTO loginlogs (IpAddress, TryTime) VALUES ('$ipaddress', '$tryTime')");
            $stm->execute();
        }
    }
}
?>

<?php
// recupre l'adresse IP
function getIpAddresse()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ipAddresse = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipAddresse = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ipAddresse = $_SERVER['REMOTE_ADDR'];
    }
    return $ipAddresse;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulaire de limite de tentative de connexion en PHP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="card text-center" style="padding:20px;">
    <h3>Formulaire de limite de tentative de connexion en PHP</h3>
</div>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-8">
            <?php if (isset($errorMsg)) { ?>
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php echo $errorMsg; ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-4">
            <div class="card">
                <div class="card-body">
                    <img class="card-img-top" src="img_avatar1.png"
                         style="width:25%;border-radius:50%;margin-left:110px;">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="email" required="">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                   required="">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
