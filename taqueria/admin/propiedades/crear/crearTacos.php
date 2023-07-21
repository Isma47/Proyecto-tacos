<?php
require '../../../includes/database/database.php';
$db = conectarDB();

$coneccionTacos = "SELECT * FROM tacos";

$query = mysqli_query($db, $coneccionTacos);

/* echo '<pre>';
        var_dump($_SERVER);
    echo '</pre>';
*/
$taco = '';
$precio = '';

$errores = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    //valores

    $taco = mysqli_real_escape_string($db, $_POST['nombre']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);


    //veririfcar si falta una casilla por llenar
    if (!$taco) {
        $errores[] = "Agrega el nombre del taco";
    }
    if (!$precio) {
        $errores[] = "Agrega el precio del taco";
    }


    //comporbar si el array de errores esta vacio y mandar los datos a la db
    if (empty($errores)) {
        //resultado
        $query = "INSERT INTO tacos(nombre, precio) VALUES ('$taco', '$precio');";

        $insertarTaco = mysqli_query($db, $query);

        header("Location: /admin/index.php?exito=1");
    }
}

require '../../../includes/funciones.php';
templateArch('header');
?>

<main class="main-crear">
    <h2 class="crear-title">Tacos:</h2>
    <form method="POST" class="formulario-crear">
        <label for="nombre">Tacos:</label>
        <input type="text" placeholder="Ingrese el taco" name="nombre">

        <label for="">Precio:</label>
        <input type="number" placeholder="Ingrese el precio" name="precio">

        <input type="submit" value="Enviar">

    </form>
</main>