<?php session_start( ); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>

    <meta charset="utf-8">
    <title>Accueil</title>


    vous etes sur la page d Accueil
</br></br></br></br>
<a href="panier.php"> mon panier </a>
</br></br></br></br>

<?php
echo "bonjour monsieur  : ".$_SESSION['nom']." ".$_SESSION['prenom'];
 ?>
</br></br></br></br>
 </br></br></br></br>
  </head>
  <body >
  </br></br></br></br>
    </br></br></br></br>

  <?php
 foreach ($Recettes as $recette){
	//echo "<tr>\n";
      $titre = $recette['titre'];
      echo "<li style='display:inline-block;'>";
      $photo = iconv( 'UTF-8','ASCII//TRANSLIT//IGNORE', $titre );
      $photo = str_replace(" ", "_",$photo);
      $photo = "Photos/".$photo.".jpg";
    echo  "<div id='produitAffiche1'> <ul class='list-inline'><img

    class='img-rounded zoom' src='$photo' width='150' height='150'/></ul>
  <a href='accueil.php?titre=$titre'>  <p style='width:100px;'>$titre</p></a> ";
    //  echo '<img src="Photos/'.$titre.'.jpg" alt="" width="100" height="100">';
    echo "</div>";

      echo "</li>";

      //	echo "</tr>\n";


  }

$login=$_SESSION['login'];
 if (isset($_GET['titre'])) {

    $titreRecette=$_GET['titre'];
    $database= new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
    $idUtilisateur="SELECT id_utilisateur FROM utilisateur WHERE login like '$login'";
    $res=$database->query($idUtilisateur)->fetch();
    $id_user=$res['id_utilisateur'];
//on verifier si on a pas deja la recette dans le panier
    $recetteExiste = "SELECT COUNT(id_recette) AS nbrRecette FROM recette WHERE id_utilisateur like '$id_user' AND titre like '$titreRecette' " ;
    $recetteExisteFin=$database->query($recetteExiste)->fetch();
  if ($recetteExisteFin['nbrRecette']>0) {
 echo "recette deja ajoutée ";
  }else {

    $database->query("INSERT INTO recette(titre,id_utilisateur)
   VALUES('$titreRecette','$id_user')");

}






}

//
// //on recupere la liste des super categorie
//   foreach ($Hierarchie as $key =>$aliment){
//
//       foreach ($aliment as $key =>$value) {
//
//           foreach ($value as $key => $tmp) {
//
//           if($key=='super-categorie'){
//               echo "<li>";
//               echo "".$tmp;
//               echo "</li>";
//             }
//
//           }
//       }
//
//   }

?>

  </body>
</html>
