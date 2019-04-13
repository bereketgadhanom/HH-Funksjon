<?php 
    session_start();
    // sjekk om brukeren er logget seg inn, hvis ikke sende til login side
    if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
        session_destroy();
        header("location: login.php");
        exit;
}?>

<?php session_start(); ?>
<?php require('admin-header.php');?>
    <main>
        <?php
            // definere variabel
                $errors = array(); 
                require('db.php'); // Koble til databasen
                
            // Register bruker
            if (isset($_POST['register'])) {
            
                // Vask dataene
                $navn_clean = mysqli_real_escape_string($db_con, $_POST['full_name']);
                $epost_clean = mysqli_real_escape_string($db_con, $_POST['email']);
                $pass_1_clean = mysqli_real_escape_string($db_con, $_POST['password']);
                $pass_2_clean = mysqli_real_escape_string($db_con, $_POST['confirm-password']);

                // Passordskrav/regler
                if ($pass_1_clean != $pass_2_clean) {
                    array_push($errors, "Passordene er ikke like");
                }
                
                if( strlen($pass_1_clean) < 8 ) { // Passordet skal være minst 8 tegn
                    array_push($errors, "Passordet er forkort, må være minst 8 tegn");
                }
                  
                if( !preg_match("#[0-9]+#", $pass_1_clean ) ) {
                    array_push($errors, "Passordet må inneholde minst et tall ");
                }
                    
                if( !preg_match("#[a-z]+#",  $pass_1_clean) ) {
                    array_push($errors, "Passordet må inneholde minst en små bokstav ");
                }
                     
                if( !preg_match("#[A-Z]+#",  $pass_1_clean) ) {
                    array_push($errors, "Passordet må inneholde minst en stor bokstav ");
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
                    $passord= password_hash($pass_1_clean, PASSWORD_DEFAULT); //Krypter passordet 

                    $sql = "INSERT INTO admin_bruker (navn, epost, passord) 
                            VALUES('".$navn_clean."', '".$epost_clean."', '".$passord."')";
                    // sett inn bruker i databasen
                    $sett_inn = mysqli_query($db_con, $sql);
                    
                    //Sjekk om registeringen fullført uten feil
                    if($sett_inn == true){
                        $_SESSION['success'] = "Registeringen er utført ";
                        header('location: login.php');
                        // session_destroy(); // Avslutt sessionen
                    }
                    else{
                        array_push($errors, "Beklager, vi opplever noen problemmer akkurat nå. Vennligst prøv igjen");
                    }  
                        
                }
            }
        ?>
    </main>
<?php require('footer-body.php'); ?>