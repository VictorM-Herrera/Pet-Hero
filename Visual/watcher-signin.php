<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing In</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div>
        <form action="../Controller/watcher-signin-action.php" method="post"><h1>Usted se esta registrando como guardian:</h1>
        <div>
                <label for="name">Nombre</label>
                <input type="text" name="name" placeholder="..." required>
            </div>
            <div>
                <label for="lastName">Apellido</label>
                <input type="text" name="lastName" placeholder="..." required>
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
                <label for="petType">Tipo de mascota a cuidar: </label>
                <input type="text" placeholder="ej: perro, gato, etc.." name="petType">
            </div>
            <div>
                <label for="expectedPay">Precio por su servicio: </label>
                <input type="text" placeholder="$ars" name="expectedPay">
            </div>
            <div>
                 <input type="submit" value="Enviar">
            </div>
        </form>
    </div>
</body>
</html>

