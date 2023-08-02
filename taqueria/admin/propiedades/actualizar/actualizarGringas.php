<?php
require '../../../includes/database/database.php';
$db = conectarDB();

//conseguir el id de los tacos que actualizando

$id = $_GET['gringa'];
$id = filter_var($id, FILTER_VALIDATE_INT);

//entrar a la bd de tacos
$gringasquery = "SELECT * FROM gringas WHERE id = $id";
$gringasdb = mysqli_query($db, $gringasquery);

/*echo '<pre>';
var_dump($_GET);
echo '</pre>';

echo '<pre>';
var_dump($_POST);
echo '</pre>';*/

$errores = [];
$gringas = '';
$precio = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $gringas = $_POST['nombre'];
    $precio = $_POST['precio'];

    if (!$gringas) {
        $errores[] = "Debes de añadir el nombre d la gringa";
    }

    if (!$precio) {
        $errores[] = "Debes de añadir el precio";
    }

    if (empty($errores)) {
        $actualizarGringas = "UPDATE gringas SET nombre = '${gringas}', precio = '${precio}' WHERE id = $id";
        $actualizar = mysqli_query($db, $actualizarGringas);
        header('Location: /admin/index.php?exito=2');
    }
}

require '../../../includes/funciones.php';
templateArch('header');
?>

<main class="main-crear">
    <h2 class="crear-title">Actualizar Gringas</h2>

    <?php while($row = mysqli_fetch_assoc($gringasdb)): ?>
    <form method="POST" class="formulario-crear">
        <label for="nombre">Gringas:</label>
        <input type="text" placeholder="Ingrese el taco" name="nombre" value="<?php echo $row['nombre'] ?>">

        <label for="">Precio:</label>
        <input type="number" placeholder="Ingrese el precio" name="precio" value="<?php echo $row['precio'] ?>">

        <input type="submit" value="Enviar">
    </form>
    <?php endwhile?>
</main>