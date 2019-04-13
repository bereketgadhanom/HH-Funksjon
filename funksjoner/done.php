<?php session_start(); ?>
<?php require('header-body.php');  ?>
    <main>
        <?php
            if(empty($_SESSION['email'])) {
              echo "<p> <a href='index.php'>Vennligst fyll ut skjemaet på nytt.</a></p>"; }
              else {
             
                //Henter databasetilkoblingen
                require("db.php");
                //Vaske data for SQL-angrep
                $navn_clean = mysqli_real_escape_string($db_con, $_SESSION['full_name']);
                $epost_clean = mysqli_real_escape_string($db_con, $_SESSION['email']);
                $phone_clean = mysqli_real_escape_string($db_con, $_SESSION['phone']);
                $rom_type_clean = mysqli_real_escape_string($db_con, $_SESSION['roomtype']);
                $innsjekk_clean = mysqli_real_escape_string($db_con, $_SESSION['checkin']);
                $utsjekk_clean = mysqli_real_escape_string($db_con, $_SESSION['checkout']);
                $netter_clean = mysqli_real_escape_string($db_con, $_SESSION['nights']);
                $antall_rom_clean = mysqli_real_escape_string($db_con, $_SESSION['quantity']);
                $rom_clean = mysqli_real_escape_string($db_con, $_SESSION['room_number']);
                $people_clean = mysqli_real_escape_string($db_con, $_SESSION['people']);
                $lunsj_clean = mysqli_real_escape_string($db_con, $_SESSION['lunch']);
                $middag_clean = mysqli_real_escape_string($db_con, $_SESSION['dinner']);
                $parkering_clean = mysqli_real_escape_string($db_con, $_SESSION['parking']);
                $parkering_navn_clean = mysqli_real_escape_string($db_con, $_SESSION['parking-place']);
                $pris_clean = mysqli_real_escape_string($db_con, $_SESSION['price']);

                //forbereder insertspørring
              $sql_booking ="INSERT INTO booking(navn,epost,telefon,rom_type_id,innsjekk_dato,utsjekk_dato,netter,antall_rom,rom_id,antall_personer,lunsj,middag,parkering, parkering_navn, total_pris)
                      VALUES(
                      '".$navn_clean."',
                      '".$epost_clean."',
                      '".$phone_clean."',
                      '".$rom_type_clean."',
                      '".$innsjekk_clean."',
                      '".$utsjekk_clean."',
                      '".$netter_clean."',
                      '".$antall_rom_clean."',
                      '".$rom_clean."',
                      '".$people_clean."',
                      '".$lunsj_clean."',
                      '".$middag_clean."',
                      '".$parkering_clean."',
                      '".$parkering_navn_clean."',
                      '".$pris_clean."'
                )";

                  $sett_inn = mysqli_query($db_con, $sql_booking);

                    //Sjekk spørringsstatus
                    if($sett_inn == true) {
                        echo "<h1 style='color:green'>Thank you! / Takk!</h1><p> Your booking is registered / Din booking er registrert.</p>";

                        //Avslutt session
                        session_destroy();
                       echo "<a href='index.php'> Back / Tilbake </a> ";
                    } else {
                        echo "<p style='color:red'> Sorry, Some thing is wrong right now. Try again later.  / Beklager, vi opplever noen problemer akkurat nå. Vennligst prøv igjen senere.</p>";
                        echo "<a href='index.php'> Back / Tilbake </a> ";
                      }
                }
              ?>
          </main>
<?php require('footer-body.php'); ?>
