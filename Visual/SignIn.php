<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing In</title>
    <link rel="stylesheet" href="Visual/normalize.css">
    <link rel="icon" href="Visual/favicon.ico">
</head>
<body>
    <div class="signin-form">
       <form action="Controller/signin-action.php" method="post">
            <div>
                <label for="name">Nombre</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label for="lastName">Apellido</label>
                <input type="text" name="lastName" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="ejemplo@gmail.com" required>
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="conf_password">Confirmar Contraseña</label>
                <input type="password" name="conf_password" required>
            </div>
            <div>
                <label for="birthday">Fecha de Nacimiento</label>
                <input type="date" name="birthday" required>
            </div>
            <div>
                <label for="type">Tipo: </label>
                <select name="type" required>
                    <option value="Owner">Dueño</option>
                    <option value="Watcher">Guardia</option>
                </select>
            </div>
            <div>
                <button type="submit">Registrarse</button>
            </div>
        </form> 
    </div>

</body>
</html>


