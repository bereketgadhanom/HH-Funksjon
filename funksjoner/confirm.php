<?php session_start(); ?>
<?php require('header-body.php'); ?>
    <main>
        <h1> Information for sending / Imformasjon for sending </h1>

            <?php
                foreach($_POST as $key => $value) {
                    $_SESSION[$key] = $value;
                    echo "<p> <strong>$key : </strong>  $value </p>";

                    if($value == $_POST['meals']){
                      foreach($value as $verdi){
                        $mt = implode(',', $verdi);
                        echo "<p> <strong> $value : </strong> $verdi </p>";
                      }
                  }
                }
                  // var_dump($_SESSION);
                  // echo ($_SESSION['parking'] == "Ja") ? "Yes / Ja" : "No / Nei";
            ?>

        <a href="index.php"> Edit / Rediger </a>
        <a href="done.php" name="confirm"> Confirm / Bekreft </a>

    </main>
<?php require('footer-body.php'); ?>
