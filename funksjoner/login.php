<?php require('header-body.php'); ?>
    <main>
        <h1> Loginn skjema </h1>
        <form action="admin.php" method="post">
            <div>
                <label for="email"> E-post </label>
                <input type="email" name="email" required />
            </div>
            <div>
                <label for="password"> Passord </label>
                <input type="password" name="password" required />
            </div>
            <button type="submit" name="login"> Login </button>
        </form>
    </main>
<?php require('footer-body.php'); ?>