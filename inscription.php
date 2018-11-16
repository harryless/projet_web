<!DOCTYPE html>

<html>
  <head>
    <!--entete de la page-->
    <meta charset="utf8">
    <!-- demander que le viewport du navigateur mobile == largeur de l'ecran -->
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="css/formulaire.css" />
    <!--[if lt IE 9]>
	<script src="http: //html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <!-- <script src="monscript.js"></script> -->
    <title>Drive</title>

   </head>

   <body id="formulaire">

       <header>
	 <h1>INSCRIPTION</h1>
       </header>
         <form method="post" action="pageConnexion.php" id="Retoure">
      <input type="submit" value="Page Precedente" />
    </form>
    <br><br><br><br><br><br>


        <!--placeholder est un préremplissage du champ maxlength est le nombre de caractere que peut prendre le champ-->
		<!--le mot cle required designe les attributs obligatoires-->
	<form method="post" action="pageCreationCompte.php">

	 <!--Est la balise pour les formulaires-->

	  <fieldset id="fieldset1">
	    <legend>Votre identifiant de Carte de Fidelite</legend> <!--titre de fieldset-->
	    <label for="NoCarteFidelite"> Identifiant Carte de Fidelite </label> : <input type="number" name="NoCarteFidelite" id="NoCarteFidelite" placeholder='Ex: 1245657785'required/> </br>
	  </fieldset>


	  <fieldset id="fieldset1">
	    <legend>Vos coordonnées</legend>

	    <label for='civilite'>Civilité</label> :  <input type='text' name='civilite' id='civilite' maxlength='4'  placeholder='Ex: M. ou Mme.'/> </br>
	    <label for='nom'>Nom</label> : <input type='text' name='nom' id='nom' autofocus required/> </br>
	    <!-- aufocus=>le curseur dans prenom par defaut. required=>champ obligatoire-->
	    <label for='prenom'>Prenom</label> : <input type='text' name='Prenom' id='prenom' required/> </br>
	    <label for='telephone'>Telephone</label> : <input type='text' name='telephone' id='telephone' required/> </br>
	    <label for='dateDeNaissance'>Date de naissance</label> : <input type='date' name='dateDeNaissance' id='DateDeNaissance' required/> </br> <label for="text">E-mail</label> : <input type="email" name="email" id="email" required/> </br>

	  </fieldset>


	  <fieldset id="f2">
	    <legend>Votre adresse</legend> <!--titre de fieldset-->
	    <label for='ville'>Votre ville</label> :
	    <select name='ville' id='ville'> <!--liste deroulante-->
	      <option value='Nancy'>Nancy</option>
	      <option value='Viller-les-nancy'>Viller-les-nancy</option>
	      <option value='Saint-max'>Saint-max</option>
	      <option value='Essey-les-nancy'>Essey-les-nancy</option>
	      <option value='Tomblaine'>Tomblaine</option>
	      <option value='Metz'>Metz</option>
	      <option value='Dombasle-sur-meurthe'>Dombasle-sur-meurthe</option>
	      <option value='Varangeville'>Varangeville</option>
	      <option value='Ludres'>Ludres</option>
	      <option value='Vandoeuvre-les-nancy'>Vandoeuvre-les-nancy</option>
	      <option value='Laxou'>Laxou</option>
	      <option value='Jarville-la-malgrange'>Jarville-la-malgrange</option>
	      <option value='Luneville'>Luneville</option>
	      <option value='Maxeville'>Maxeville</option>
	      <option value='Malxeville'>Malxeville</option>
	      <option value='Verdun'>Verdun</option>
	      <option value='Epinal'>Epinal</option>
	      <option value='Thionville'>Thionville</option>
	      <option value='Bar-le-duc'>Bar-le-duc</option>
	      <option value='Toul'>Toul</option>
	      <option value='Saint-die-des-vosges'>Saint-des-des-vosges</option>
	      <option value='Pont-a-mousson'>Pont-a-mousson</option>
	      <option value='Champigneulles'>Champigneulles</option>
	      <option value='Amneville'>Amneville</option>
	      <option value='Jarny'>Jarny</option>
	      <option value='longwy'>Longwy</option>
	      <option value='Gerardmer'>Gerardmer</option>
	      <option value='Forbach'>Forbach</option>
	      <option value='Sarreguemin'>Sarreguemin</option>
	      <option value='Bitche'>Bitche</option>
	      <option value='Commercy'>Commercy</option>
	      <option value='Plombieres-les-bains'>Plombieres-les-bains</option>
	      <option value='Neuf-chateau'>Neuf-chateau</option>
	      <option value='vittel'>Vittel</option>
	      <option value='Rambervillers'>Rambervillers</option>
	      <option value='La bresse '>La bresse</option>
	      <option value='Remiremont'>Remiremont</option>
	      <option value='Montmedy'>Montmedy</option>
	      <option value='Chateau-salins'>Chateau-salins</option>
	      <option value='Bruyeres'>bruyeres</option>
	      <option value='Nomeny'>Nomeny</option>
	      <option value='Morhangee'>Morhange</option>
	      <option value='Saint-mihiel'>Saint-mihiel</option>
	      <option value='Saint-nicolas-de-port'>Saint-nicolas-de-port</option>
	      <option value='Briey'>Briey</option>
	      <option value='Colombey-les-belles'>Colombey-les-belles</option>
	      <option value='Villerupt'>Villerupt</option>
	      <option value='Stenay'>Stenay</option>
	      <option value='Abreschviller'>Abreschviller</option>
	      <option value='Etain'>Etain</option>
	      <option value='Mirecourt'>Mirecourt</option>
	      <option value='Baccarat'>Baccarat</option>
	      <option value='Maizieres-les-metz'>Maizieres-les-metz</option>
	      <option value='Saint-Avold'>Saint-avold</option>
	      <option value='Mont-saint-martin'>Mont-saint-martin</option>
	      <option value='Joeuf'>Joeuf</option>
	      <option value='Frouard'>Frouard</option>
	      <option value='Liverdun'>Liverdun</option>
	      <option value='Heillecourt'>Heillecourt</option>
	      <option value='Seichamps'>Seichamps</option>
	      <option value='Pompey'>Pompey</option>
	      <option value='Pulnoy'>Pulnoy</option>
	      <option value='Bouxieres-aux-dames'>Bouxieres-aux-dames</option>
	      <option value='Pagny-sur-moselle'>Pagny-sur-moselle</option>
	      <option value='Rosieres-aux-salines'>Rosieres-aux-salines</option>
	      <option value='Houdemont'>Houdemont</option>
	      <option value='Chanteheux'>Chanteheux</option>

	    </select> </br>
	    <label for="codePostal">Code Postal</label> : <input type="text" name="codePostal" id="codePostal" required/> </br>
	    <label for="numeroDeRue">Numero de rue</label> : <input type="number" name="numeroDeRue" id="numeroDeRue" required/> </br>
	    <label for="nomDeRue">Nom de rue</label> : <input type="text" name="nomDeRue" id="nomDeRue" required/> </br>
	  </fieldset>

	  <!-- id et for vont de pair, c'est pour se placer automatiquement dans la barre de saisie dès qu'on tape sur le texte-->
	  <!-- name concerne php -->
	  <br><br><br>
	 <input  type="submit" value="Envoyer" name="Envoyer"/>
	</form>


		<?php


// Connexion au service XE (i.e. la base de données) sur la machine "localhost"
         if(isset($_POST['Envoyer'])){
			$NoCarteFidelite = $_POST['NoCarteFidelite'];
			$Nom = $_POST['nom'];
			$Prenom=$_POST['Prenom'];
			$Telephone=$_POST['telephone'];
			$Email=$_POST['email'];
			$ville=$_POST['ville'];
			$codePostal=$_POST['codePostal'];
			$numeroDeRue=$_POST['numeroDeRue'];
			$nomDeRue=$_POST['nomDeRue'];


			$adresse=$numeroDeRue .' '. $nomDeRue .', '.$ville;


	$db="(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=oracle.depinfo.uhp-nancy.fr)(PORT=1521)))(CONNECT_DATA=(SERVICE_NAME=depinfo)))";
        $user = "etud063";
        $passwd ="64687360aA";

    // connexion
       $conn = oci_connect($user, $passwd, $db);
       if (!$conn) {
	   $e = oci_error();
	   print($e['message']);
	   exit;
       }


       $stid = @oci_parse($conn, "INSERT INTO client  VALUES (:NoCarteFidelite,0,:Nom,:Prenom,:adresse,:Email,:Telephone)");
       oci_bind_by_name($stid, ":NoCarteFidelite", $NoCarteFidelite);
       oci_bind_by_name($stid, ":Nom", $Nom);
       oci_bind_by_name($stid, ":Prenom", $Prenom);
       oci_bind_by_name($stid, ":adresse", $adresse);
       oci_bind_by_name($stid, ":Email", $Email);
       oci_bind_by_name($stid, ":Telephone", $Telephone);
       @oci_execute($stid);
       if(isset($stid)){
	  echo "Votre compte vient d'être enregistré avec succes";
       }

     }


		?>
   </body>

</html>
