<?php
    // Start sessionen
        session_start();
    // sjekk om brukeren er logget seg inn, hvis ikke sende til login side
    if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
        session_destroy();
        header("location: login.php");
        exit;
    }
    
require('admin-header.php'); //inkluderer header
?>

    <main>
        <?php 
            
            require("db.php"); // DB kobling
            $id = mysqli_real_escape_string($db_con, $_GET['id']);  //Vask dataene 
            $sql = "SELECT * FROM booking WHERE epost = '".$id."'";   //Spørring om dataene 
            $run = mysqli_query($db_con, $sql);  //kjør spørringen 
            $data = mysqli_fetch_array($run); //Lagre dataene i variabell
        ?> 
            <form action="admin-done.php" method="post">
                <h2>Booking form / Bookingskjema </h2>
                <!-- Kundeinfo. felt -->
                <fieldset id="name-epost-phone">
                    <legend> Person-informasjon </legend>
                    <div>
                        <label for="full_name">Navn </label>
                        <input type="text" name="full_name"  value="<?php echo $data['navn'] ;?>"
                            required/>
                    </div>
                    <div>
                        <label for="email">E-post</label>
                        <input type="email" name="email"  value="<?php echo $data['epost'] ;?>"
                             required/>
                    </div>
                    <div>
                        <label for="phone"> Telefon </label>
                        <input type="text" name="phone"  value="<?php echo $data['telefon'] ;?>"
                             required />
                    </div>
                </fieldset>

                <!-- Varighetsfelter -->
                <fieldset>
                    <legend> Sjekking </legend>
                    <div>
                        <label for="checkin">Innsjekksdato </label>
                        <input type="text" id="check-in" name="checkin" value="<?php echo $data['innsjekk_dato'] ;?>"  required />
                    </div>
                    <div>
                        <label for="checkout">Utsjekksdato </label>
                        <input type="text" id="check-out" name="checkout" value="<?php echo $data['utsjekk_dato'] ;?>" required />
                    </div>
                    <div>
                    <label for="nights">Antall netter </label>
                    <input type="number" id="antall_netter" name="nights" value="<?php echo $data['netter'] ;?>" required min="1" />
                </div>
                </fieldset>

                <!-- Romtypefelter -->
                <fieldset>
                    <legend> Romtype </legend>
                    <div>
                        <label for="roomtype"> Velg romtype </label>
                        <select  name="roomtype"  id="roomtype" required>
                        <option value=""> Velg romtype </option>
                            <?php
                                $room_type_sql = "SELECT * FROM rom_type";
                                $room_type_results = mysqli_query($db_con, $room_type_sql);
                                while($room_type = mysqli_fetch_array($room_type_results)) {
                                    if($room_type['id'] == $data['rom_type_id']) {
                                        echo "<option value='".$room_type['id']."' selected='selected'>".$room_type['romtype_navn']."</option>";
                                    }
                                    else {
                                        echo "<option  value='".$room_type['id']."'>".$room_type['romtype_navn']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <select class="room_option" name="room_number"  id="room_number_e" >
                            <option value="">  Velg enkelt rom </option>
                            <?php
                            $room1_sql = "SELECT * FROM rom WHERE rom_type_id=1 ";
                            $room1_results = mysqli_query($db_con, $room1_sql);
                                while($room_e = mysqli_fetch_array($room1_results)){
                                    if($room_e['id'] == $data['rom_id'] ){
                                    echo " <option value='". $room_e['id'] ."' selected='selected'>" .$room_e['rom_nummer']. "</option>";
                                    }
                                    else{
                                    echo " <option value='". $room_e['id'] ."'>" .$room_e['rom_nummer']. "</option>";
                                }

                                }
                            ?>
                        </select>
                        <select class="room_option" name="room_number" id="room_number_d" >
                            <option value=""> Velg dobbeltrom </option>
                            <?php
                            $room2_sql = "SELECT * FROM rom WHERE rom_type_id =2 ";
                            $room2_results = mysqli_query($db_con, $room2_sql);
                                while($room_d = mysqli_fetch_array($room2_results)){
                                    if($room_d['id']==$data['rom_id']){
                                    echo " <option value='". $room_d['id'] ."' selected='selected'>" .$room_d['rom_nummer']. "</option>";
                                    }
                                    else{
                                    echo " <option value='". $room_d['id'] ."'>" .$room_d['rom_nummer']. "</option>";
                                    }
                                }
                            ?>
                        </select>
                        <select class="room_option" name="room_number" id="room_number_s" >
                            <option value="">Velg suite rom </option>
                            <?php
                                $room3_sql = "SELECT * FROM rom WHERE rom_type_id =3 ";
                                $room3_results = mysqli_query($db_con, $room3_sql);
                                while($room_s = mysqli_fetch_array($room3_results)){
                                    if($room_s['id']==$data['rom_id']){
                                        echo " <option value='". $room_s['id'] ."' selected='selected'>" .$room_s['rom_nummer']. "</option>";
                                    }
                                    else{
                                        echo " <option value='". $room_s['id'] ."'>" .$room_s['rom_nummer']. "</option>";
                                    }
                                }
                            ?>
                        <select>
                        <select  class="room_option" name="room_number" id="room_number_b" >
                            <option value=""> Velg bryllubssuite rom </option>
                            <?php
                                $room4_sql = "SELECT * FROM rom WHERE rom_type_id =4 ";
                                $room4_results = mysqli_query($db_con, $room4_sql);
                                while($room_b = mysqli_fetch_array($room4_results)){
                                    if($room_b['id']==$data['rom_id']){
                                        echo " <option value='". $room_b['id'] ."' selected='selected'>" .$room_b['rom_nummer']. "</option>";
                                    }
                                    else{
                                        echo " <option value='". $room_b['id'] ."'>" .$room_b['rom_nummer']. "</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <div>
                        <label for="quantity"> Antallrom </label>
                        <input type="number" id="antall_rom" name="quantity" value="<?php echo $data['antall_rom'] ;?>" required />
                    </div>

                    <div>
                        <label for="people"> Antall personer </label>
                        <input type="number" id="antall_personer" name="people" value="<?php echo $data['antall_personer'] ;?>" required />
                    </div>
                </fieldset>

                <!-- Parkering felt -->
                <fieldset id="parking">
                    <legend> Parkering </legend>
                    <div>
                        <label for="parking-yes"> Ja</label>
                        <input type="radio" name="parking" value="Ja" class="parking"
                            <?php
                                if($data['parkering'] == "Ja") {
                                echo "checked";
                            }?> required />
                        <?php echo str_repeat("&nbsp;", 10); ?>
                        <label for="parking-no"> Nei</label>
                        <input type="radio" name="parking" value="Nei" class="parking"
                        <?php
                            if($data['parkering'] == "Nei") {
                            echo "checked";
                        }?> />

                        <!-- Hente parkeringplasser -->
                        <select name="parking-place" id="parking-place" >
                            <option value=""> Velg parkeringsid </option>
                            <?php
                                $park_sql = "SELECT * FROM parkering ";
                                $park_results = mysqli_query($db_con, $park_sql);
                                while($park = mysqli_fetch_array($park_results)){
                                    if($park['p_navn']==$data['parkering_navn']){
                                        echo " <option value='". $park['p_navn'] ."' selected='selected'>" .$park['p_navn']. "</option>";
                                    }
                                    else{
                                        echo " <option value='". $park['p_navn'] ."'>" .$park['p_navn']. "</option>";
                                    }
                                }
                            ?>
                        </select>

                    </div>
                </fieldset>

                <!-- Måltidsfelter -->
                <fieldset>
                    <legend> Måltider </legend>
                    <div>

                    <!-- Hente måltider fra DB til input -->
                    <?php
                      $meals_sql = "SELECT * FROM maaltid";
                      $meals_results = mysqli_query($db_con, $meals_sql);

                        while($meal = mysqli_fetch_array($meals_results)){
                            if($meal['navn']=="lunsj"){
                                echo "<span>Lunsj </span> <input id='lunsj' type='checkbox' name='lunch' value='". $meal['navn'] ."'>";
                                echo "<span> ".$meal['pris']. " kr </span>";
                                echo str_repeat("&nbsp;", 8); // Mellomrom
                            }
                            elseif($meal['navn']=="middag"){
                                echo "<span> Middag </span> <input id='middag' type='checkbox' name='dinner' value='". $meal['navn'] ."'>";
                                echo "<span> ".$meal['pris']. " kr </span>";
                            }
                        }

                    ?>
                    </div>
                </fieldset>

                 <!--  Regner prisen  -->
                <fieldset>
                    <div>
                        <label for="price"><strong style="color:dodgerblue"> Total price / Total pris : </strong></label>
                        <input id="total-price" type="text" name="price" value="<?php echo $data['total_pris'] ;?>" style="color:dodgerblue" />
                    </div>
                </fieldset>
                <div class="send">
                    <button type="submit" name="update-btn"> Oppdater </button>
                </div>
        </form>
    </main>
<?php require('footer-body.php'); ?>