<?php include "functions.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>
<body>
<h1 class="text-center">Register or Login</h1>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6">Register:
                <form action="process-register.php" method="post">
                    <div class="mb-3">
                        <label for="RegInputName" class="form-label">Name*</label>
                        <input type="text" name="RegInputName" class="form-control" id="RegInputName" required>
                    </div>
                    <div class="mb-3">
                        <label for="RegInputSurname" class="form-label">Surname</label>
                        <input type="text" name="RegInputSurname" class="form-control" id="RegInputSurname">
                    </div>
                    <div class="mb-3">
                        <label for="RegInputEmail" class="form-label">Email*</label>
                        <input type="email" name="RegInputEmail" class="form-control" id="RegInputEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="RegInputPassword" class="form-label">Password*</label>
                        <input type="password" name="RegInputPassword" class="form-control" id="RegInputPassword" required>
                    </div>
                    <button type="submit" name='Submit' class="btn btn-dark">Submit</button>
                </form>
            </div>

            <div class="col-lg-6">Customer/Staff Login:
                <form action="process-login.php" method="post">
                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">Email*</label>
                        <input type="email" class="form-control" name="LoginEmail" id="InputEmail" required>
                    </div>
                    <div class="mb-3">
                        <label for="InputPassword" class="form-label">Password*</label>
                        <input type="password" class="form-control" name="LoginPassword" id="InputPassword" required>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
            </div>
        </div>
        <p>* Indicates required field</p>
    </div>
</body>
</html>