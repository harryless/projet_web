<?php session_start( ); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Panier</title>


  MON PANIER

<a href="accueil.php"> retourner a la page d 'accueil </a>


<?php
echo "bonjour monsieur  : ".$_SESSION['nom']." ".$_SESSION['prenom'];
 ?>

  </head>
  <body >


  <?php


   $login=$_SESSION['login'];
    $database= new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
    $idUtilisateur="SELECT id_utilisateur FROM utilisateur WHERE login like '$login'";
    $res=$database->query($idUtilisateur)->fetch();
    $id_user=$res['id_utilisateur'];

    $recettesFavori="SELECT DISTINCT titre,id_recette FROM recette WHERE id_utilisateur like '$id_user'";
    $results=$database->query($recettesFavori);

    while ($row = $results->fetch()) {

    foreach ($Recettes as $recette){

    if ($row['titre']==$recette['titre']) {

         $titre = $recette['titre'];
         $idrecette = $row['id_recette'];
         echo "<li id='$idrecette' style='display:inline-block;'>";
         $photo = iconv( 'UTF-8','ASCII//TRANSLIT//IGNORE', $titre );
         $photo = str_replace(" ", "_",$photo);
         $photo = "Photos/".$photo.".jpg";
       echo  "<div id='produitAffiche1'> <ul class='list-inline'><img

       class='img-rounded zoom' src='$photo' width='150' height='150'/></ul>
       <p style='width:100px;'>$titre</p><a id='supp' href='panier.php?titre=$titre'>supprimer</a>";


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
