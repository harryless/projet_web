
<?php
//tableau d aliments
foreach ($Hierarchie as $key1 =>$aliment){

    foreach ($aliment as $key2 =>$value) {

        foreach ($value as $key3 => $tmp) {
          if($key1=="Aliment" ){
            $tabAliments[]=$tmp;
          }
        }
      }
    }



    ?>
    <?php
    echo '<div class="navbar navbar-expand-md border border-danger navbar-dark mb-4 container" role="navigation" style="background:rgba(0,0,0,0.5)">';
      foreach ($tabAliments as $key =>$a){



    echo    '<div class="collapse navbar-collapse" id="navbarCollapse">';
    echo        '<ul class="navbar-nav mr-auto">';

    echo            '<li class="nav-item dropdown">';
    echo               '<a class="nav-link btn dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$a.'</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown1">';
                            foreach ($Hierarchie as $key1 =>$aliment){
                              foreach ($aliment as $key2 =>$value) {
                                foreach ($value as $key3 => $tmp) {
                                        if($key1==$a && $key2=='sous-categorie'){
    echo                   '<li class="dropdown-item dropdown">
                            <a class="dropdown-toggle" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$tmp.'</a>

                            <ul class="dropdown-menu" aria-labelledby="dropdown1-1">';
                                            foreach ($Hierarchie as $key11 =>$aliment){
                                              foreach ($aliment as $key22 =>$value) {
                                                foreach ($value as $key33 => $tmp1) {
                                                    if( $key11==$tmp && $key22=="sous-categorie" ){
    echo                       '<li class="dropdown-item dropdown">
                                    <a class="dropdown-toggle" id="dropdown1-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$tmp1.'</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdown1-1-1">';
                                    foreach ($Hierarchie as $key111 =>$aliment){
                                      foreach ($aliment as $key222 =>$value) {
                                        foreach ($value as $key333 => $tmp11) {
                                            if( $key111==$tmp1 && $key222=="sous-categorie" ){
    echo                                                '<li class="dropdown-item dropdown">
                                                            <a class="dropdown-toggle" id="dropdown1-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$tmp11.'</a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdown1-1-1">';
                                                            foreach ($Hierarchie as $key1111 =>$aliment){
                                                              foreach ($aliment as $key2222 =>$value) {
                                                                foreach ($value as $key3333 => $tmp111) {
                                                                    if( $key1111==$tmp11 && $key2222=="sous-categorie" ){

    echo                                                                    '<li class="dropdown-item dropdown">
                                                            <a class="dropdown-toggle" id="dropdown1-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$tmp111.'</a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdown1-1-1">';
                                                            foreach ($Hierarchie as $key11111 =>$aliment){
                                                              foreach ($aliment as $key22222 =>$value) {
                                                                foreach ($value as $key33333 => $tmp1111) {
                                                                    if( $key11111==$tmp111 && $key22222=="sous-categorie" ){
    echo                                                                    '<li>'.$tmp1111.'</li>';
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


    <div id="the-basics">
    <input class="typeahead" type="text" placeholder="States of USA">


  </div>



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



