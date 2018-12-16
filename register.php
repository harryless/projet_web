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
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <title>Créer un nouveau Compte</title>
    </head>

    <body class="text-white" id="formulaire" style="background:url(img/bg.jpg);background-size:cover">
        <header class="container mb-2"style="background:rgb(0,0,0,0.5);height:100px;text-align:center;">
            <h1 style="padding-top:10px;">Inscription</h1>
            <div class="btn-group">
                  <a class="btn btn-link"  href="home.php"><i class="fas fa-home"></i> Accueil</a>
                  <a class="btn btn-link"  href="login.php"><i class="fas fa-sign-in-alt"></i> Connexion</a>
            </div>
        </header>

        <div class="container mx-auto" style="background:rgba(0, 0, 0,0.5)" >
            <form class="row" method="post" action="register.php">
                <div class="form-group col" >
                    <legend>Votre identifiant </legend>
                    <label for="login">Login </label>
                    <input class="form-control" type="text" name="login" id="login" required/>
                   	<label for="motDePasse">Mot De Passe </label>
                    <input class="form-control" type="text" name="motDePasse" id="motDePasse" required/>
                </div>

                <div class="form-group col" style="padding-left:10px;">
                   	<legend>Vos coordonnées</legend>
                   	<label for='sexe'>Sexe</label> :
                   	<select class="form-control" name='sexe' id='sexe'>
                      <option value='h'>Homme</option>
                   		<option value='f'>Femme</option>
                   	</select>
                    <label for='nom'>Nom</label>
                    <input class="form-control" type='text' name='nom' id='nom' autofocus required/>
                   	<label for='prenom'>Prenom</label>
                    <input class="form-control" type='text' name='Prenom' id='prenom' required/>
                   	<label for='telephone'>Telephone</label>
                    <input class="form-control" type='text' name='telephone' id='telephone' required/>
                   	<label for='dateDeNaissance'>Date de naissance</label>
                    <input class="form-control" type='date' name='dateDeNaissance' id='DateDeNaissance' required/>
                   	<label for="text">E-mail</label>
                    <input class="form-control" type="email" name="email" id="email" required/>
                </div>

                <div class="form-group col" style="padding-left:10px;">
                 	    <legend>Votre adresse</legend>
                 	    <label for='ville'>Votre ville</label>
                      <input class="form-control" type="text" name="ville" id="ville" required/>
                 	    <label for="codePostal">Code Postal</label>
                      <input class="form-control" type="text" name="codePostal" id="codePostal" required/>
                 	    <label for="numeroDeRue">Numero de rue</label>
                      <input class="form-control" type="number" name="numeroDeRue" id="numeroDeRue" required/>
                 	    <label for="nomDeRue">Nom de rue</label>
                      <input class="form-control" type="text" name="nomDeRue" id="nomDeRue" required/>
                 </div>

                 <div class="form-group col text-center my-auto" role="group">
                      <button class="btn btn-success" type="submit" name="Envoyer" style="width:200px;" >S'inscrire</button>
                 </div>
            </form>
        </div>
        <?php
            if(isset($_POST['Envoyer'])){
                $login = $_POST['login'];
                $motDePasse = $_POST['motDePasse'];
                $nom = $_POST['nom'];
                $prenom = $_POST['Prenom'];
                $sexe = $_POST['sexe'];
                $telephone = $_POST['telephone'];
                $email = $_POST['email'];
                $dateDeNaissance = $_POST['dateDeNaissance'];
                $ville = $_POST['ville'];
                $codePostal = $_POST['codePostal'];
                $numeroDeRue = $_POST['numeroDeRue'];
                $nomDeRue = $_POST['nomDeRue'];
                $adresse = $numeroDeRue .' '. $nomDeRue .', '.$ville;
                $database = new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');

                $results = $database->query("INSERT INTO utilisateur(login,nom,prenom,motDePasse,sexe,Email,telephone,dateDeNaissance,adresse)
                VALUES('$login','$nom','$prenom','$motDePasse','$sexe','$email','$telephone','$dateDeNaissance','$adresse')");
            }
        ?>
    </body>
</html>
