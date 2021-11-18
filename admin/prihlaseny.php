<?php
include 'hlavickaAdmin.php';
include 'navbarAdmin.php';

session_start();
?>
<h2>Ste prihlásený!</h2>

<form method="post">
            <input type="submit" value="Odhlásiť sa" name="signOut" style="margin-right:auto; margin-left:auto;
            display:block; margin-bottom:5%">
        </form>
<?php



if(isset($_POST["signOut"]))
{
    unset($_SESSION["user"]);
    unset($_SESSION["rola"]);
    header('Location: index.php');
}

include 'pataAdmin.php';
?>
