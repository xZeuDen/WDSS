<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Login</title>
    <link rel="stylesheet" href="../../css/login.css">
</head>
<body>
<form action="login_action.php" method="post">
    <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <a href="../../index.php" class="cancelbtn">Cancel</a>
        <a href="../register/register.php" class="registerbtn">Register</a>
    </div>
</form>
</body>
</html>
