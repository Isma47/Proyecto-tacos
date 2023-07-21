<?php
require '../../../includes/database/database.php';
$db = conectarDB();

$coneccionGringas = "SELECT * FROM gringas";

$query = mysqli_query($db, $coneccionGringas);

/* echo '<pre>';
        var_dump($_SERVER);
    echo '</pre>';
*/
$gringa = '';
$precio = '';

$errores = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    //valores

    $gringa = mysqli_real_escape_string($db, $_POST['nombre']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);


    //veririfcar si falta una casilla por llenar
    if (!$gringa) {
        $errores[] = "Agrega el nombre del taco";
    }
    if (!$precio) {
        $errores[] = "Agrega el precio del taco";
    }


    //comporbar si el array de errores esta vacio y mandar los datos a la db
    if (empty($errores)) {
        //resultado
        $query = "INSERT INTO gringas(nombre, precio) VALUES ('$gringa', '$precio');";

        $insertarGringa = mysqli_query($db, $query);

        header("Location: /admin/index.php?exito=1");
    }
}

require '../../../includes/funciones.php';
templateArch('header');
?>

<main class="main-crear">
    <h2 class="crear-title">Gringas</h2>
    <form method="POST" class="formulario-crear">
        <label for="nombre">Gringas:</label>
        <input type="text" placeholder="Ingrese el taco" name="nombre">

        <label for="">Precio:</label>
        <input type="number" placeholder="Ingrese el precio" name="precio">

        <input type="submit" value="Enviar">
    </form>
</main>