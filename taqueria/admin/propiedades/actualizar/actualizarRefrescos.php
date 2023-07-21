<?php
require '../../../includes/database/database.php';
$db = conectarDB();

//conseguir el id de los tacos que actualizando

$id = $_GET['refresco'];
$id = filter_var($id, FILTER_VALIDATE_INT);

//entrar a la bd de tacos
$refrescosquery = "SELECT * FROM refrescos WHERE id = $id";
$refrecosdb = mysqli_query($db, $refrescosquery);

/*echo '<pre>';
var_dump($_GET);
echo '</pre>';

echo '<pre>';
var_dump($_POST);
echo '</pre>';*/

$errores = [];
$refrescos = '';
$precio = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $refrescos = $_POST['nombre'];
    $precio = $_POST['precio'];

    if (!$refrescos) {
        $errores[] = "Debes de añadir el nombre del refresco";
    }

    if (!$precio) {
        $errores[] = "Debes de añadir el precio";
    }

    if (empty($errores)) {
        $actualizarRefrescos = "UPDATE refrescos SET nombre = '${refrescos}', precio = '${precio}' WHERE id = $id";
        $actualizar = mysqli_query($db, $actualizarRefrescos);
        header('Location: /admin/index.php?exito=2');
    }
}

require '../../../includes/funciones.php';
templateArch('header');
?>

<main class="main-crear">
    <h2 class="crear-title">Actualizar refrescos</h2>
    <form method="POST" class="formulario-crear">
    <?php foreach ($errores as $error) : ?>
            <p class="error"><?php echo $error ?></p>
    <?php endforeach ?>

        <?php while($row = mysqli_fetch_assoc($refrecosdb)):?>
        <label for="nombre">Refrescos:</label>
        <input type="text" placeholder="Ingrese el taco" name="nombre" value="<?php echo $row['nombre']?>">

        <label for="">Precio:</label>
        <input type="number" placeholder="Ingrese el precio" name="precio" value="<?php echo $row['precio']?>">
        
        <input type="submit" value="Enviar">
        <?php endwhile ?>
    </form>
</main>