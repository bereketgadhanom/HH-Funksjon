<?php session_start(); ?>
<?php require('header-body.php');

  ?>
    <main>
        <?php
         // else {echo "<p> <a href='index.php'>Vennligst fyll ut skjemaet på nytt.</a></p>"; }
          // Hvis knappen er trykket
            if(empty($_SESSION['email'])) {
              echo "<p> <a href='index.php'>Vennligst fyll ut skjemaet på nytt.</a></p>"; }
              else {
                //Henter databasetilkoblingen
                require("db.php");
                //Vaske data for SQL Injections
                $navn_clean = mysqli_real_escape_string($db_con, $_SESSION['name']);
                $epost_clean = mysqli_real_escape_string($db_con, $_SESSION['email']);
                $phone_clean = mysqli_real_escape_string($db_con, $_SESSION['phone']);
                $rom_type_clean = mysqli_real_escape_string($db_con, $_SESSION['roomtype']);
                $innsjekk_clean = mysqli_real_escape_string($db_con, $_SESSION['check-in']);
                $utsjekk_clean = mysqli_real_escape_string($db_con, $_SESSION['check-out']);
                $antall_rom_clean = mysqli_real_escape_string($db_con, $_SESSION['quantity']);
                $rom_clean = mysqli_real_escape_string($db_con, $_SESSION['room_number']);
                $people_clean = mysqli_real_escape_string($db_con, $_SESSION['people']);
                $maaltid_clean = mysqli_real_escape_string($db_con, $_SESSION['meals']);
                  $mt = implode(', ', $maaltid_clean);
                $parkering_clean = mysqli_real_escape_string($db_con, $_SESSION['parking']);
                $parkering_id_clean = mysqli_real_escape_string($db_con, $_SESSION['parking-place']);

                // $parkering_nei_clean = mysqli_real_escape_string($db_con, $_SESSION['parking-no']);


                //Så forbereder vi en INSERT-spørring

              $sql_booking ="INSERT INTO booking(navn,epost,telefon,rom_type_id,innsjekk_dato,utsjekk_dato,antall_rom,rom_id,antall_personer,maaltid,parkering, parkering_id)
                      VALUES(
                      '".$navn_clean."',
                      '".$epost_clean."',
                      '".$phone_clean."'
                      '".$kunde_id."',
                      '".$rom_type_clean."',
                      '".$innsjekk_clean."',
                      '".$utsjekk_clean."',
                      '".$antall_rom_clean."',
                      '".$rom_clean."',
                      '".$people_clean."',
                      '".$mt."',
                      '".$parkering_clean."',
                      '".$parkering_id_clean."'
                )";

                  $sett_inn = mysqli_query($db_con, $sql_booking);

                    //Sjekk om spørringen ble kjørt uten feil.
                    if($sett_inn == true) {
                        echo "<h1>Thank you! / Takk!</h1><p> Your booking is registered / Din booking er registrert.</p>";

                        //Avslutt session
                        session_destroy();

                    } else {
                        echo "<p> Sorry, Some thing is wrong right now. Try again later.  / Beklager, vi opplever noen problemer akkurat nå. Vennligst prøv igjen senere.</p>";
                    }
                }
              ?>
          </main>
<?php require('footer-body.php'); ?>
