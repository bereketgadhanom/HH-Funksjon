<!-- Start sesjonen -->
<?php
    session_start();
     require("db.php");
?>
<?php require('header-body.php'); ?>
    <main>
        <form action="confirm.php" method="post">
            <h2>Booking form / Bookingskjema </h2>
            <!-- Kundeinfo. felt -->
            <fieldset id="name-epost-phone">
                <legend> Personal information / Person-informasjon </legend>
                <div>
                    <label for="full_name">Name / Navn </label>
                    <input type="text" name="full_name"  value="<?php echo $_SESSION['full_name'] ;?>"
                        placeholder="Write your name / Skriv navnet ditt" required/>
                </div>
                <div>
                    <label for="email"> Email / E-post</label>
                    <input type="email" name="email"  value="<?php echo $_SESSION['email'] ;?>"
                        placeholder="Write your email / Skriv e-posten din" required/>
                </div>
                <div>
                    <label for="phone"> Phone / Telefon </label>
                    <input type="text" name="phone"  value="<?php echo $_SESSION['phone'] ;?>"
                        placeholder="Write your phone / Skriv telefonnummeret ditt" required />
                </div>
            </fieldset>

             <!-- Varighetsfelter -->
             <fieldset id="duration">
                <legend> Checking / Sjekking </legend>
                <div>
                    <label for="checkin">Check-in date / Innsjekksdato </label>
                    <input type="text" id="check-in" name="checkin" value="<?php echo $_SESSION['checkin'] ;?>" placeholder="dd.mm.yyy / dd.mm.åååå" required />
                </div>
                <div>
                    <label for="checkout">Check-out date / Utsjekksdato </label>
                    <input type="text" id="check-out" name="checkout" value="<?php echo $_SESSION['checkout'] ;?>" placeholder="dd.mm.yyy / dd.mm.åååå" required />
                </div>
                <div>
                    <label for="nights">Number of nights / Antall netter </label>
                    <input type="number" id="antall_netter" name="nights" value="<?php echo $_SESSION['nights'] ;?>" placeholder="Number of nights / Antall netter" required min="1" />
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
                                if($room_type['id'] == $_SESSION['roomtype']) {
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
                        <option value=""> Choose a single room / Velg enkeltrom </option>
                        <?php
                          $room1_sql = "SELECT * FROM rom WHERE rom_type_id=1 ";
                          $room1_results = mysqli_query($db_con, $room1_sql);
                            while($room_e = mysqli_fetch_array($room1_results)){
                                if($room_e['id'] == $_SESSION['room_number'] ){
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
                          $room2_sql = "SELECT * FROM rom WHERE rom_type_id=2 ";
                          $room2_results = mysqli_query($db_con, $room2_sql);
                            while($room_d = mysqli_fetch_array($room2_results)){
                                if($room_d['id']==$_SESSION['room_number']){
                                echo " <option class='ram' value='". $room_d['id'] ."'>" .$room_d['rom_nummer']. "</option>";
                                }
                                else{
                                echo " <option class='ram' value='". $room_d['id'] ."'>" .$room_d['rom_nummer']. "</option>";
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
                                if($room_s['id']==$_SESSION['room_number']){
                                    echo " <option value='". $room_s['id'] ."'>" .$room_s['rom_nummer']. "</option>";
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
                                if($room_b['id']==$_SESSION['room_number']){
                                    echo " <option value='". $room_b['id'] ."'>" .$room_b['rom_nummer']. "</option>";
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
                    <input id="antall_rom" type="number" name="quantity" value="<?php echo $_SESSION['quantity'] ;?>" placeholder="Number of rooms / Antallrom" required  min="1"/>
                </div>

                <div>
                    <label  for="people"> Number of people / Antall personer </label>
                    <input type="number" id="antall_personer" name="people" value="<?php echo $_SESSION['people'] ;?>" placeholder="Number of people / Antall personer"  required min="1"/>
                </div>
            </fieldset>

            <!-- Parkering felt -->
            <fieldset id="parking">
                <legend> Parking / Parkering </legend>
                <div>
                    <label for="parking-yes"> Yes / Ja</label>
                    <input type="radio" name="parking" value="Ja" class="parking"
                        <?php
                            if($_SESSION['parking'] == "Ja") {
                            echo "checked";
                        }?> />
                     <?php echo str_repeat("&nbsp;", 10); ?>
                    <label for="parking-no"> No / Nei</label>
                    <input type="radio" name="parking" value="Nei" class="parking"
                        <?php
                            if($_SESSION['parking'] == "Nei") {
                            echo "checked";
                        }?> />

                    <!-- Hente parkeringplasser -->
                    <select name="parking-place" id="parking-place" >
                        <option value=""> Choose parking-name / Velg parkeringsnavn</option>
                        <?php
                              $park_sql = "SELECT * FROM parkering ";
                              $park_results = mysqli_query($db_con, $park_sql);
                              while($park = mysqli_fetch_array($park_results)){
                                if($park['navn']==$_SESSION['parking-place']){
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
                <legend> Meals / Måltider </legend>
                <div>
                  <!-- Hente måltider fra DB til input -->
                    <?php
                      $meals_sql = "SELECT * FROM maaltid";
                      $meals_results = mysqli_query($db_con, $meals_sql);

                        while($meal = mysqli_fetch_array($meals_results)){
                            if($meal['navn']=="lunsj"){
                                echo "<span> Lunch / Lunsj </span> <input id='lunsj' type='checkbox' name='lunch' value='". $meal['navn'] ."'>";
                                echo "<span> ".$meal['pris']. " kr </span>";
                                echo str_repeat("&nbsp;", 8); // Mellomrom
                            }
                            elseif($meal['navn']=="middag"){
                                echo "<span> Dinner / Middag </span> <input id='middag' type='checkbox' name='dinner' value='". $meal['navn'] ."'>";
                                echo "<span> ".$meal['pris']. " kr </span>";
                            }
                        }

                    ?>
                </div>
            </fieldset>

                 <!--  Regn ut prisen  -->
            <fieldset>
                <div>
                    <label for="price"><strong style="color:dodgerblue"> Total price / Total pris : </strong></label>
                    <input id="total-price" type="text" name="price" value="<?php echo $_SESSION['price'] ;?>" style="color:dodgerblue" placeholder="Total price / Total pris"/>
                </div>
            </fieldset>
            <div class="send">
                <button type="submit" name="send-btn"> Send </button>
            </div>
        </form>
    </main>
<?php require('footer-body.php'); ?>
