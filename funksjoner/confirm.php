<?php session_start(); ?>
<?php require('header-body.php'); ?>
    <main>
        <?php
          foreach($_POST as $key => $value) {
              $_SESSION[$key] = $value;
          }
        ?>

        <h1> Information for sending / Imformasjon for sending </h1>
             <h2> Hei  <?php echo $_SESSION['name']; ?> </h2>
             <table>
                <tbody>
                  <tr>
                    <th> Name / Navn </th>
                    <td> <?php echo $_SESSION['name']; ?>  </td>
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
                    <td> <?php echo $_SESSION['check-in']; ?> </td>
                  </tr>
                  <tr>
                    <th> Check out / Utsjekk </th>
                    <td> <?php echo $_SESSION['check-out']; ?> </td>
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
                    <td> <?php echo $_SESSION['check-out']; ?> </td>
                  </tr>
                  <tr>
                    <th> Number of people / Antall personer </th>
                    <td> <?php echo $_SESSION['check-out']; ?> </td>
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
                    <th> Parking ID / ParkeringsID</th>
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

        <a href="index.php"> Edit / Rediger </a>
        <a href="done.php" name="confirm"> Confirm / Bekreft </a>

    </main>
<?php require('footer-body.php'); ?>
