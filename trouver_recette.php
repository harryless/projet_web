
<script type="text/javascript">


function tabDeRecettes(){

<?php
  echo "var tab = new Array() ;"."\r\n" ;
foreach ($GLOBALS['Recettes'] as $GLOBALS['key1'] =>  $GLOBALS['value1']) {
echo "tab[".$GLOBALS['key1']."] = new Array()"."\r\n" ;

foreach ($GLOBALS['value1'] as $GLOBALS['key2']  => $GLOBALS['value2']) {
    if ($GLOBALS['key2']=="titre") {
        echo "tab[".$GLOBALS['key1']."][\"titre\"] = \"".str_replace("\"", '\"', $GLOBALS['value2'])."\" ; "."\r\n" ;
    }
    foreach ($GLOBALS['value2'] as $GLOBALS['key3'] => $GLOBALS['value3']) {
        if ($GLOBALS['key2']=="index") {
            echo "tab[".$GLOBALS['key1']."][\"index\"] = new Array() ; "."\r\n" ;
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



function trouverRecettes(alim){



var tableau_aliments = tabDaliments();
var tableau_recettes = tabDeRecettes();


for(var i = 0; i<= 107;i++){

if( tableau_recettes[i]['index'].includes(alim) ){
    var photo;
    var titre;

  //foreach ($Recettes as $recette){
    titre = tableau_recettes[i]['titre'];
  //  photo = titre.replace(" ", "_");


      $("#recettes").append(

  "<li class='row mt-2 mb-2 mx-auto list-group'>"
    +"<div class='text-center' id='produitAffiche1'>"+
      "   <ul class='list-group-item'>"+
      "      <img class='img-rounded zoom ' src='' width='150' height='150'/>"+
      "   </ul>"+
      "   <p class='mx-auto' style='width:200px;'>"+titre+"</p>"+
      "   <a class='w-100 btn btn-outline-warning' href='infoRecette.php?title="+titre+"'><i class='fas fa-info-circle'></i> Info</a>"+
      "    <a class='w-100 btn btn-outline-danger' href='home.php?titre="+titre+"'><i class='far fa-thumbs-up'></i> Favoris</a> "+
      " </div></li>"


      );




}
}
for(var i in tableau_aliments[alim]['sous-categorie']){

trouverRecettes(tableau_aliments[alim]['sous-categorie'][i],tableau_recettes,tableau_aliments);

}

}

</script>
