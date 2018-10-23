<?php
if (!empty($_SESSION)){
    echo "<form action='?ctrl=employe&mth=logout' method='post'>
    <input type='submit' value='Déconnexion' name='logout'>
    </form>";
    //echo "<a href='?ctrl=employe&mth=logout'>Déconnexion</a>";
    
}

// if (isset($_POST['logout'])){
//     session_unset();
//     session_destroy();
//     //echo session_status();
//     //header("Location: ?ctrl=Accueil&mth=index");
//     exit();
// }


?>