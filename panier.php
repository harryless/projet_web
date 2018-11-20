<?php session_start( ); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>

    <meta charset="utf-8">
    <title>Panier</title>


  MON PANIER
</br></br></br></br>
<a href="accueil.php"> retourner a la page d 'accueil </a>
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


   $login=$_SESSION['login'];
    $database= new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
    $idUtilisateur="SELECT id_utilisateur FROM utilisateur WHERE login like '$login'";
    $res=$database->query($idUtilisateur)->fetch();
    $id_user=$res['id_utilisateur'];

    $recettesFavori="SELECT DISTINCT titre FROM recette WHERE id_utilisateur like '$id_user'";
    $results=$database->query($recettesFavori);
    while ($row = $results->fetch()) {
      // code...
      //$tab['titre']=$row['titre'];
    // echo $tab['titre'].'<br>';
    foreach ($Recettes as $recette){

    if ($row['titre']==$recette['titre']) {
      // code...


         $titre = $recette['titre'];
         echo "<li style='display:inline-block;'>";
         $photo = iconv( 'UTF-8','ASCII//TRANSLIT//IGNORE', $titre );
         $photo = str_replace(" ", "_",$photo);
         $photo = "Photos/".$photo.".jpg";
       echo  "<div id='produitAffiche1'> <ul class='list-inline'><img

       class='img-rounded zoom' src='$photo' width='150' height='150'/></ul>
       <p style='width:100px;'>$titre</p><a id='supp' href='panier.php?titre=$titre'>supprimer</a>";
       //  echo '<img src="Photos/'.$titre.'.jpg" alt="" width="100" height="100">';

       echo "</div>";

         echo "</li>";


        }

     }

}
//supprission de recette
if(isset($_GET['titre'])){
$titreRecetteAsupp=$_GET['titre'];
$suppRecette="DELETE FROM recette WHERE   titre like '$titreRecetteAsupp' ";
$database->query($suppRecette)->fetch();
}

//nombre de recette d'un PANIER


$nbrRecette="SELECT DISTINCT COUNT(titre) AS nombreRecette FROM recette WHERE   id_utilisateur like '$id_user' ";
$rescompt=$database->query($nbrRecette)->fetch();
echo  $rescompt['nombreRecette'] ;





?>

  </body>

</html>
