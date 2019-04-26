<?php  session_start(); ?>

<?php require('admin-header.php');
    require('register-done.php');
?>
    <main>
        <h1> Registerskjema </h1>
        <form action="" method="post">
              <?php require('errors.php'); ?>  <!-- inkluder feilmelding filen -->
           <fieldset>
               <legend> Bruker informasjon </legend>
                <div>
                    <label for="full_name"> Navn </label>
                    <input type="text" name="full_name" id="full_name"  value="<?php echo $_SESSION['full_name']; ?>" required />
                </div>
                <div>
                    <label for="email"> E-post </label>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" required />
                </div>
                <div>
                    <label for="password"> Passord </label>
                    <input type="password" name="password" id="password" value="<?php echo $_SESSION['password']; ?>" required />
                </div>
                <div>
                    <label for="confirm-password"> Bekreft passord </label>
                    <input type="password" name="confirm-password"  id="confirm-password" value="<?php echo $_SESSION['confirm-password']; ?>" required />
                </div>
            </fieldset>
            <div>
                <button type="submit" name="register" id="register"> Register </button>
            </div>
        </form>
    </main>

<?php require('footer-body.php'); ?>
