<?php
    session_start(); //Start sesjonen
    session_destroy(); //Avslutt den
    header("location: login.php"); 
?>