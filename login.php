<?php
    session_start( );

    if($_SESSION['connected'] == true){
        header('Location: /projet_web/home.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery.min.js"></script>
        <script src="js/typeahead.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/popper.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <title>Connexion</title>
    </head>

    <body class="text-white" style="background:url(img/bg.jpg);background-size:cover">
        <header class="container text-white text-center mb-5" style="height:100px;background:rgba(0, 0, 0,0.5)">
            <h1>Connexion</h1>
            <div class="btn-group">
                  <a class="btn btn-link"  href="home.php"><i class="fas fa-home"></i> Accueil</a>
                  <a class="btn btn-link"  href="register.php"><i class="fas fa-edit"></i> Inscription</a>
            </div>
        </header>
        <div class="container" style="background:rgba(0, 0, 0,0.5);height:350px;">
            <?php
                if(!empty($_SESSION['error'])){
                    echo '<p>'.$_SESSION['error'].'</p>';
                }
            ?>
            <form  class="container pt-5 w-50" style="" action="" method="post">
                <div class="form-group">
                    <label for="">Identifiant:</label>
                    <input class="form-control form-control-lg" type="text" name="login" value="" placeholder="Votre identifiant" required >
                </div>
                <div class="form-group">
                    <label for="">Mot de passe:</label>
                    <input class="form-control form-control-lg" type="password" name="password" value="" placeholder="Votre mot de passe" required>
                </div>
                <button class="btn btn-primary " type="submit" name="valider">Connexion</button>
            </form>
        </div>

        <?php
            if (isset($_POST['valider'])) {
                $db = new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
                $login = $_POST['login'];
    			$motDePasse = $_POST['password'];
                $sql = "SELECT login,motDePasse,nom,prenom FROM utilisateur WHERE login = '$login' AND motDePasse = '$motDePasse'";
                $results = $db->query($sql);
                if ($row = $results->fetch()) {
                    $_SESSION['connected'] = true;
                    $_SESSION['nom']=$row['nom'];
                    $_SESSION['prenom'] = $row['prenom'];
                    $_SESSION['login'] = $row['login'];
                    header('Location: /projet_web/home.php');
                    exit();
                }else {
                    $_SESSION['error'] = '<div class="text-center"><p>Correspondance Login/mot de passe incorrecte</p></div>';
                    header('Location: /projet_web/login.php');
                    exit();
                }
            }
        ?>
    </body>
</html>
