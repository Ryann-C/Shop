<?php
session_start();
if (isset($_SESSION['Admin'])){
    $_SESSION['Admin'] = array();

    session_destroy();

    header('Location: ../');
} else{
    header('Location: ../login.php');
}
?>