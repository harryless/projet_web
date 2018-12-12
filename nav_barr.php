
<?php
//tableau d aliments
foreach ($Hierarchie as $key1 =>$aliment) {
    foreach ($aliment as $key2 =>$value) {
        foreach ($value as $key3 => $tmp) {
            if ($key1=="Aliment") {
                $tabAliments[]=$tmp;
            }
        }
    }
}




    ?>
    <?php
    echo '<div class="navbar navbar-expand-md border border-danger navbar-dark mb-4 container" role="navigation" style="background:rgba(0,0,0,0.5)">';

      foreach ($tabAliments as $key =>$a) {
          echo    '<div class="collapse navbar-collapse" id="navbarCollapse">';
          echo        '<ul class="navbar-nav mr-auto">';

          echo            '<li class="nav-item dropdown">';
          echo               '<a class="nav-link btn dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >'.$a.'</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown1">'; ?>
    <script type="text/javascript">

        $(".nav-link").click(function(){
            $("#recettes").html("");
            afficheRecettes('<?php echo "$a"; ?>');
        });
    </script>

    <?php
                            foreach ($Hierarchie as $key1 =>$aliment) {
                                foreach ($aliment as $key2 =>$value) {
                                    foreach ($value as $key3 => $tmp) {
                                        if ($key1==$a && $key2=='sous-categorie') {
                                            echo                   '<li class="dropdown-item dropdown">
                            <a class="dropdown-toggle" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$tmp.'</a>

                            <ul class="dropdown-menu" aria-labelledby="dropdown1-1">'; ?>
                            <script type="text/javascript">

                                $(".dropdown-toggle").click(function(){
                                    $("#recettes").html("");
                                    afficheRecettes('<?php echo "$tmp"; ?>');
                                });
                            </script>

                            <?php
                                            foreach ($Hierarchie as $key11 =>$aliment) {
                                                foreach ($aliment as $key22 =>$value) {
                                                    foreach ($value as $key33 => $tmp1) {
                                                        if ($key11==$tmp && $key22=="sous-categorie") {
                                                            echo                       '<li class="dropdown-item dropdown">
                                    <a class="dropdown-toggle" id="dropdown1-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$tmp1.'</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown1-1-1">'; ?>
                                    <script type="text/javascript">

                                        $("#dropdown1-1-1").click(function(){
                                            $("#recettes").html("");
                                            afficheRecettes('<?php echo "$tmp1"; ?>');
                                        });
                                    </script>

                                    <?php
                                    foreach ($Hierarchie as $key111 =>$aliment) {
                                        foreach ($aliment as $key222 =>$value) {
                                            foreach ($value as $key333 => $tmp11) {
                                                if ($key111==$tmp1 && $key222=="sous-categorie") {
                                                    echo                                                '<li class="dropdown-item dropdown">
                                                            <a class="dropdown-toggle" id="dropdown1-1-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$tmp11.'</a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdown1-1-1">'; ?>
                                                            <script type="text/javascript">

                                                                $("#dropdown1-1-1-1").click(function(){
                                                                    $("#recettes").html("");
                                                                    afficheRecettes('<?php echo "$tmp11"; ?>');
                                                                });
                                                            </script>

                                                            <?php
                                                            foreach ($Hierarchie as $key1111 =>$aliment) {
                                                                foreach ($aliment as $key2222 =>$value) {
                                                                    foreach ($value as $key3333 => $tmp111) {
                                                                        if ($key1111==$tmp11 && $key2222=="sous-categorie") {
                                                                            echo                                                                    '<li class="dropdown-item dropdown">
                                                            <a class="dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$tmp111.'</a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdown1-1-1">'; ?>
                                                            <script type="text/javascript">

                                                                $(".dropdown2").click(function(){
                                                                    $("#recettes").html("");
                                                                    afficheRecettes('<?php echo "$tmp111"; ?>');
                                                                });
                                                            </script>

                                                            <?php
                                                            foreach ($Hierarchie as $key11111 =>$aliment) {
                                                                foreach ($aliment as $key22222 =>$value) {
                                                                    foreach ($value as $key33333 => $tmp1111) {
                                                                        if ($key11111==$tmp111 && $key22222=="sous-categorie") {
                                                                            echo                  '<li id="dropdown2-2">'.$tmp1111.'</li>'; ?>
    <script type="text/javascript">

        $("#dropdown2-2").click(function(){
            $("#recettes").html("");
            afficheRecettes('<?php echo "$tmp1111"; ?>');
        });
    </script>

    <?php
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                                            echo                                                   '</ul>
                                                            </li>';
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                    echo                                                   '</ul>
                                                            </li>';
                                                }
                                            }
                                        }
                                    }
                                                            echo                            '</ul>
                                </li>';
                                                        }
                                                    }
                                                }
                                            }


                                            echo                  '</ul>
                        </li>';
                                        }
                                    }
                                }
                            }
          echo           '</ul>
                </li>
            </ul>
        </div>';
      }
        echo"</div>";
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
        echo "tab[\"".$GLOBALS['key1']."\"]['sous-categorie'] = new Array() ;"."\r\n" ;
        foreach ($GLOBALS['value1'] as $GLOBALS['key2']  => $GLOBALS['value2']) {
            if ($GLOBALS['key1'] != "Aliment" && $GLOBALS['key2']=="sous-categorie") {
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
function tabDeRecettesPourPhotos(){

<?php
      echo "var tab = new Array() ;"."\r\n" ;
foreach ($GLOBALS['Recettes'] as $GLOBALS['key1'] =>  $GLOBALS['value1']) {
    echo "tab[".$GLOBALS['key1']."] = new Array()"."\r\n" ;
    foreach ($GLOBALS['value1'] as $GLOBALS['key2']  => $GLOBALS['value2']) {
        if ($GLOBALS['key2']=="titre") {
            echo "tab[".$GLOBALS['key1']."][\"titre\"] = \"".str_replace("\"", '\"', $GLOBALS['value2'])."\" ; "."\r\n" ;
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

          $("#recettes").append($(

      "<li class='row mt-2 mb-2 mx-auto list-group'>"
  +"<div class='text-center' id='produitAffiche1'>"+
          "            <ul class='list-group-item'>"+
          "      <img class='img-rounded zoom ' src='$photo' width='150' height='150'/>"+
          "             </ul>"+
          "           <p class='mx-auto' style='width:200px;'>"+titre+"</p>"+
          "             <a class='w-100 btn btn-outline-warning' href='infoRecette.php?title="+titre+"'><i class='fas fa-info-circle'></i> Info</a>"+
          "            <a class='w-100 btn btn-outline-danger' href='accueil.php?titre="+titre+"'><i class='far fa-thumbs-up'></i> Favoris</a> "+
          "     </div></li>"


          ).addClass("recette"));




    }
}

for(var i in tableau_aliments[alim]['sous-categorie']){

    afficheRecettes(tableau_aliments[alim]['sous-categorie'][i],tableau_recettes,tableau_aliments);

}
}



   </script>








<script type="text/javascript">


$(document).ready(function () {

    $('.navbar .dropdown-item').on('click', function (e) {
        var $el = $(this).children('.dropdown-toggle');
        var $parent = $el.offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');
        $("body").click(function(){
          $(".dropdown-menu").find('.show').removeClass('show');
        })
        if (!$parent.parent().hasClass('navbar-nav')) {
            if ($parent.hasClass('show')) {
                $parent.removeClass('show');
                $el.next().removeClass('show');
                $el.next().css({"top": -999, "left": -999});
            } else {
                $parent.parent().find('.show').removeClass('show');
                $parent.addClass('show');
                $el.next().addClass('show');
                $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
            }
            e.preventDefault();
            e.stopPropagation();
        }
    });

    $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
        $(this).find('li.dropdown').removeClass('show open');
        $(this).find('ul.dropdown-menu').removeClass('show open');
    });

});

    var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

var states = <?php echo json_encode($tabAliments); ?>

$('#the-basics .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
});



</script>
