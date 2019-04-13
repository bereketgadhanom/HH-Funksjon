<?php 
    session_start();
    require('header-body.php');
    require('login-done.php'); 
?>
    <main>
        <h2> Login-skjema </h2>
        <form action="" method="post">
                <?php require('errors.php'); //inkluder feilmelding filen 
                  echo  $_GET['succsess'];
                ?>  
                
            <fieldset>
                <legend> Login informasjon </legend>
                <div>
                    <label for="email"> E-post </label>
                    <input type="email" name="email" required />
                </div>
                <div>
                    <label for="password"> Passord </label>
                    <input type="password" name="password" required />
                </div>
            </fieldset>
            <div>
                <button type="submit" name="login"> Login </button>
            </div>      
        </form>
    </main>
<?php require('footer-body.php'); ?>