<?php session_start(); ?>
<?php include 'Donnees.inc.php';

?>

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

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>







    <?php
    //on trouve tout les sous-categorie d'aliment recherche
    function getSousCategorie($aliment)
    {
        foreach ($GLOBALS['Hierarchie'] as $GLOBALS['key1'] =>  $GLOBALS['value1']) {
          if ($GLOBALS['key1'] == $aliment){
            foreach ($GLOBALS['value1'] as $GLOBALS['key2']  => $GLOBALS['value2']) {
                if ( $GLOBALS['key2']=="sous-categorie") {
                    foreach ($GLOBALS['value2'] as $GLOBALS['key3'] => $GLOBALS['value3']) {
                    //  echo $GLOBALS['value3']."</br>";
                      $tab[]=$GLOBALS['value3'];
                      $tab[]=  getSousCategorie($GLOBALS['value3']);
                        //


                    }
                }
            }
        }
}
          return $tab;
    }
  //  var_dump($tab=getSousCategorie("Partie de citron"));
    //=getSousCategorie($aliment);
    $tab=getSousCategorie("Partie de citron");
    foreach ($tab as $key => $value) {
    //  echo $value;
      //foreach ($value as $key1 => $value1) {
      //  afficher_titre_recettes($value1);

    //  }
    }

      function afficher_titre_recettes($aliment)
      {
          foreach ($GLOBALS['Recettes'] as $GLOBALS['key1'] =>  $GLOBALS['value1']) {
              foreach ($GLOBALS['value1'] as $GLOBALS['key2']  => $GLOBALS['value2']) {
                  foreach ($GLOBALS['value2'] as $GLOBALS['key3'] => $GLOBALS['value3']) {
                      if ($GLOBALS['value3']==$aliment) {
                          echo $GLOBALS['value1']['titre']."</br>";
                      }
                  }
              }
          }
      }

function trouver_recettes($aliment){
    afficher_titre_recettes($aliment);


    foreach (getSousCategorie($aliment) as $key => $value) {
        afficher_titre_recettes($value);

      foreach ($value as $key1 => $value1) {
        afficher_titre_recettes($value1);
      }
    }


}

//trouver_recettes("Épice commune");

    ?>



       <div >


         <form class="" action="#" method="post">


              <input type="search"  name="recherche" autocomplete="on"
                     aria-label="recherche " placeholder="Recherche" list="liste" >

              <datalist id = 'liste'>
                    <?php

                   foreach ($Hierarchie as $Key => $Value) {
                       echo "<option>";
                       echo "</br>".$Key;
                       echo "</option>";
                   }




              ?>
              </datalist>

              <button class="btn btn-primary" type="submit" name="bouton_recherche">rechercher</button>
<script type="text/javascript">
    $("#recettes").html("");
</script>

                 </form>
              <?php
                if (isset($_POST['bouton_recherche'])) {

            trouver_recettes($_POST['recherche']);

                }
               ?>


              </div>



  </body>

</html>
