<?php session_start( ); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    </head>
    <?php
    include 'header.php';
     ?>


    <body class="bg-dark text-white" style="background:url(background.jpg);background-size:cover">

    <nav id="navbar-example2" class="navbar container">
    <ul class="nav nav-pills  mx-auto">
      <?php


      foreach ($Hierarchie as $key1 =>$aliment){

          foreach ($aliment as $key2 =>$value) {

              foreach ($value as $key3 => $tmp) {
                if($key1=="Aliment" ){
                  $tabAliments[]=$tmp;
                }
              }
            }
          }

      foreach ($tabAliments as $key =>$a){

              echo " <li class='nav-item dropdown '>";
                echo "    <a class='nav-link dropdown-toggle btn-primary' data-toggle='dropdown'
                     href='#'  aria-haspopup='true' aria-expanded='false'>$a</a>";

                     foreach ($Hierarchie as $key1 =>$aliment){

                         foreach ($aliment as $key2 =>$value) {

                             foreach ($value as $key3 => $tmp) {
              if($key3=="super-categorie" && $tmp==$a ){

                echo"   <div class='dropdown-menu'>
                 <a class='dropdown-item' href='#one'>$key1 </a>";
                    echo" </div> ";
              }



            }
          }
         }


           echo"   </li>";
       }





                //  echo "</li>";




      ?>
    </ul>
  </nav>

      <div class="container row mx-auto" style="background:rgb(0,0,0,0.5)">
        <?php
        foreach ($Recettes as $recette){
          $titre = $recette['titre'];
          $photo = iconv( 'UTF-8','ASCII//TRANSLIT//IGNORE', $titre );
          $photo = str_replace(" ", "_",$photo);
          $photo = "Photos/".$photo.".jpg";
          $title = explode('(',$titre);

      	   if (file_exists(''.$photo)) {
            echo "<li class='row mt-2 mb-2 mx-auto list-group'>";
            echo  "<div class='text-center' id='produitAffiche1'>
                    <ul class='list-group-item'>
                      <img class='img-rounded zoom' src='$photo' width='150' height='150'/>
                    </ul>
                    <p class='mx-auto' style='width:200px;'>$title[0]</p>
                    <a class='w-100 btn btn-primary' href='infoRecette.php?titre=$titre'><i class='fas fa-info-circle'></i> Info</a>
                    <a class='w-100 btn btn-danger' href='accueil.php?titre=$titre'><i class='far fa-thumbs-up'></i> Favoris</a> ";
            echo "</div></li>";
            }

        }

          if (isset($_SESSION['login'])) {
            $login=$_SESSION['login'];
          }
         if (isset($_GET['titre'])) {

          $titreRecette=$_GET['titre'];
          $database= new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
          $idUtilisateur="SELECT id_utilisateur FROM utilisateur WHERE login like '$login'";
          $res=$database->query($idUtilisateur)->fetch();
          $id_user=$res['id_utilisateur'];
      //on verifier si on a pas deja la recette dans le panier
          $recetteExiste = "SELECT COUNT(id_recette) AS nbrRecette FROM recette WHERE id_utilisateur like '$id_user' AND titre like '$titreRecette' " ;
          $recetteExisteFin=$database->query($recetteExiste)->fetch();
        if ($recetteExisteFin['nbrRecette']>0) {
          echo "recette deja ajoutée ";
        }else{
          $database->query("INSERT INTO recette(titre,id_utilisateur)
          VALUES('$titreRecette','$id_user')");
        }
        }
      ?>
      </div>

    </body>
    <footer class="container mt-2"style="background:rgb(0,0,0,0.5);height:100px;">

    </footer>
    </html>
