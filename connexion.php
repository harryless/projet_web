<?php
session_start( );
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Connexion</title>
    </head>
    <div class="container formulaire">
      <form style="padding-top: 150px;" action="" method="post">
        <div class="form-group">
          <label for="">Identifiant:</label>
          <input class="form-control form-control-lg" type="text" name="login" value="" placeholder="Votre Identifiant">
        </div>
        <div class="form-group">
          <label for="">Mot de passe:</label>
          <input class="form-control form-control-lg" type="text" name="passeword" value="" placeholder="Votre Mot de passe">
        </div>
        <button class="btn btn-primary" type="submit" name="valider">Connexion</button>
      </form>
    </div>



    <?php
    if (isset($_POST['valider'])) {
      $database= new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
      $login = $_POST['login'];
			$motDePasse = $_POST['passeword'];
      $sql = "SELECT login,motDePasse,nom,prenom FROM utilisateur WHERE login like '$login'";
      $results=$database->query($sql);
      if ($row=$results->fetch()) {

          $_SESSION['prenom']=$row['nom'];
       $_SESSION['nom'] = $row['prenom'];
        $_SESSION['login'] = $row['login'];


        header('Location: /projet_web/accueil.php');
          exit();
      }
      else {
        echo"login ou mot de passe  incorrect !!!</p>";
        }

      }



     ?>






  <body>

  </body>
</html>
