<?php
//llamar a la base de datos 
require './includes/database/database.php';
$db = conectarDB();
/*
echo '<pre>';
var_dump($_GET);
echo '</pre>';*/

$id = $_GET['cliente'];
$local = $_GET['local'];

$id = filter_var($id, FILTER_VALIDATE_INT);
$local = filter_var($local, FILTER_VALIDATE_INT);

if (!$id) {
    header('location: index.php');
}
if(!$local){
    header('location: index.php');
}
//consultar a los clientes
$mostrarReservacion = "SELECT * FROM reservacion WHERE id = $id";
$cliente = mysqli_query($db, $mostrarReservacion);

//dende del id salga el las sucursales depnde de cual eligieron
$susursal = "";
if ($_GET['local'] == "1") {
    $susursal = "Av. México";
} else if ($_GET['local'] == "2") {
    $susursal = "Av. López";
} else if ($_GET['local'] == "3") {
    $susursal = "CD Jardin";
} else {
    $susursal = "Aragón";
}

include './includes/funciones.php';
templateArch('header');
?>

<main>
    <?php if ($_GET['exito'] == "1") : ?>
        <h1>Reservacion enviada con exito</h1>
    <?php endif ?>

    <div class="reservacion-cliente">
        <?php while ($row = mysqli_fetch_assoc($cliente)) : ?>

            <p><span>Teléfono:</span> <?php echo $row['numero']; ?></p>
            <p><span>Nombre:</span> <?php echo $row['nombre']; ?></p>
            <p><span>Fecha:</span> <?php echo $row['fecha']; ?></p>
            <p><span>Hora:</span> <?php echo $row['hora']; ?></p>
            <p><span>Sucursal: </span><?php echo $susursal; ?></p>
        <?php endwhile ?>
        <a href="index.php" class="regresar">Regresar</a>
    </div>
</main>