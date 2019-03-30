<?php session_start(); ?>
<?php require('header-body.php'); ?>
    <main> 
        <?php 
            if(!empty($_SESSION['epost'])) { 
                echo "<p> <a href='index.php'>Vennligst fyll ut skjemaet igjen.</a></p>"; 
            } else { 
                //Her henter vi databasetilkoblingen 
                require("db.php"); 

                //Vaske data for SQL Injections 
                $navn_clean = mysqli_real_escape_string($db_con, $_SESSION['name']); 
                $epost_clean = mysqli_real_escape_string($db_con, $_SESSION['email']); 
                $phone_clean = mysqli_real_escape_string($db_con, $_SESSION['phone']);
                $rom_type_clean = mysqli_real_escape_string($db_con, $_SESSION['roomtype']);
                $antall_rom_clean = mysqli_real_escape_string($db_con, $_SESSION['quantity']);
                $innsjekk_clean = mysqli_real_escape_string($db_con, $_SESSION['check-in']);
                $utsjekk_clean = mysqli_real_escape_string($db_con, $_SESSION['check-out']);
                $parkering_ja_clean = mysqli_real_escape_string($db_con, $_SESSION['parking-yes']);
                $parkering_nei_clean = mysqli_real_escape_string($db_con, $_SESSION['parking-no']);
                $lunsj_clean = mysqli_real_escape_string($db_con, $_SESSION['lunch']);
                $middag_clean = mysqli_real_escape_string($db_con, $_SESSION['dinner']);
                $people_clean = mysqli_real_escape_string($db_con, $_SESSION['people']);
                
                //Så forbereder vi en INSERT-spørring 
                $sql_kunde = "INSERT INTO kunde(navn,epost,telefon) VALUES( 
                    '".$navn_clean."', 
                    '".$epost_clean."', 
                    '".$phone_clean."'
                )"; 

                $sql_parkering = "INSERT INTO parkering(ja, nei) VALUES(
                    '".$parkering_ja_clean."',
                    '".$parkering_nei_clean."'
                )";

                   $sql_booking = "INSERT INTO booking(innsjekk_dato,utsjekk_dato,antall_rom, antall_personer) VALUES(
                        
                        '".$innsjekk_clean."', 
                        '".$utsjekk_clean."', 
                        '".$antall_rom_clean."',
                        '".$people_clean."'
                    )"; 

                
                $sql_maaltid = "INSERT INTO maaltid(lunsj,middag) VALUES( 
                    '".$lunsj_clean."', 
                    '".$middag_clean."', 
                )"; 

                
                /* HVORDAN TESTE SPØRRINGEN: 
                echo $sql; 
                Kopier utskriften av SQL inn i SQL-fanen i PHPMyAdmin og kjør 
                */ 

                //Kjør spørringen mot databasen 
                $sett_inn = mysqli_query($db_con, $sql_kunde);
                $sett_inn = mysqli_query($db_con, $sql_parkering); 
                $sett_inn = mysqli_query($db_con, $sql_maaltid);
                $sett_inn = mysqli_query($db_con, $sql_booking);
               
                

                //Sjekk om spørringen ble kjørt uten feil. 
                if($sett_inn == true) { 
                    echo "<h1>Thank you! / Takk!</h1><p> Your booking is registered / Din booking er registrert.</p>"; 

                    //Avslutte session 
                    session_destroy(); 

                } else { 
                    echo "<p> Sorry, Some thing is wrong right now. Try again later.  / Beklager, vi opplever noen problemer akkurat nå. Vennligst prøv igjen senere.</p>"; 
                } 
            } 
        ?> 
    </main> 
<?php require('footer-body.php'); ?>