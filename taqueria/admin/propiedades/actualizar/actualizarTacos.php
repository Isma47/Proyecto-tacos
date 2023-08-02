<?php
require '../../../includes/database/database.php';
$db = conectarDB();

//conseguir el id de los tacos que actualizando

$id = $_GET['taco'];
$id = filter_var($id, FILTER_VALIDATE_INT);

//entrar a la bd de tacos
$tacosquery = "SELECT * FROM tacos WHERE id = $id";
$tacosdb = mysqli_query($db, $tacosquery);

/*echo '<pre>';
var_dump($_GET);
echo '</pre>';

echo '<pre>';
var_dump($_POST);
echo '</pre>';*/

$errores = [];
$taco = '';
$precio = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $taco = $_POST['nombre'];
    $precio = $_POST['precio'];

    if (!$taco) {
        $errores[] = "Debes de añadir el nombre del taco";
    }

    if (!$precio) {
        $errores[] = "Debes de añadir el precio";
    }

    if (empty($errores)) {
        $actualizarTacos = "UPDATE tacos SET nombre = '${taco}', precio = '${precio}' WHERE id = $id";
        $actualizar = mysqli_query($db, $actualizarTacos);
        header('Location: /admin/index.php?exito=2');
    }
}

require '../../../includes/funciones.php';
templateArch('header');
?>

<main class="main-crear">
    <h2 class="crear-title">Actualizar tacos:</h2>

    <form method="POST" class="formulario-crear">
        <?php foreach ($errores as $error) : ?>
            <p class="error"><?php echo $error ?></p>
        <?php endforeach ?>

        <?php while ($row = mysqli_fetch_assoc($tacosdb)) : ?>
            <label for="nombre">Tacos:</label>
            <input type="text" placeholder="Ingrese el taco" name="nombre" value="<?php echo $row['nombre'] ?>">

            <label for="">Precio:</label>
            <input type="number" placeholder="Ingrese el precio" name="precio" value="<?php echo $row['precio'] ?>">
        <?php endwhile ?>
        <input type="submit" value="Actualizar">
    </form>
</main>