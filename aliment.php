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

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>


   <script>
   function tabDAliments(){
       var tab = new Array() ;

        <?php

               foreach ($GLOBALS['Hierarchie'] as $GLOBALS['key1'] =>  $GLOBALS['value1']){
                 foreach ($GLOBALS['value1'] as $GLOBALS['key2']  => $GLOBALS['value2']){
                   foreach ($GLOBALS['value2'] as $GLOBALS['key3'] => $GLOBALS['value3']){

                     if($GLOBALS['key1']!="aliment" ){
                       echo "tab= \"".str_replace("'", "", $GLOBALS['key1'])."\" ;"."\r\n" ;
                     }

                      }
                    }
                  }

                 echo "return tab"."\r\n" ;

        ?>


   }
   //
   // function recupRecettes(){
   //                 var res = new Array() ;
   //                 <?php
   //                 $key=0;
   //                 while($key<107){
   //                     $key = key($Recettes) ;
   //                     echo "res[".$key."] = new Array()"."\r\n" ;
   //                     echo "res[".$key."][\"titre\"] = \"".str_replace("\"", '\"', $Recettes[$key]['titre'])."\" ; "."\r\n" ;
   //                     echo "res[".$key."][\"ingredients\"] = \"".str_replace("\"", '\"',$Recettes[$key]['ingredients'])."\" ; "."\r\n" ;
   //                     echo "res[".$key."][\"preparation\"] = \"".str_replace("\"", '\"',$Recettes[$key]['preparation'])."\" ; "."\r\n" ;
   //                     echo "res[".$key."][\"index\"] = new Array() ; "."\r\n" ;
   //                     $numIng = 0 ;
   //                     foreach ($Recettes[$key]['index'] as $ing) {
   //                         echo "res[".$key."][\"index\"][".$numIng."] = \"".str_replace("'","",$ing)."\" ; "."\r\n" ;
   //                         $numIng++ ;
   //                     }
   //                     next($Recettes) ;
   //                 }
   //
   //                 ?>
   //                 return res ;
   //             }

   function recupRecettes(){
      var res = new Array() ;
      <?php

      foreach ($GLOBALS['Recettes'] as $GLOBALS['key1'] =>  $GLOBALS['value1'])  {
           foreach ($GLOBALS['value1'] as $GLOBALS['key2']  => $GLOBALS['value2']) {
             foreach ($GLOBALS['value2'] as $GLOBALS['key3'] => $GLOBALS['value3']) {

          echo "res[".$GLOBALS['key1']."] = new Array()"."\r\n" ;
          if($GLOBALS['key2']=="titre"){
          echo "res[".$GLOBALS['key1']."][\"titre\"] = \"".str_replace("\"", '\"', $GLOBALS['value2'])."\" ; "."\r\n" ;}
          echo "res[".$GLOBALS['key1']."][\"index\"] = new Array() ; "."\r\n" ;
          $numIng = 0 ;
          if ($GLOBALS['key2']=="index"){
            foreach ($GLOBALS['value3'] as $ing) {
                echo "res[".$GLOBALS['key3']."][\"index\"][".$numIng."] = \"".str_replace("'","",$ing)."\" ; "."\r\n" ;
                $numIng++ ;
            }
          }

          }
        }
      }

      ?>
      return res ;
  }


   function afficheRecettes(aliment){
       var recettes = recupRecettes();
       var hierarchie = tabDAliments();

      for(var i = 0; i<=107; i++){

          if(recettes[i]['index'].includes(aliment)){
              $("#recettes").append($("<li>"+recettes[i]['titre']+"</li>").addClass("recette")) ;
          }
      }

      // for(var key in hierarchie[aliment]["sous-categorie"]){
      //     afficheRecettes(hierarchie[aliment]["sous-categorie"][key], recettes, hierarchie) ;
      // }
  }

       </script>

       <div >


       <label for="champ_recherche">Recherche par aliments:</label>
              <input type="search" id="champ_recherche" name="champ_recherche" autocomplete="on"
                     aria-label="recherche par aliments" placeholder="Recherche par aliments" list="liste" >

              <datalist id = 'liste'>
                    <?php

                   foreach ($Hierarchie as $Key => $Value){

                      echo "<option>";
                      echo "</br>".$Key;
                      echo "</option>";

                       }




              ?>
              </datalist>

              <button id ="bouton_recherche_recette" name = "bouton_recherche_recette" onclick="afficheRecettes(champ_recherche.value)">Rechercher</button>
              </div>
              <div id="recettes">

      </div>


  </body>

</html>
