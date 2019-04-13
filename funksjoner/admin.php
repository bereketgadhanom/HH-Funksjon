
<?php
    // Start sessionen
        session_start();
    // sjekk om brukeren er logget seg inn, hvis ikke sende til login side
    if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
        session_destroy();
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="no">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Havnehotell funksjon </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="../css/hh-stil.css">
        <?php include('metadata.php'); ?> <br>
    </head>
    <body id="admin-body">
        <header>
            <img id="logo" src="../bilder/halden_havnehotell_logo.png" alt="logo" />
            <nav>  
                <a href="register.php"> Register </a> 
                <a href="logout.php" name="logout"> Logout </a>
            </nav>
        </header>
            <main id="admin-main"> 
                <h1>Registreringer</h1> 
                <?php 
                    if($_GET['msg'] == "ok") { 
                        echo "<p style='color:green'> <span style='font-size:30px;'>&#9749;</span> Bookingen er oppdatert.</p>"; 
                    } 
                    if($_GET['msg'] == "error") { 
                        echo "<p style='color:red'> <span style='font-size:30px;'>&#128553;</span> Bookingen kunne ikke oppdaters </p>"; 
                    } 
                    //Kobler til DB 
                    require("db.php"); 

                    //Sjekke om knappen slett er trykket / action er satt på delete
                    if($_GET['action'] == "delete" && !empty($_GET['id'])) { 
                        $id = mysqli_real_escape_string($db_con, $_GET['id']); 
                        $del_sql = "DELETE FROM booking WHERE epost = '".$id."'"; 
                        $run_del = mysqli_query($db_con, $del_sql); 

                        if($run_del == true) { 
                            echo "<p style='color:green'><span style='font-size:30px;'>&#9749;</span> Bookingen er slettet.</p>"; 
                        } else { 
                            echo "<p style='color:red><span style='font-size:30px;'>&#128553; Bookingen kunne ikke slettes.</p>"; 
                        } 
                    } 
                ?> 
                <!-- Tabell som viser registrerte bookinger -->
                <table id="admin-table"> 
                    <thead> 
                        <tr> 
                            <th>Navn</th> 
                            <th>E-post</th> 
                            <th>Tlf</th> 
                            <th>Rom Type</th> 
                            <th>Innsjekk dato</th> 
                            <th>Utsjekk dato</th>
                            <th>Antallnetter</th>
                            <th>Antallrom</th> 
                            <th>Rom</th>
                            <th>Antall personer</th>
                            <th>Lunsj</th> 
                            <th>Middag</th>
                            <th>Parkering</th> 
                            <th>Parking navn</th> 
                            <th>Pris</th> 
                            <th>Handlinger</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        <?php 
                            // Sql spørring for å hente booking-data
                            $hent_data = "SELECT * FROM booking, rom_type, rom, parkering WHERE  booking.rom_type_id = rom_type.id AND booking.rom_id = rom.id AND booking.parkering_navn = parkering.p_navn"; 
                            
                            // Hent booking-data som er registrert 
                            $data = mysqli_query($db_con, $hent_data); 

                            //Liste opp alle registreringer  
                            while($dt = mysqli_fetch_array($data)) { 
                                echo 
                                "<tr> 
                                    <td>".$dt['navn']."</td> 
                                    <td>".$dt['epost']."</td> 
                                    <td>".$dt['telefon']."</td> 
                                    <td>".$dt['rom_type_id']."</td> 
                                    <td>".$dt['innsjekk_dato']."</td> 
                                    <td>".$dt['utsjekk_dato']."</td>
                                    <td>".$dt['netter']."</td>
                                    <td>".$dt['antall_rom']."</td> 
                                    <td>".$dt['rom_id']."</td> 
                                    <td>".$dt['antall_personer']."</td>
                                    <td>".$dt['lunsj']."</td> 
                                    <td>".$dt['middag']."</td>
                                    <td>".$dt['parkering']."</td> 
                                    <td>".$dt['parkering_navn']."</td>
                                    <td>".$dt['total_pris']."</td>
                                    <td><a style='width:80%' href='edit.php?id=".$dt['epost']."'>Rediger</a>
                                        <a onClick=\"return confirm('Er du sikker');\" style='width:80%' href='admin.php?action=delete&amp;id=".$dt['epost']."' >Slett</a>
                                    </td>                       
                                </tr>"; 
                            }
                        ?> 
                    </tbody> 
                </table> 
        </main> 
        <footer id="admin-footer">
            <p> &copy; Havnehotell <img id="icon" src="../bilder/halden_havnehotell_ikon.png"/></p>
            <a href="mailto:post@hhih.no"> E-post</a>
            <p> <strong> Adresse : </strong> Mathias Bjørns gate, Halden</p>
            <p> <strong> Tlf : </strong> 6922334455 </p>
        </footer>
    </body>
</html>