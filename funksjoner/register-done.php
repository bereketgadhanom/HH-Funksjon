<?php session_start(); ?>
<?php require('admin-header.php'); ?>
    <main>
        <?php
            // initialisere variabel
                $errors = array(); 
                require('db.php'); // Koble til databasen
                
            // Register bruker
            if (isset($_POST['register'])) {
            
                // Vask dataene
                $navn_clean = mysqli_real_escape_string($db_con, $_POST['full_name']);
                $epost_clean = mysqli_real_escape_string($db_con, $_POST['email']);
                $pass_1_clean = mysqli_real_escape_string($db_con, $_POST['password']);
                $pass_2_clean = mysqli_real_escape_string($db_con, $_POST['confirm-password']);

                // Sjekk om passordene er like
                if ($pass_1_clean != $pass_2_clean) {
                    array_push($errors, "Passordene er ikke like");
                }

                // Hent databasen fra DB for å sjekke om brukeren er registrert fra før
                $bruker_sql = "SELECT * FROM admin_bruker WHERE epost='$epost_clean' LIMIT 1";
                $resultat = mysqli_query($db_con, $bruker_sql);
                $bruker = mysqli_fetch_assoc($resultat);
                
                if ($bruker) { // sjekk om brukeren finnes fra før
                    if ($bruker['epost'] === $epost_clean) {
                        array_push($errors, "Brukeren eksisterer");
                    }
                }

                // Register brukeren om det ikke er noe feil
                if (count($errors) == 0) {
                    $passord= md5($pass_1_clean); //Krypter passordet 

                    $sql = "INSERT INTO admin_bruker (navn, epost, passord) 
                            VALUES('".$navn_clean."', '".$epost_clean."', '".$passord."')";
                    // sett inn bruker i databasen
                    $sett_inn = mysqli_query($db_con, $sql);
                    
                    //Sjekk om registeringen fullført uten feil
                    if($sett_inn == true){
                        $_SESSION['epost'] = $epost_clean;
                        $_SESSION['success'] = "Registeringen er fullført og du er logget deg inn";
                        header('location: admin.php');
                       
                        session_destroy(); // Avslutt sessionen
                    }
                    else{
                        array_push($errors, "Beklager, vi opplever noen problemmer akkurat nå. Vennligst prøv igjen");
                    }  
                        
                }
            }
        ?>
    </main>
<?php require('footer-body.php'); ?>