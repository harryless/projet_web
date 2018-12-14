<?php session_start(); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery.min.js"></script>
  <script src="js/typeahead.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    </head>
    <?php
    include 'header.php';
     ?>


    <body class="bg-dark text-white" style="background:url(background1.jpg);background-size:cover">


      <?php
        include 'nav_barr.php';

      ?>

      <script id=barre_recherche>

      function tabDeRecettes(){

         <?php
              echo "var tab = new Array() ;"."\r\n" ;
        foreach ($GLOBALS['Recettes'] as $GLOBALS['key1'] =>  $GLOBALS['value1']) {
            echo "tab[".$GLOBALS['key1']."] = new Array()"."\r\n" ;
            echo "tab[".$GLOBALS['key1']."][\"index\"] = new Array() ; "."\r\n" ;
            foreach ($GLOBALS['value1'] as $GLOBALS['key2']  => $GLOBALS['value2']) {
                if ($GLOBALS['key2']=="titre") {
                    echo "tab[".$GLOBALS['key1']."][\"titre\"] = \"".str_replace("\"", '\"', $GLOBALS['value2'])."\" ; "."\r\n" ;
                }
                foreach ($GLOBALS['value2'] as $GLOBALS['key3'] => $GLOBALS['value3']) {
                    if ($GLOBALS['key2']=="index") {
                        echo "tab[".$GLOBALS['key1']."][\"index\"][".$GLOBALS['key3']."] = \"".str_replace("'", "", $GLOBALS['value3'])."\" ; "."\r\n" ;
                    }
                }
            }
        }
      echo "return tab"."\r\n" ;
      ?>


      }

      function tabDaliments(){

        <?php
            echo "var tab = new Array() ;"."\r\n" ;

            foreach ($GLOBALS['Hierarchie'] as $GLOBALS['key1'] =>  $GLOBALS['value1']) {
                echo "tab[\"".$GLOBALS['key1']."\"] = new Array() ;"."\r\n" ;
              //  echo "tab[\"".$GLOBALS['key1']."\"]['sous-categorie'] = new Array() ;"."\r\n" ;
                foreach ($GLOBALS['value1'] as $GLOBALS['key2']  => $GLOBALS['value2']) {

                    if ($GLOBALS['key1'] != "Aliment" && !empty($GLOBALS['value2']  && $GLOBALS['key2']=="sous-categorie") ) {
                                      echo "tab[\"".$GLOBALS['key1']."\"]['sous-categorie'] = new Array() ;"."\r\n" ;
                        foreach ($GLOBALS['value2'] as $GLOBALS['key3'] => $GLOBALS['value3']) {
                            $tompo=$GLOBALS['value3'];

                            echo "tab[\"".$GLOBALS['key1']."\"]['sous-categorie'][".$GLOBALS['key3']."] = \"".str_replace("'", "", $tompo)."\" ;"."\r\n" ;
                        }
                    }
                }
            }


                 echo "return tab"."\r\n" ;

        ?>
      }



      function afficheRecettes(alim){



        var tableau_aliments = tabDaliments();
         var tableau_recettes = tabDeRecettes();


        for(var i = 0; i<= 107;i++){

            if( tableau_recettes[i]['index'].includes(alim) )
            {
                var photo;
                var titre;
                var title
              //foreach ($Recettes as $recette){
                titre = tableau_recettes[i]['titre'];
              //  title = explode('(',titre);

                  $("#recettes").append(

              "<li class='row mt-2 mb-2 mx-auto list-group'>"
                +"<div class='text-center' id='produitAffiche1'>"+
                  "   <ul class='list-group-item'>"+
                  "      <img class='img-rounded zoom ' src='$photo' width='150' height='150'/>"+
                  "   </ul>"+
                  "   <p class='mx-auto' style='width:200px;'>"+titre+"</p>"+
                  "   <a class='w-100 btn btn-outline-warning' href='infoRecette.php?title="+titre+"'><i class='fas fa-info-circle'></i> Info</a>"+
                  "    <a class='w-100 btn btn-outline-danger' href='accueil.php?titre="+titre+"'><i class='far fa-thumbs-up'></i> Favoris</a> "+
                  " </div></li>"


                  );




            }
        }
        for(var i in tableau_aliments[alim]['sous-categorie']){

            afficheRecettes(tableau_aliments[alim]['sous-categorie'][i],tableau_recettes,tableau_aliments);

        }

}


           </script>

           <div >


           <label for="recherche">Recherche par aliments:</label>
                  <input type="search" id="recherche" name="recherche" autocomplete="on"
                         aria-label="recherche par aliments" placeholder="Recherche par aliments" list="liste" >

                  <datalist id = 'liste'>
                        <?php

                       foreach ($Hierarchie as $Key => $Value) {
                           echo "<option>";
                           echo "</br>".$Key;
                           echo "</option>";
                       }




                  ?>
                  </datalist>

                  <button  name = "bouton_recherche" onclick=" afficheRecettes(recherche.value) ">Rechercher</button>
                  </div>



      <div id="recettes" class="container row mx-auto border border-danger" style="background:rgba(0,0,0, 0.5)">

        <?php
        // foreach ($Recettes as $recette){
        //   $titre = $recette['titre'];
        //   $photo = iconv( 'UTF-8','ASCII//TRANSLIT//IGNORE', $titre );
        //   $photo = str_replace(" ", "_",$photo);
        //   $photo = "Photos/".$photo.".jpg";
        //   $title = explode('(',$titre);
        //
          //    if (file_exists(''.$photo)) {
        //     echo "<li class='row mt-2 mb-2 mx-auto list-group'>";
        //     echo  "<div class='text-center' id='produitAffiche1'>
        //             <ul class='list-group-item'>
        //               <img class='img-rounded zoom ' src='$photo' width='150' height='150'/>
        //             </ul>
        //             <p class='mx-auto' style='width:200px;'>$title[0]</p>
        //             <a class='w-100 btn btn-outline-warning' href='infoRecette.php?title=$titre'><i class='fas fa-info-circle'></i> Info</a>
        //             <a class='w-100 btn btn-outline-danger' href='accueil.php?titre=$titre'><i class='far fa-thumbs-up'></i> Favoris</a> ";
        //     echo "</div></li>";
        //     }
        //
        // }

          if (isset($_SESSION['login'])) {
              $login=$_SESSION['login'];
              if (isset($_GET['titre'])) {
                  $titreRecette=$_GET['titre'];
                  $database= new PDO('mysql:host=localhost;dbname=projetBoissons', 'root', 'root');
                  $idUtilisateur="SELECT id_utilisateur FROM utilisateur WHERE login like '$login'";
                  $res=$database->query($idUtilisateur)->fetch();
                  $id_user=$res['id_utilisateur'];

                  //on verifier si on a pas deja la recette dans le panier
                  $recetteExiste = "SELECT COUNT(id_recette) AS nbrRecette FROM recette WHERE id_utilisateur like '$id_user' AND titre like '$titreRecette' " ;
                  $recetteExisteFin=$database->query($recetteExiste)->fetch();
                  if ($recetteExisteFin['nbrRecette']>0) {
                      echo "

                ";
                  } else {
                      $database->query("INSERT INTO recette(titre,id_utilisateur)
                VALUES('$titreRecette','$id_user')");
                      echo "<meta http-equiv='refresh' content='0;URL=accueil.php'>";
                  }
              }
          } elseif (isset($_GET['titre'])) {
              echo "<meta http-equiv='refresh' content='0;URL=connexion.php'>";
          } {

      }
      ?>
      </div>

    </body>
    <footer class="container mt-2 border border-danger"style="background:rgb(0,0,0,0.5);height:100px;">

    </footer>
    </html>
