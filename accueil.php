<?php session_start( ); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>

    <meta charset="utf-8">
    <title>Accueil</title>


    vous etes sur la page d Accueil
</br></br></br></br>
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
      $photo = iconv( 'UTF-8', 'ASCII//TRANSLIT//IGNORE', $titre );
      $photo = str_replace(" ", "_", $photo);
      $photo = "Photos/".$photo.".jpg";
    echo  "<div id='produitAffiche1'> <ul class='list-inline'><img

    class='img-rounded zoom' src='$photo' width='150' height='150'/></ul><p style='width:100px;'>$titre</p>";
    //  echo '<img src="Photos/'.$titre.'.jpg" alt="" width="100" height="100">';
    echo "</div>";

      echo "</li>";

      //	echo "</tr>\n";


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