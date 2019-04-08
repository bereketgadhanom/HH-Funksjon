<?php 
    session_start();
    
    require('header-body.php'); 
?>
    <main>
        <h1> Loginnskjema </h1>

        <form action="" method="post">
            <?php include('errors.php'); ?>
            <fieldset>
                <legend> Loginn informasjon </legend>
                <div>
                    <label for="email"> E-post </label>
                    <input type="email" name="email" required />

                </div>
                <div>
                    <label for="password"> Passord </label>
                    <input type="password" name="password" required />
                </div>
            </fieldset>
            <button type="submit" name="login"> Login </button>
        </form>

        <!-- |  php kode for validering     -->
        <?php
                // Initialisere error array
                $errors = array();
                require('db.php'); // Inkluderer DB
            
            // Sjekker om login knappen er trykket
            if(isset($_POST['login'])){

                // Vask input dataene for injection angrep
                $epost_vask = mysqli_real_escape_string($db_con, $_POST['email']);
                $passord_vask = mysqli_real_escape_string($db_con, $_POST['password']);

                // Krypter passordet
                $passord_k = md5($passord_vask);

                // Spørring for epost og passord
                $sql = " SELECT  * FROM admin_bruker WHERE epost='$epost_vask' LIMIT 1";
                $resultat= mysqli_query($db_con, $sql);
                $hent_data = mysqli_fetch_assoc($resultat);

                if($hent_data==1){
                    // $_SESSION['success'] = "Du er logget ";
                    header("location: admin.php");
                    
                    session_destroy(); // Avslutt sessionen
                }
                else {
                    array_push($errors, "Eposten eller passordet er feil");
                }
            }
        ?>
    </main>
<?php require('footer-body.php'); ?>