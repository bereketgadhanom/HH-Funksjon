<?php
    // Initialiserer error array
    $errors = array();
    require('db.php'); // Inkluderer DB

    // Sjekker om login knappen er trykket
    if(isset($_POST['login'])){

        // Vask input data-ene for injection angrep
        $epost_vask = mysqli_real_escape_string($db_con, $_POST['email']);
        $passord_vask = mysqli_real_escape_string($db_con, $_POST['password']);

        // Spørring for epost og passord, sammenligner med eposten fra input
        $sql = " SELECT * FROM admin_bruker WHERE epost='$epost_vask' LIMIT 1"; 
        $resultat= mysqli_query($db_con, $sql);
        $hent_data = mysqli_fetch_assoc($resultat);
        
        if($hent_data){
                // Sjekk om passordene er like
            if (password_verify($passord_vask, $hent_data['passord'])) {
                $_SESSION['login']=true;
                header("location: admin.php");
            }
            else {
                array_push($errors, "Eposten eller passordet er feil");
            }
        }
        else{
            array_push($errors, "Feil epost");
        }
    }
?>
 