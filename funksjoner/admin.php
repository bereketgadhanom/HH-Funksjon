<?php
    // Start sessionen
        session_start();
 
    // sjekk om brukeren er logget seg inn, hvis ikke sende til login side
    // if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
    //     header("location: login.php");
    //     exit;
    // }


        // if (!isset($_SESSION['epost'])) {
        //     $_SESSION['msg'] = "You must log in first";
        //     header('location: login.php');
        // }
        // if (isset($_GET['logout'])) {
        //     session_destroy();
        //     unset($_SESSION['email']);
        //     header("location: login.php");
        // }
?>

<?php require('admin-header.php'); ?>

    <main> 
        <h1>Registreringer</h1> 
        <?php 
            if($_GET['msg'] == "ok") { 
                echo "<p>Oppføringen er oppdatert.</p>"; 
            } 
            if($_GET['msg'] == "error") { 
                echo "<p>Oppføringen kunne oppdateres akkurat nå.</p>"; 
            } 
            //Hente databaseoppkobling 
            require("db.php"); 

            //Sjekke om action er satt til delete 
            if($_GET['action'] == "delete" && !empty($_GET['id'])) { 
                $id = mysqli_real_escape_string($db_con, $_GET['id']); 
                $del_sql = "DELETE FROM booking WHERE epost = '".$id."'"; 
                $run_del = mysqli_query($db_con, $del_sql); 

                if($run_del == true) { 
                    echo "<p>Oppføringen er slettet.</p>"; 
                } else { 
                    echo "<p>Oppføringen kunne ikke slettes nå.</p>"; 
                } 
            } 
        ?> 
        <table> 
            <thead> 
                <tr> 
                    <th>Navn</th> 
                    <th>E-post</th> 
                    <th>Tlf</th> 
                    <th>Rom Type</th> 
                    <th>Innsjekk dato</th> 
                    <th>Utsjekk dato</th>
                    <th>Antallrom</th> 
                    <th>Rom</th>
                    <th>Antall personer</th>
                    <th>Lunsj</th> 
                    <th>Middag</th>
                    <th>Parkering</th> 
                    <th>Parking ID</th> 
                    <th>Handlinger</th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php 
                    // Sql spørring for å hente data
                    $hent_data = "SELECT * FROM booking, rom_type, rom, parkering WHERE  booking.rom_type_id = rom_type.id AND booking.rom_id = rom.id AND booking.parkering_id = parkering.id"; 
                    
                    // Hent data som er registrert 
                    $data = mysqli_query($db_con, $hent_data); 

                    //Løpe gjennom resultater, og skrive ut en ny rad i tabellen for hver registrering 
                    while($dt = mysqli_fetch_array($data)) { 
                        echo 
                        "<tr> 
                            <td>".$dt['navn']."</td> 
                            <td>".$dt['epost']."</td> 
                            <td>".$dt['telefon']."</td> 
                            <td>".$dt['rom_type_id']."</td> 
                            <td>".$dt['innsjekk_dato']."</td> 
                            <td>".$dt['utsjekk_dato']."</td>
                            <td>".$dt['antall_rom']."</td> 
                            <td>".$dt['rom_id']."</td> 
                            <td>".$dt['antall_personer']."</td>
                            <td>".$dt['lunsj']."</td> 
                            <td>".$dt['middag']."</td>
                            <td>".$dt['parkering']."</td> 
                            <td>".$dt['parkering_id']."</td>
                            <td><a href='edit.php?id=".$dt['epost']."'>Rediger</a> / <a href='admin.php?action=delete&amp;id=".$dt['epost']."'>Slett</a></td>                        </tr>"; 
                    }
                ?> 
            </tbody> 
        </table> 
    </main> 
<?php require('footer-body.php'); ?>