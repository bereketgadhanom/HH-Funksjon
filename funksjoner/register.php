
<?php require('header-body.php'); ?>
    <main>
        <h1> Registerskjema </h1>
        <form action="login.php" method="post">
            <div>
                <label for="name"> Navn </label>
                <input type="text" name="name" required />
            </div>
            <div>
                <label for="email"> E-post </label>
                <input type="email" name="email" required />
            </div>
            <div>
                <label for="password"> Passord </label>
                <input type="password" name="password" required />
            </div>
            <div>
                <label for="confirm-password"> Bekreft passord </label>
                <input type="password" name="confirm-password" required />
            </div>
            <button type="submit" name="register"> Register </button>
        </form>
    </main>
<?php require('footer-body.php'); ?>