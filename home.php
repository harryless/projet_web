<?php
    session_start();
    include 'Donnees.inc.php';
?>

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

    <body class="bg-dark text-white" style="background:url(img/bg.jpg);background-size:cover">
      <?php include 'header.php'; ?>
      <?php include 'nav_barr.php'; ?>

      <div class="input-group mb-4 container row mx-auto " >
           <label for="recherche"  > </label>
           <input type="search" id="recherche" name="recherche" autocomplete="on" aria-label="recherche" placeholder="Recherche" list="liste" >
           <datalist id = 'liste'>
               <?php
                    foreach ($Hierarchie as $Key => $Value) {
                        echo "<option>";
                        echo "</br>".$Key;
                        echo "</option>";
                    }
                ?>
            </datalist>

            <button  name = "bouton_recherche" id ="rc" class="btn btn-secondary" type="submit">Rechercher</button>
            <script type="text/javascript">
                  $("#rc").click(function(){
                      $("#recettes").html("");
                      trouverRecettes(recherche.value) ;
                  });
            </script>
          </div>



          <div id="recettes" class="container row mx-auto " style="background:rgba(0,0,0, 0.5)">


              <!-- <div class="row mx-auto mb-4 mt-4"> <i class="fab fa-gratipay"></i> Favorite Recipes </i></div> -->
            <?php

            echo $_SESSION['login'];
            $db = new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
                    // $sql = "SELECT r.id_utilisateur,u.id_utilisateur,r.titre,u.login FROM recette r,utilisateur u where r.id_utilisateur=u.id_utilisateur   ;";
                    // $results = $db->query($sql)->fetchAll();
                    //
                    // // On regroupe les favoris par utilisateur
                    // $users_choices = array();
                    //
                    // foreach($results as $result){
                    //     $users_choices[$result['login']][] = $result['titre'];
                    // }
                    //
                    // echo "<div class='row col-12'>";
                    // foreach($users_choices as $user=>$choices){
                    //   echo "<div class='container row mx-auto  col-10  alert alert-dark' role='alert' style='background:rgba(0,0,0, 0.5)'>";
                    //
                    //           echo "<i class=' text-primary fas fa-user'> $user </i>";
                    //     foreach($choices as $choice){
                    //        $photo = iconv( 'UTF-8','ASCII//TRANSLIT//IGNORE', $choice );
                    //        $photo = str_replace(" ", "_",$photo);
                    //        $photo = "Photos/".$photo.".jpg";
                    //       echo "<li class='mt-2 mb-2 mx-auto list-group'>
                    //               <div class='text-center' id='produitAffiche1'>
                    //                   <ul class='list-group-item'>
                    //                     <img class='img-rounded zoom ' src='$photo' width='100' height='100'/>
                    //                   </ul>
                    //
                    //                   <a class='w-60 btn btn-outline-warning' href='infoRecette.php?title=$choice'><i class='fas fa-info-circle'></i> Info</a>
                    //                   <a class='w-60 btn btn-outline-danger' href='home.php?titre=$choice'><i class='far fa-thumbs-up'></i> Favoris</a>
                    //           </div></li>";
                    //     }
                    //     echo '</div>';
                    // }
                    // echo '</div>';


              if (isset($_SESSION['login'])) {
                  $login=$_SESSION['login'];
                  if (isset($_GET['titre'])) {
                      $titreRecette=$_GET['titre'];
                      $idUtilisateur="SELECT id_utilisateur FROM utilisateur WHERE login like '$login'";
                      $res=$db->query($idUtilisateur)->fetch();
                      $id_user=$res['id_utilisateur'];

                      //on verifier si on a pas deja la recette dans le panier
                      $recetteExiste = "SELECT COUNT(id_recette) AS nbrRecette FROM recette WHERE id_utilisateur like '$id_user' AND titre like '$titreRecette' " ;
                      $recetteExisteFin=$database->query($recetteExiste)->fetch();
                      if ($recetteExisteFin['nbrRecette']>0) {
                          echo " recette deja ajoutee aux favoris";
                      } else {
                          $db->query("INSERT INTO recette(titre,id_utilisateur)
                    VALUES('$titreRecette','$id_user')");
                          echo "<meta http-equiv='refresh' content='0;URL=home.php'>";
                      }
                  }
              } elseif (isset($_GET['titre'])) {
                  echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
              } {

          }



          ?>
          </div>

    </body>
    <footer class="container mt-2 "style="background:rgb(0,0,0,0.5);height:100px;">

    </footer>
    </html>
