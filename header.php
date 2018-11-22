<header class="container mb-2 "style="background:rgb(0,0,0,0.5);height:100px;text-align:center;">
  <!-- div des deux bouttons favoris et aliments -->
  <div class="row justify-content-between">
    <div class="btn-group col-4">
      <a class="btn btn-link"  href="aliment.php"><i class="fas fa-cocktail"></i> Les aliments</a>
      <?php
        if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
          $login=$_SESSION['login'];
          $database= new PDO('mysql:host=localhost;dbname=projetBoissons','root','root');
          $idUtilisateur="SELECT id_utilisateur FROM utilisateur WHERE login like '$login'";
          $res=$database->query($idUtilisateur)->fetch();
          $id_user=$res['id_utilisateur'];

          $nbrRecette="SELECT DISTINCT COUNT(titre) AS nombreRecette FROM recette WHERE   id_utilisateur like '$id_user' ";
          $rescompt=$database->query($nbrRecette)->fetch();
          $nbr_favs= $rescompt['nombreRecette'] ;
          echo "<a class='btn btn-link' href='panier.php'><i class='far fa-thumbs-up'></i>Favoris <span class='badge badge-light'>$nbr_favs</span> </a>";
        }
       ?>

    </div>
    <!-- div du boutton identifiant et desconnexion -->
    <div class="btn-group mt-2 col-4 row justify-content-end">
      <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle mr-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php
        if (isset($_SESSION['nom']) && isset($_SESSION['prenom'])) {
        echo "<i class='far fa-user'></i> ".$_SESSION['nom']." ".$_SESSION['prenom'];
        echo "</button>
        <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
          <a class='dropdown-item' href='connexion.php'><i class='fas fa-sign-out-alt'></i>Deconnection</a>
        </div>";
        }
        else {
          echo "<i class='far fa-user'></i> Login";
          echo "</button>
          <div class='dropdown-menu' aria-labelledby='btnGroupDrop1'>
            <a class='dropdown-item' href='connexion.php'><i class='fas fa-sign-out-alt'></i> Connexion</a>
          </div>";
        }
      ?>

    </div>
  </div>
  <div  class="">
    <h1><i class="fas fa-cocktail"></i>Les Recettes du moment</h1>
  </div>
</header>
