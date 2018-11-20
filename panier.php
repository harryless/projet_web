<?php session_start( ); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>

    <meta charset="utf-8">
    <title>Accueil</title>


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

    $recettesFavori="SELECT titre FROM recette WHERE id_utilisateur like '$id_user'";
    $results=$database->query($recettesFavori);
    while ($row = $results->fetch()) {
      // code...
      $tab['titre']=$row['titre'];
     //echo $tab['titre'].'<br>'
    foreach ($Recettes as $recette){

    if ($tab['titre']==$recette['titre']) {
      // code...


         $titre = $recette['titre'];
         echo "<li style='display:inline-block;'>";
         $photo = iconv( 'UTF-8','ASCII//TRANSLIT//IGNORE', $titre );
         $photo = str_replace(" ", "_",$photo);
         $photo = "Photos/".$photo.".jpg";
       echo  "<div id='produitAffiche1'> <ul class='list-inline'><img

       class='img-rounded zoom' src='$photo' width='150' height='150'/></ul>
       <p style='width:100px;'>$titre</p><a href='accueil.php?titre=$titre' ";
       //  echo '<img src="Photos/'.$titre.'.jpg" alt="" width="100" height="100">';
       echo "</div>";

         echo "</li>";

         //	echo "</tr>\n";
}

     }
}











?>

  </body>
</html>
