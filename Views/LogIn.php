<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="icon" href="Views/favicon.ico">
</head>
<body>
    <div>
        <form action="../Controllers/login-action.php" method="post">
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="Ingresar">
        </div>
        </form>
    </div>
</body>
</html>