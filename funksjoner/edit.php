
<?php require('header-body.php'); ?>
    <main>
        <?php 
                require("db.php"); 

                //Hent brukerdata 

                //Først vasker vi dataen vi henter fra query stringen 
                $booking_id = mysqli_real_escape_string($db_con, $_GET['id']); 
                //Så oppretter vi spørringen som henter denne spesifikke raden 
                $sql = "SELECT * FROM booking WHERE epost = '".$id."'"; 
                //Vi kjører spørringen... 
                $hent = mysqli_query($db_con, $sql); 
                //og lagrer resultatene som en array i variabelen $info. 
                $data = mysqli_fetch_array($hent); 
            ?> 
            <form action="admin-done.php" method="post">
                <h2>Booking form / Bookingskjema </h2>
                <!-- Kundeinfo. felt -->
                <fieldset id="name-epost-phone">
                    <legend> Personal information / Person-informasjon </legend>
                    <div>
                        <label for="full_name">Name / Navn </label>
                        <input type="text" name="full_name"  value="<?php echo $data['name'] ;?>"
                            placeholder="Write your name / Skriv navnet ditt" required/>
                    </div>
                    <div>
                        <label for="email"> Email / E-post</label>
                        <input type="email" name="email"  value="<?php echo $data['email'] ;?>"
                            placeholder="Write your email / Skriv e-posten din" required/>
                    </div>
                    <div>
                        <label for="phone"> Phone / Telefon </label>
                        <input type="text" name="phone"  value="<?php echo $data['phone'] ;?>"
                            placeholder="Write your phone / Skriv telefonnummeret ditt" required />
                    </div>
                </fieldset>

                <!-- Varighetsfelter -->
                <fieldset id="duration">
                    <legend> Checking / Sjekking </legend>
                    <div>
                        <label for="check-in">Check-in date / Innsjekksdato </label>
                        <input type="date" id="check-in" name="check-in" value="<?php echo $data['check-in'] ;?>" required />
                    </div>
                    <div>
                        <label for="check-out">Check-out date / Utsjekksdato </label>
                        <input type="date" id="check-out" name="check-out" value="<?php echo $data['check-out'] ;?>" required />
                    </div>
                </fieldset>

                <!-- Romtypefelter -->
                <fieldset id="roomtype-select">
                    <legend> Room type / Romtype </legend>
                    <div>
                        <label for="roomtype"> Select room type / Velg romtype </label>
                        <select  name="roomtype"  id="roomtype" required>
                        <option value=""> Choose room type / Velg romtype </option>
                            <?php
                                $room_type_sql = "SELECT * FROM rom_type";
                                $room_type_results = mysqli_query($db_con, $room_type_sql);
                                while($room_type = mysqli_fetch_array($room_type_results)) {
                                    if($room_type['id'] == $data['roomtype']) {
                                        echo "<option value='".$room_type['id']."' selected='selected'>".$room_type['navn']."</option>";
                                    }
                                    else {
                                        echo "<option  value='".$room_type['id']."'>".$room_type['navn']."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="room_number"> Select room / Velg rom </label>
                        <select class="room_option" name="room_number"  id="room_number_e" >
                            <option value=""> Choose a single room / Velg enkeltrom </option>
                            <?php
                            $room1_sql = "SELECT * FROM rom WHERE rom_type_id=1 ";
                            $room1_results = mysqli_query($db_con, $room1_sql);
                                while($room_e = mysqli_fetch_array($room1_results)){
                                    if($room_e['id'] == $data['room_number'] ){
                                    echo " <option value='". $room_e['id'] ."' selected='selected'>" .$room_e['rom_nummer']. "</option>";
                                    }
                                    else{
                                    echo " <option value='". $room_e['id'] ."'>" .$room_e['rom_nummer']. "</option>";
                                }

                                }
                            ?>
                        </select>
                        <select class="room_option" name="room_number" id="room_number_d" >
                            <option value="">Choose double room / Velg dobbeltrom </option>
                            <?php
                            $room2_sql = "SELECT * FROM rom WHERE rom_type_id =2 ";
                            $room2_results = mysqli_query($db_con, $room2_sql);
                                while($room_d = mysqli_fetch_array($room2_results)){
                                    if($room_d['id']==$data['room_number']){
                                    echo " <option value='". $room_d['id'] ."' selected='selected'>" .$room_d['rom_nummer']. "</option>";
                                    }
                                    else{
                                    echo " <option value='". $room_d['id'] ."'>" .$room_d['rom_nummer']. "</option>";
                                    }
                                }
                            ?>
                        </select>
                        <select class="room_option" name="room_number" id="room_number_s" >
                            <option value=""> Choose  suite room / Velg suite rom </option>
                            <?php
                                $room3_sql = "SELECT * FROM rom WHERE rom_type_id =3 ";
                                $room3_results = mysqli_query($db_con, $room3_sql);
                                while($room_s = mysqli_fetch_array($room3_results)){
                                    if($room_s['id']==$data['room_number']){
                                        echo " <option value='". $room_s['id'] ."' selected='selected'>" .$room_s['rom_nummer']. "</option>";
                                    }
                                    else{
                                        echo " <option value='". $room_s['id'] ."'>" .$room_s['rom_nummer']. "</option>";
                                    }
                                }
                            ?>
                        <select>
                        <select  class="room_option" name="room_number" id="room_number_b" >
                            <option value=""> Choose Honeymoon suite room  / Velg bryllubssuite rom </option>
                            <?php
                                $room4_sql = "SELECT * FROM rom WHERE rom_type_id =4 ";
                                $room4_results = mysqli_query($db_con, $room4_sql);
                                while($room_b = mysqli_fetch_array($room4_results)){
                                    if($room_b['id']==$data['room_number']){
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
                        <label for="quantity"> Number of rooms / Antallrom </label>
                        <input type="number" name="quantity" value="<?php echo $data['quantity'] ;?>" required />
                    </div>

                    <div>
                        <label for="people"> Number of people / Antall personer </label>
                        <input type="number" name="people" value="<?php echo $data['people'] ;?>" required />
                    </div>
                </fieldset>

                <!-- Parkering felt -->
                <fieldset id="parking">
                    <legend> Parking / Parkering </legend>
                    <div>
                        <label for="parking-yes"> Yes / Ja</label>
                        <input type="radio" name="parking" value="Ja" class="parking"
                            <?php
                                if($data['parking'] == "Ja") {
                                echo "checked";
                            }?> required />
                        <?php echo str_repeat("&nbsp;", 10); ?>
                        <label for="parking-no"> No / Nei</label>
                        <input type="radio" name="parking" value="Nei" class="parking"
                        <?php
                            if($data['parking'] == "Nei") {
                            echo "checked";
                        }?> />

                        <!-- Hente parkeringplasser -->
                        <select name="parking-place" id="parking-place" >
                            <option value=""> Choose parking number / Velg parkeringsid </option>
                            <?php
                                $park_sql = "SELECT * FROM parkering ";
                                $park_results = mysqli_query($db_con, $park_sql);
                                while($park = mysqli_fetch_array($park_results)){
                                    if($park['id']==$data['parking-place']){
                                        echo " <option value='". $park['id'] ."' selected='selected'>" .$park['navn']. "</option>";
                                    }
                                    else{
                                        echo " <option value='". $park['id'] ."'>" .$park['navn']. "</option>";
                                    }
                                }
                            ?>
                        </select>

                    </div>
                </fieldset>

                <!-- Måltidsfelter -->
                <fieldset>
                    <legend> Meals / Måltider </legend>
                    <div>

                    <!-- Hente måltider fra DB til input -->
                        <?php
                        $meals_sql = "SELECT * FROM maaltid";
                        $meals_results = mysqli_query($db_con, $meals_sql);

                            while($meal = mysqli_fetch_array($meals_results)){
                                if($meal['navn']=="lunsj"){
                                    echo "<span> Lunch / Lunsj </span> <input type='checkbox' name='lunch' value='". $meal['navn'] ."'>";
                                    echo str_repeat("&nbsp;", 8); // Mellomrom
                                }
                                
                                elseif($meal['navn']=="middag"){
                                    echo "<span> Dinner / Middag </span> <input type='checkbox' name='dinner' value='". $meal['navn'] ."'>";
                                }
                            }

                        ?>
                    </div>
                </fieldset>

                 <!--  Regner prisen  -->
                <div>
                    <strong> Total price / Total pris : </strong>
                    <p id="total-price">  </p>
                </div>

                <div class="send">
                  <button type="submit" name="send-btn"> Update </button>
                </div>
        </form>
    </main>
    <script>
        $(document).ready(function() {

        // 
        $("#roomtype").on('change', function() {
            if($(this).val()==1){
                $("#room_number_e").slideDown();
            }
            else if($(this).val()==2){
                $("#room_number_d").slideDown();
            }
            else if($(this).val()==3){
                $("#room_number_s").slideDown();
            }
            else if($(this).val()==4){
                $("#room_number_b").slideDown();
            }
            else{
                // $(".room_option").slideUp();
                $("#room_number_d").slideUp();
                $("#room_number_d").slideUp();
                $("#room_number_s").slideUp();
                $("#room_number_b").slideUp();
            }
        });

        // Parkering valg viser hvis kunden velger ja
        $(".parking").on('change', function(){
        if($(this).val()=="Ja"){
            $("#parking-place").slideDown();
        }
        else {
            $("#parking-place").slideUp();
        }
        });

        // Deaktivere tidligere dato-er
        $("#check-in, #check-out").datepicker({
        minDate: new Date()

        //   onSelect: function(selectedDate) {
        //     this.id == "#check-in, #check-out" ? "minDate" : "minDate"
        });

        $( "input[type='date']" ).each(function(){
        if ($(this).hasClass("hasDatepicker") == false){
            $(this).after( $( "<div />" ).datepicker({ altField: "#" + $(this).attr( "id" ), showOtherMonths: true }) );
            $(this).addClass("hasDatepicker");
        }
        });

    });
</script>
<?php require('footer-body.php'); ?>