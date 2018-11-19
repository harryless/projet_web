<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/inscription.css">
    <title>Creer un nouveau Compte</title>
   </head>

   <body id="formulaire">

       <header>
         <form method="post" action="connexion.php">
          <button class="btn btn-primary btn-recedent" type="submit" name="button">Page Precedente</button>
         </form>
       </header>


	<form method="post" action="inscription.php">

	  <fieldset id="fieldset1">
	    <legend>Votre identifiant </legend> <!--titre de fieldset-->
	    <label for="login"> login </label> : <input type="texte" name="login" id="login" required/> </br>
			<label for="motDePasse"> Mot De Passe </label> : <input type="number" name="motDePasse" id="motDePasse" required/> </br>
	  </fieldset>


	  <fieldset id="fieldset1">
	    <legend>Vos coordonnées</legend>

	    <label for='sexe'>Sexe</label> :
			<select name='sexe' id='sexe'> <!--liste deroulante-->
				<option value='h'>homme</option>
				<option value='f'>femme</option>
			</select></br>

	    <label for='nom'>Nom</label> : <input type='text' name='nom' id='nom' autofocus required/> </br>
	    <!-- aufocus=>le curseur dans prenom par defaut. required=>champ obligatoire-->
	    <label for='prenom'>Prenom</label> : <input type='text' name='Prenom' id='prenom' required/> </br>
	    <label for='telephone'>Telephone</label> : <input type='text' name='telephone' id='telephone' required/> </br>
	    <label for='dateDeNaissance'>Date de naissance</label> : <input type='date' name='dateDeNaissance' id='DateDeNaissance' required/> </br>
			<label for="text">E-mail</label> : <input type="email" name="email" id="email" required/> </br>

	  </fieldset>


	  <fieldset id="f2">
	    <legend>Votre adresse</legend> <!--titre de fieldset-->
	    <label for='ville'>Votre ville</label> : <input type="text" name="ville" id="ville" required/> </br>
	    <label for="codePostal">Code Postal</label> : <input type="text" name="codePostal" id="codePostal" required/> </br>
	    <label for="numeroDeRue">Numero de rue</label> : <input type="number" name="numeroDeRue" id="numeroDeRue" required/> </br>
	    <label for="nomDeRue">Nom de rue</label> : <input type="text" name="nomDeRue" id="nomDeRue" required/> </br>
	  </fieldset>


	  <br><br><br>
	 <input  type="submit" value="Envoyer" name="Envoyer"/>
	</form>




		<?php


// Connexion au service XE (i.e. la base de données) sur la machine "localhost"
         if(isset($_POST['Envoyer'])){
			$login = $_POST['login'];
			$motDePasse = $_POST['motDePasse'];
			$Nom = $_POST['nom'];
			$Prenom=$_POST['Prenom'];
			$sexe=$_POST['sexe'];
			$Telephone=$_POST['telephone'];
			$Email=$_POST['email'];
			$DateDeNaissance=$_POST['dateDeNaissance'];
			$ville=$_POST['ville'];
			$codePostal=$_POST['codePostal'];
			$numeroDeRue=$_POST['numeroDeRue'];
			$nomDeRue=$_POST['nomDeRue'];


			$adresse=$numeroDeRue .' '. $nomDeRue .', '.$ville;


			$database= new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
			$results=$database->query("INSERT INTO utilisateur(login,nom,prenom,motDePasse,sexe,Email,telephone,dateDeNaissance,adresse)
			VALUES('$login','$Nom','$Prenom','$motDePasse','$sexe','$Email','$Telephone','$DateDeNaissance','$adresse')");




     }


		?>
   </body>

</html>
