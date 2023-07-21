<?php

//llamar a la base de datos 
require './includes/database/database.php';
$db = conectarDB();

//bd de las sucursales
$sucursales = "SELECT * FROM sucursales";
$sucursalesValores = mysqli_query($db, $sucursales);

$errores = [];

$nombre = '';
$telefono = '';
$fecha = '';
$hora = '';
$sucusalesLocales = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //consulta

    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $sucusalesLocales = $_POST['sucursal'];

    if (!$nombre) {
        $errores[] = 'Debes de agregar un nombre';
    }
    if (!$telefono) {
        $errores[] = 'Agrega tu numero de telefono';
    }
    if (!$fecha) {
        $errores[] = 'Agrega la fecha de la reservación';
    }

    if (!$hora) {
        $errores[] = "Agrega la hora de la reservación";
    }

    if ($sucusalesLocales === "0") {
        $errores[] = "Agrega un sucursal";
    }

    if (empty($errores)) {

        //enviar información a la base de datos
        $query = "INSERT INTO reservacion(nombre, numero, fecha, hora, sucursales_id) VALUES ('$nombre', '$telefono', '$fecha', '$hora', '$sucusalesLocales');";

        $resultadoQuery = mysqli_query($db, $query);

        //obtener id de la tavlareservacion
        $id = mysqli_insert_id($db);

        $sucursales = "SELECT * FROM sucursales WHERE id = $sucursalesLocales";

        header('Location: exitoReservacion.php?exito=1&cliente=' . $id . '&local=' . $sucusalesLocales);
    }
}

/*echo '<pre>';
var_dump($_POST);
echo '</pre>';*/

/*echo '<pre>';
var_dump($_SERVER);
echo '</pre>';
*/

//Traer el header a la pagina
include './includes/funciones.php';
templateArch('header');
?>

<main>
    <form method="POST" action="reservaciones.php" class="formulario form-index form-reservaciones">
        <h2>Reservaciones</h2>
        <?php foreach ($errores as $error) : ?>
            <p class="error"><?php echo $error ?>
            <p>
        <?php endforeach ?>
            <!-- Datos personales -->
            <div class="form-datos">
                <label for="nombre">Nombre y Apellidos:</label>
                <input type="text" placeholder="Ingrese su nombre y apellidos" name="nombre">

                <label for="telefono">Telefono:</label>
                <input type="text" placeholder="Ingrese su telefono" name="telefono">
            </div>

            <div class="form-cita">
                <label for="sucursal">Sucursal:</label>
                <select name="sucursal" id="select">
                    <option value="0">--Sucursales--</option>
                    <?php while ($row = mysqli_fetch_assoc($sucursalesValores)) : ?>
                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['nombre']; ?></option>
                    <?php endwhile ?>
                </select>

                <label for="dia">Día:</label>
                <input type="date" name="fecha">

                <label for="horario">Horario</label>
                <input type="time" name="hora">
            </div>

            <input type="submit" value="Enviar">
    </form>
</main>

<script src="src/js/app.js"></script>
</body>

</html>