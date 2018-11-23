<?php session_start( ); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

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

//fonction qui returne la liste des aliments


  foreach ($Hierarchie as $key1 =>$aliment){

      foreach ($aliment as $key2 =>$value) {

          foreach ($value as $key3 => $tmp) {
            if($key1=="Aliment" ){
              $tabAliments[]=$tmp;
            }
          }
        }
      }





    //foreach ($tabAliments as $key =>$a){

      foreach ($Hierarchie as $key1 =>$aliment){
        foreach ($aliment as $key2 =>$value) {
          foreach ($value as $key3 => $tmp) {

            if($key1=="Fruit" && $key2 == "sous-categorie"){
              //echo "</br>".$tmp;
              foreach ($Hierarchie as $key11 =>$aliment){
                foreach ($aliment as $key22 =>$value) {
                  foreach ($value as $key3 => $tmp1) {

                    if( $key11==$tmp && $key22=="sous-categorie" ){
                            echo "</br>".$tmp1."sous categorie de  :  ".$key11;
                      //$tabSousSousCat[]=$key1;
                    }

                  }
                }
              }
              }
          }
       }
     }
  // }




  foreach ($tabSousCat as $key =>$a){
    foreach ($Hierarchie as $key1 =>$aliment){
      foreach ($aliment as $key2 =>$value) {
        foreach ($value as $key3 => $tmp) {

          if( $key1==$a && $key2=="sous-categorie" ){
                  echo "</br>".$tmp."sous categorie de  :  ".$key1;
            //$tabSousSousCat[]=$key1;
          }

        }
      }
    }
  }

  //  $tab= array_unique($tab);

// foreach ($tab as $value) {
//   // code...
//    echo "
//    <div  class='list-group'>
//   <a class='list-group-item list-group-item-action list-group-item-secondary'
//    href='categorie.php?categorie=$value' style='width:35%';>$value</a>
//    </div>";
//
//
//
// }





?>

  </body>

</html>
