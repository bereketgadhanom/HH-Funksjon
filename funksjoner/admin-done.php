<?php 
    if(isset($_POST)) { 
        //Gjør klar en array til vaskede data 
        $washed = array(); 

        //Hente databasetilkobling 
        require("db.php"); 

        //Vaske postdata 
        foreach($_POST as $key => $value) { 
            $washed[$key] = mysqli_real_escape_string($db_con, $value); 
        } 

        //Lage en SQL som oppdaterer denne spesifikke oppføringen: 
        $update_sql = "UPDATE kunde SET  
        navn = '".$washed['navn']."',  
        epost = '".$washed['epost']."',  
        telefon = '".$washed['telefon']."', 
        valgfag = '".$washed['valgfag']."', 
        kravspek = '".$washed['kravspek']."', 
        besk = '".$washed['besk']."', 
        gruppe = '".$washed['gruppe']."', 
        gruppemedlemmer = '".$washed['gruppemedlemmer']."', 
        dag = '".$washed['dag']."', 
        tid = '".$washed['tid']."' WHERE epost = '".$washed['epost']."' 
        "; 

        //Kjør oppdateringsspørringen mot databasen. 
        $oppdater = mysqli_query($db_con, $update_sql); 

        if($oppdater == true) { 
            header("Location: admin.php?msg=ok"); 
        } else { 
            header("Location: admin.php?msg=error"); 
        } 

    } else { 
        header("Location: admin.php"); 
    } 
?>