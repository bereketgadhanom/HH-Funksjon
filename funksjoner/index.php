<?php session_start(); 
     require("db.php");
?>

<?php require('header-body.php'); ?>
    <main>
        <form action="confirm.php" method="post">
            <h1>Booking form / Bookingskjema </h1>
            
            <fieldset id="name-epost-phone">
                <legend> Personal information / Person-informasjon </legend>
                <div>    
                    <label for="name">Name / Navn </label>
                    <input type="text" name="name"  value="<?php echo $_SESSION['name'] ;?>"
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
            
            <fieldset id="roomtype-select">
                <legend> Room type / Romtype </legend>
               
                <?php      
                    $room_type_sql = "SELECT * FROM rom_type"; 
                    $room_type_results = mysqli_query($db_con, $room_type_sql); 
                ?> 

                <div>
                    <label for="roomtype"> Select room type / Velg romtype </label>
                    <select  name="roomtype"  id="roomtype" required>
                        <?php           
                            while($room_type = mysqli_fetch_array($room_type_results)) { 
                                if($room_type['id'] == $_SESSION['roomtype']) {
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
                    <?php
                        $room1_sql = "SELECT * FROM rom WHERE rom_type_id=1 "; 
                        $room1_results = mysqli_query($db_con, $room1_sql);
                        $room2_sql = "SELECT * FROM rom WHERE rom_type_id =2 ";
                        $room2_results = mysqli_query($db_con, $room2_sql); 
                        $room3_sql = "SELECT * FROM rom WHERE rom_type_id =3 "; 
                        $room3_results = mysqli_query($db_con, $room3_sql);     
                        $room4_sql = "SELECT * FROM rom WHERE rom_type_id =4 "; 
                        $room4_results = mysqli_query($db_con, $room4_sql);
                    ?>
                    <label for="room_number"> Select room / Velg rom </label>
                    <select  name="room_number"  id="room_number_e">
                        <option value="">Velg romnummer </option>
                        <?php
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
                    <select name="room_number" id="room_number_d">
                        <option value="">Velg romnummer </option>
                        <?php
                            while($room_d = mysqli_fetch_array($room2_results)){
                                if($room_d['id']==$_SESSION['room_number']){
                                echo " <option value='". $room_d['id'] ."' selected='selected'>" .$room_d['rom_nummer']. "</option>";
                                }
                                else{
                                echo " <option value='". $room_d['id'] ."'>" .$room_d['rom_nummer']. "</option>";
                                }
                            }
                        ?>
                    </select>  
                    <select name="room_number" id="room_number_s">
                        <option value="">Velg romnummer </option>
                        <?php
                            while($room_s = mysqli_fetch_array($room3_results)){
                                if($room_s['id']==$_SESSION['room_number']){
                                    echo " <option value='". $room_s['id'] ."' selected='selected'>" .$room_s['rom_nummer']. "</option>";
                                }
                                else{
                                    echo " <option value='". $room_s['id'] ."'>" .$room_s['rom_nummer']. "</option>";
                                }
                            }
                        ?>
                    <select>
                    <select name="room_number" id="room_number_b"> 
                        <option value="">Velg romnummer </option>
                        <?php
                            while($room_b = mysqli_fetch_array($room4_results)){
                                if($room_b['id']==$_SESSION['room_number']){
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
                    <input type="number" name="quantity" value="<?php echo $_SESSION['quantity'] ;?>" required /> 
                </div>  
                
                <div>
                    <label for="people"> Number of people / Antall personer </label> 
                    <input type="number" name="people" value="<?php echo $_SESSION['people'] ;?>" required /> 
                </div>     
            </fieldset>
            
            <fieldset id="duration"> 
                <legend> Checking / Sjekking </legend>
                <div>
                    <label for="check-in">Check-in date / Innsjekkingdato </label>
                    <input type="date" name="check-in" value="<?php echo $_SESSION['check-in'] ;?>" required />
                </div>
                <div>
                    <label for="check-out">Check-uot date / Utsjekkingdato </label>
                    <input type="date" name="check-out" value="<?php echo $_SESSION['check-out'] ;?>" required />
                </div>
            </fieldset>
           
            <fieldset id="parking">
                <legend> Parking / Parkering </legend>
                <div>
                    <label for="parking-yes"> Yes / Ja</label>
                    <input type="radio" name="parking" value="ja" id="parking-yes"  
                        <?php
                            if($_SESSION['parking'] == "ja") { 
                            echo "checked"; 
                        }?> /> 
                     <?php echo str_repeat("&nbsp;", 10); ?>
                    <label for="parking-no"> No / Nei</label>
                    <input type="radio" name="parking" value="nei" id="parking-no"
                    <?php
                        if($_SESSION['parking'] == "nei") { 
                        echo "checked"; 
                    }?> />
                </div>
            </fieldset>

            <fieldset id="meals">
                <legend> Meals / Måltider </legend>
                <div>
                    <label for="lunch"> Lunch / Lunsj </label>
                    <input type="checkbox" value="lunch" name="lunch" 
                       <?php
                        if($_SESSION['lunch'] == "on") { 
                                echo " checked"; 
                            } 
                        ?> />
                   
                    <?php echo str_repeat("&nbsp;", 10); ?>

                    <label for="dinner"> Dinner / Middag</label>
                    <input type="checkbox" value="dinner" name="dinner"  
                    <?php
                        if($_SESSION['dinner'] == "on") { 
                            echo " checked"; 
                        } 
                    ?> />
                </div>
            </fieldset>
                <div>
                    <strong> Total price / Total pris : </strong>
                    <p id="total-price">  </p>
                </div>
            <button type="submit" name="send-btn"> Send </button>
        </form>
    </main>
    <script src="../js/hh.js"></script>
<?php require('footer-body.php'); ?>