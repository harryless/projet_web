<?php session_start( ); ?>
<?php include 'Donnees.inc.php'; ?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <title>info recette</title>
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
  <body class="text-white" style="background:url(img/bg.jpg);background-size:cover">
    <div class="container row mx-auto" style="background:rgb(0,0,0,0.5)">
      <?php
      foreach ($Recettes as $recette){

       if($_GET['title']==$recette['titre']){
         $photo = iconv( 'UTF-8','ASCII//TRANSLIT//IGNORE',$recette['titre'] );
         $photo = str_replace(" ", "_",$photo);
         $photo = "Photos/".$photo.".jpg";
         echo "<li class='list-group'>";
         echo  "<div id='produitAffiche1'>
                <ul class='list-group-item w-25'>
                <img  class='img-thumbnail mx-auto d-block' alt='Responsive image' src='$photo'/>
                </ul>";
                echo "<table class='table table-bordered mt-2'>
                      <tbody>
                      <tr>
                       <th class='table-danger text-black-50'>Titre</th>
                       <th>".$recette['titre']."</th>
                      </tr>
                      <tr>
                       <th class='table-primary text-black-50'>Ingredients</th>
                       <th>".$recette['ingredients']."</th>
                      </tr>
                      <tr>
                       <th class='table-active text-white-50'>Preparation</th>
                       <th>".$recette['preparation']."</th>
                      </tr>
                      </tbody>";

                echo "</table>";

                echo "</div></li>";

       }
      }
      ?>


  </body>

</html>
