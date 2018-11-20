<?php session_start( ); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>

    <meta charset="utf-8">
    <title>Aliments</title>


  aliments
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


  //on recupere la liste des super categorie
    foreach ($Hierarchie as $key =>$aliment){

        foreach ($aliment as $key =>$value) {

            foreach ($value as $key => $tmp) {


            if($key=='super-categorie'){
              //  echo "<li>";
              //  echo "".$tmp;
              $tab[]=$tmp;
              //  echo "</li>";
              }

            }
        }

}
    $tab= array_unique($tab);

foreach ($tab as $value) {
  // code...
   echo "<li>";
    echo "$value";

    echo "</li>";

}

?>

  </body>

</html>
