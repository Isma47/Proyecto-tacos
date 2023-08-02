<?php
require '../../includes/database/database.php';
$db = conectarDB();

//consultar base de datos
$query = "SELECT * FROM reservacion";
$reservaciones = mysqli_query($db, $query);



//borrar registros
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['registro'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    $query = "DELETE FROM reservacion WHERE id = ${id}";
    $borrarRegistro = mysqli_query($db, $query);

    //header('location: /admin/citas/citas.php?resultado=1');
}

include '../../includes/funciones.php';
templateArch('header');
?>

<main>
    <h1>Reservaciones</h1>

    <?php if(isset($_GET['resultado']) && $_GET['resultado'] == "1" && $_SERVER["REQUEST_METHOD"] == "POST"):?>
        <p>Reservación: <?php echo $_POST['registro'] ?> borrada con exito</p>
    <?php endif?>

    <div class="grid-reservacionees contenedor">

        <?php while ($row = mysqli_fetch_assoc($reservaciones)) : ?>
            <?php
            //ver sucursal
            if ($reservaciones) {

                if ($row['sucursales_id'] == "1") {
                    $sucursal = "Av. México";
                }
                if ($row['sucursales_id'] == "2") {
                    $sucursal = "Av. López";
                }
                if ($row['sucursales_id'] == "3") {
                    $sucursal = "CD. Jardin";
                }
                if ($row['sucursales_id'] == "4") {
                    $sucursal = "Aragón";
                }
            } ?>

            <div>
                <h2>Nombre: <?php echo $row['nombre']?></h2>

                <p>ID cliente: <?php echo $row['id'] ?></p>
                <p>Telefono: <?php echo $row['numero'] ?></p>
                <p>Fecha: <?php echo $row['fecha'] ?></p>
                <p>Hora: <?php echo $row['hora'] ?> </p>
                <p>Sucursal: <?php echo $sucursal?> </p>

                <a href="">Actualizar</a>
                <form method="POST">
                    <input type="hidden" name="registro" value="<?php echo $row['id']; ?>">

                    <input type="submit" class="borrar" value="Eliminar">
                </form>
            </div>
        <?php endwhile ?>
    </div>

</main>