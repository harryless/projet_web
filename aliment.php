<?php session_start( ); ?>
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
                        //   echo "</br>".$tmp1."sous categorie de  :  ".$key11;
                       $tabSousSousCat[]=$tmp1;
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
                //echo "</br>".$tmp."sous categorie de  :  ".$key1;
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

foreach ($Recettes as $key1 => $value1) {
  foreach ($value1 as $key2 => $value2) {
    foreach ($value2 as $key3 => $value3) {
      // code...

    // code...
    if ($key2=='index' && $value3=='Limonade') {
      // code...

      echo "</br>".$value1['titre'];
    }

  }
}
}

foreach ($Hierarchie as $key1 =>$aliment){

    foreach ($aliment as $key2 =>$value) {

        foreach ($value as $key3 => $tmp) {
          if($key1!="Aliment" ){
            $tabAliments[]=$tmp;
          //  echo "</br>".$tmp;
          }
        }
      }
    }


?>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

<script>

            function tabDeRecettes(){
               var liste = new Array() ;

               <?php






               $key=0;
               while($key<107){
                   $key = key($Recettes) ;
                   echo "res[".$key."] = new Array()"."\r\n" ;
                   echo "res[".$key."][\"titre\"] = \"".str_replace("\"", '\"', $Recettes[$key]['titre'])."\" ; "."\r\n" ;
                   echo "res[".$key."][\"ingredients\"] = \"".str_replace("\"", '\"',$Recettes[$key]['ingredients'])."\" ; "."\r\n" ;
                   echo "res[".$key."][\"preparation\"] = \"".str_replace("\"", '\"',$Recettes[$key]['preparation'])."\" ; "."\r\n" ;
                   echo "res[".$key."][\"index\"] = new Array() ; "."\r\n" ;
                   $numIng = 0 ;
                   foreach ($Recettes[$key]['index'] as $ing) {
                       echo "res[".$key."][\"index\"][".$numIng."] = \"".str_replace("'","",$ing)."\" ; "."\r\n" ;
                       $numIng++ ;
                   }
                   next($Recettes) ;
               }

               ?>
               return res ;
           }

           function tableauDAliments(){
               //penser à remettre les single quotes
                  var tableauDAliments = new Array() ;
               <?php
               foreach ($Hierarchie as $key1 =>$aliment){

                   foreach ($aliment as $key2 =>$value) {

                       foreach ($value as $key3 => $tmp) {
                         if($key1!="Aliment" ){
                           echo "tableauDAliments[]=".$tmp;
                           echo "</br>".$tmp;
                         }
                       }
                     }
                   }

               ?>
               return tableauDAliments;
           }


            function afficheRecettes(aliment){
                var recettes = recupRecettes();
                var hierarchie = recupTab();

               for(var i = 0; i<=107; i++){

                   if(recettes[i]['index'].includes(aliment)){
                       $("#recettes").append($("<li>"+recettes[i]['titre']+"</li>").addClass("recette")) ;
                   }
               }
               console.log(aliment) ;
               for(var key in hierarchie[aliment]['sous-categorie']){
                   afficheRecettes(hierarchie[aliment]['sous-categorie'][key], recettes, hierarchie) ;
               }
           }

       </script>
       <div >


       <label for="champ_recherche">Recherche par aliments:</label>
              <input type="search" id="champ_recherche" name="champ_recherche" autocomplete="on"
                     aria-label="recherche par aliments" placeholder="Recherche par aliments" list="liste_data" >

              <datalist id = 'liste_data'>
                    <?php
                if(isset($Hierarchie)){
                    $i=0;
                   foreach ($Hierarchie as $element){

                      echo "<option>";
                      echo array_keys($Hierarchie)[$i];
                      echo "</option>";
                      $i++;
                       }

                  }


              ?>
              </datalist>

              <button id ="bouton_recherche_recette" name = "bouton_recherche_recette" onclick="afficheRecettes(champ_recherche.value)">Rechercher</button>
              </div>
              <div id="recettes">

      </div>


  </body>

</html>
