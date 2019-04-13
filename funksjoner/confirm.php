<?php session_start(); ?>
<?php require('header-body.php'); ?>
    <main>
        <?php
          foreach($_POST as $key => $value) {
              $_SESSION[$key] = $value;
          }
        ?>

        <h2> Information for sending / Imformasjon for sending </h2>
             <h3 style="color:dodgerblue"> Hello / Hei <span style='font-size:30px;'> &#128514; </span>  <?php echo $_SESSION['full_name']; ?> </h3>
             <table>
                <tbody>
                  <tr>
                    <th> Name / Navn </th>
                    <td> <?php echo $_SESSION['full_name']; ?>  </td>
                  </tr>
                  <tr>
                    <th> Email / Epost </th>
                    <td> <?php echo $_SESSION['email']; ?> </td>
                  </tr>
                  <tr>
                    <th> Phone / Tlf </th>
                    <td> <?php echo $_SESSION['phone']; ?> </td>
                  </tr>
                </tbody>
             </table>

             <table>
                <tbody>
                  <tr>
                    <th> Check in / Innsjekk </th>
                    <td> <?php echo $_SESSION['checkin']; ?> </td>
                  </tr>
                  <tr>
                    <th> Check out / Utsjekk </th>
                    <td> <?php echo $_SESSION['checkout']; ?> </td>
                  </tr>
                  <tr>
                    <th> Number of nights / Antall netter </th>
                    <td> <?php echo $_SESSION['nights']; ?> </td>
                  </tr>
                </tbody>
             </table>

             <table>
                <tbody>
                  <tr>
                    <th> Room Type / Romtype </th>
                    <td> <?php echo $_SESSION['roomtype']; ?>  </td>
                  </tr>
                  <tr>
                    <th> Room number / Romnummer </th>
                    <td> <?php echo $_SESSION['room_number']; ?> </td>
                  </tr>
                  <tr>
                    <th> Number of rooms / Antall rom </th>
                    <td> <?php echo $_SESSION['quantity']; ?> </td>
                  </tr>
                  <tr>
                    <th> Number of people / Antall personer </th>
                    <td> <?php echo $_SESSION['people']; ?> </td>
                  </tr>
                </tbody>
             </table>

             <table>
                <tbody>
                  <tr>
                    <th> Parking / Parkering </th>
                    <td> <?php echo $_SESSION['parking']; ?>  </td>
                  </tr>
                  <tr>
                    <th> Parking ID / Parkering-ID</th>
                    <td> <?php echo $_SESSION['parking-place']; ?> </td>
                  </tr>
                </tbody>
             </table>

             <table>
                <tbody>
                  <tr>
                    <th> Lunch / Lunsj </th>
                      <td> <?php echo $_SESSION['lunch']; ?> </td>
                  </tr>
                  <tr>
                    <th> Dinner / Middag </th>
                      <td> <?php echo $_SESSION['dinner']; ?> </td>
                  </tr>
                </tbody>
             </table>

             <table>
                <tbody>
                  <tr>
                    <th> Total price / Totalpris </th>
                      <td> <?php echo $_SESSION['price']; ?> </td>
                  </tr>
                </tbody>
             </table>

        <a href="index.php"> Edit / Rediger </a>
        <a href="done.php" name="confirm"> Confirm / Bekreft </a>
    </main>
<?php require('footer-body.php'); ?>
