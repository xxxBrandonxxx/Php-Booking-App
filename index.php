<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="static/css/style.css">
<?php include __DIR__ . "/templates/head.php";
//if user is logged in
if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === true) {
    ("location: home.php");
    exit;
}
//form on index page
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
        <a class="navbar-brand">Welcome to booking center</a>
    </nav>
</header>

<body>
    <h1 class="text-center">Register or Login</h1>
    <div class="container text-right">
        <div class="row">
            <div>Register:
                <html>

                <head>
                    <title>User Registration | PHP</title>
                    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
                </head>

                <body>

                    <div>
                        <?php

                        ?>
                    </div>

                    <div>
                        <form action="homepage.php" method="post">
                            <div class="container">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h1>Registration</h1>
                                        <p>Fill up the form with correct values.</p>
                                        <hr class="mb-3">
                                        <label for="firstname"><b>First Name</b></label>
                                        <input class="form-control" id="firstname" type="text" name="firstname" required>

                                        <label for="lastname"><b>Last Name</b></label>
                                        <input class="form-control" id="lastname" type="text" name="lastname" required>

                                        <label for="email"><b>Email Address</b></label>
                                        <input class="form-control" id="email" type="email" name="email" required>

                                        <label for="password"><b>Password</b></label>
                                        <input class="form-control" id="password" type="password" name="password" required>
                                        <hr class="mb-3">
                                        <input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <?php include __DIR__ . "/templates/footer.php"; ?>
</body>

</html>