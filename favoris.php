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
    <title>Panier</title>
  </head>

  <?php
  include 'header.php';
   ?>
    <body class="bg-dark text-white" style="background:url(img/bg.jpg);background-size:cover">
      <div class="container row mx-auto" style="background:rgba(0,0,0, 0.5)">
        <?php
        $login=$_SESSION['login'];
        $database= new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
        $idUtilisateur="SELECT id_utilisateur FROM utilisateur WHERE login like '$login'";
        $res=$database->query($idUtilisateur)->fetch();
        $id_user=$res['id_utilisateur'];

        $recettesFavori="SELECT DISTINCT titre,id_recette FROM recette WHERE id_utilisateur like '$id_user'";
        $results=$database->query($recettesFavori);

        while ($row = $results->fetch()) {

        foreach ($Recettes as $recette){

        if ($row['titre']==$recette['titre']) {


             $idrecette = $row['id_recette'];
             $photo = iconv( 'UTF-8','ASCII//TRANSLIT//IGNORE', $recette['titre'] );
             $photo = str_replace(" ","_",$photo);
             $photo = "Photos/".$photo.".jpg";
           echo "<li class='row mt-5 mb-5 mx-auto list-group' id='$idrecette'>";
             echo "<div class='text-center' id='produitAffiche1'>
                      <ul class='list-group-item'>
                      <img class='img-rounded zoom' src='$photo' width='150' height='150'/>
                      </ul>
                      <p class='mx-auto' style='width:200px;'>".$recette['titre']."</p>
                      <a class='w-100 btn btn-warning' id='supp' href='favoris.php?titre=".$recette['titre']."'>
                      <i class='far fa-trash-alt'></i> supprimer
                      </a>";
             echo "</div>";
           echo "</li>";
            }

         }

    }


    //supprission de recette
    if(isset($_GET['titre'])){
      $titreRecetteAsupp=$_GET['titre'];
      $suppRecette="DELETE FROM recette WHERE   titre like '$titreRecetteAsupp' ";
      $database->query($suppRecette)->fetch();




      echo "<meta http-equiv='refresh' content='0;URL=favoris.php'>";
    }



    ?>
      </div>


    </body>

    </html>
