<?php
    session_start( );

    if(isset($_SESSION['connected'])){
        if($_SESSION['connected'] == true){
            session_destroy();
            header('Location: /projet_web/login.php');
            exit();
        }
    }
?>
