<?php 
    if(isset($_POST)) { 
        //Gjør klar en array til vaskede data 
        $vasket = array(); 

        //Hente databasetilkobling 
        require("db.php"); 

        //Vaske postdata 
        foreach($_POST as $key => $value) { 
            $vasket[$key] = mysqli_real_escape_string($db_con, $value); 

        } 
   
        //Lage en SQL som oppdaterer denne spesifikke oppføringen: 
        $update_sql = "UPDATE booking SET  
        navn = '".$vasket['full_name']."',  
        epost = '".$vasket['email']."',  
        telefon = '".$vasket['phone']."', 
        rom_type_id = '".$vasket['roomtype']."', 
        innsjekk_dato = '".$vasket['checkin']."', 
        utsjekk_dato = '".$vasket['checkout']."', 
        antall_rom = '".$vasket['quantity']."', 
        rom_id = '".$vasket['room_number']."', 
        antall_personer = '".$vasket['people']."', 
        lunsj = '".$vasket['lunch']."',
        middag = '".$vasket['dinner']."',
        parkering = '".$vasket['parking']."',
        parkering_id = '".$vasket['parkering-place']."'
         WHERE epost = '".$vasket['email']."' 
        "; 

        //Kjør oppdateringsspørringen mot databasen. 
        $oppdater = mysqli_query($db_con, $update_sql); 

        if($oppdater == true) { 
            header("Location: admin.php?msg=ok"); 
        } else { 
            header("Location: admin.php?msg=error"); 
        } 

    } 
    else { 
        header("Location: admin.php"); 
    } 
?>