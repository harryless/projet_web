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
    <link rel="stylesheet"  href="css/accueil.css" />

    </head>
    <?php
    include 'header.php';
     ?>

<<<<<<< HEAD
=======
    <header class="container mb-2"style="background:rgb(0,0,0,0.5);height:100px;text-align:center;">

        <!-- //div aliment -->
      <div  class="btn-group">
        <a class="btn btn-primary"  href="aliment.php"><i class="fas fa-cocktail"></i> Les aliments</a>
      </div>


      <!-- //div panier -->
      <!-- <div  id="panier"> -->
        <a class="btn btn-danger mr-5 ml-5" href="panier.php"><i class="far fa-thumbs-up"></i>Favoris </a>
      <!-- </div> -->

      <!-- //div nom et prenom -->
        <!-- <div  id="nomEtPrenom" > -->
        <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle mr-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php
          echo "<i class='far fa-user'></i> ".$_SESSION['nom']." ".$_SESSION['prenom'];
           ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
          <a class="dropdown-item" href="connexion.php"><i class="fas fa-sign-out-alt"></i>Deconnection</a>
        </div>



        <!-- //div nom site -->
      <div id="nomSite" class="col">
        <h1>Les Recettes du moment</h1>
      </div>
    </header>
>>>>>>> e65079c6cda794a9eab247574ca5f1546edc9c27

    <body class="bg-dark text-white">

    <nav id="navbar-example2" class="navbar container">
    <!-- <a class="navbar-brand" href="#">Aliments</a> -->
    <ul class="nav nav-pills">
      <?php
      foreach ($Hierarchie as $key1 =>$aliment){

          foreach ($aliment as $key2 =>$value) {

              foreach ($value as $key3 => $tmp) {


             if($key1=="Aliment" ){
                //  echo "<li>";
                echo"  <li class='nav-item dropdown '>
                    <a class='nav-link dropdown-toggle btn-primary' data-toggle='dropdown'
                     href='#' role='button' aria-haspopup='true' aria-expanded='false'>$tmp</a>
                    <div class='dropdown-menu'>
                      <a class='dropdown-item' href='#one'>one</a>
                      <a class='dropdown-item' href='#two'>two</a>
                      <div role='separator' class='dropdown-divider'></div>
                      <a class='dropdown-item' href='#three'>three</a>
                    </div>
                  </li>";

                //  echo "</li>";
               }

              }
         }

  }

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
            echo "<li class='row mt-5 mx-auto list-group'>";
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
    </html>
