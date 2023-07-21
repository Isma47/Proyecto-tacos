<?php
require '../includes/database/database.php';
$db = conectarDB();

//bd de tacos
$tacosDisponibles = "SELECT * FROM tacos";
$queryTacos = mysqli_query($db, $tacosDisponibles);

//bd de refrescos
$refrescosDisponibles = "SELECT * FROM refrescos";
$queryRefrescos = mysqli_query($db, $refrescosDisponibles);

//bd de gringas
$gringasDisponibles = "SELECT * FROM gringas";
$queryGringas = mysqli_query($db, $gringasDisponibles);

//BORRAR LOS ELEMENTOS

//borrar tacos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['tacos']) {

    $idTacos = $_POST['tacos'];

    $idTacos = filter_var($idTacos, FILTER_VALIDATE_INT);

    $query = "DELETE FROM tacos WHERE id = ${idTacos}";
    $borrarTacos = mysqli_query($db, $query);

    if ($borrarTacos) {
        header('location: /admin/index.php');
    }
}

//borrar refrescos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['refrescos']) {

    $idRefrescos = $_POST['refrescos'];

    $idRefrescos = filter_var($idRefrescos, FILTER_VALIDATE_INT);

    $query = "DELETE FROM refrescos WHERE id = ${idRefrescos}";
    $borrarRefrescos = mysqli_query($db, $query);

    if ($borrarRefrescos) {
        header('location: /admin/index.php');
    }
}

//borrar gringas

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['gringas']) {

    $idGringas = $_POST['gringas'];

    $idGringas = filter_var($idGringas, FILTER_VALIDATE_INT);

    $query = "DELETE FROM gringas WHERE id = ${idGringas}";
    $borrarGringas = mysqli_query($db, $query);

    if ($borrarGringas) {
        header('location: /admin/index.php?borrar=2');
    }
}



include '../includes/funciones.php';
templateArch('header');
?>

<main class="main-tables">
    <h1>Registros generales</h1>

    <?php if (isset($_GET['exito']) && $_GET['exito'] === "1") : ?>
        <p class="exito">Articulo creado con exito</p>
        <?php elseif($_GET['exito'] === "2") :?>
        <p class="exito">Articulo actualizado con exito</p>
    <?php endif ?>
    <!--  -->
    <div class="table">
        <h2>Tacos</h2>
        <table class="propiedades">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>Taco</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody> <!-- Msutesra resultados -->
                <?php while ($row = mysqli_fetch_assoc($queryTacos)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['precio']; ?></td>
                        <td>
                            <form method="POST">

                                <input type="hidden" name="tacos" value="<?php echo $row['id']; ?>">

                                <input type="submit" class="borrar" value="Eliminar">
                            </form>
                            <a href="propiedades/actualizar/actualizarTacos.php?taco=<?php echo $row['id']?>">Actualizar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="/admin/propiedades/crear/crearTacos.php" class="crear-propiedad">Crear Propiead</a>
    </div>

    <div class="table">
        <h2>Refrescos</h2>

        <table class="propiedades">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>Refrescos</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody> <!-- Msutesra resultados -->
                <?php while ($row = mysqli_fetch_assoc($queryRefrescos)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['precio']; ?></td>
                        <td>
                            <form method="POST">

                                <input type="hidden" name="refrescos" value="<?php echo $row['id']; ?>">

                                <input type="submit" class="borrar" value="Eliminar">
                            </form>
                            <a href="propiedades/actualizar/actualizarRefrescos.php?refresco=<?php echo $row['id']?>">Actualizar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="/admin/propiedades/crear/crearRefrescos.php" class="crear-propiedad">Crear Propiead</a>
    </div>

    <div class="table">
        <h2>Gringas</h2>

        <table class="propiedades">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>Gringas</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody> <!-- Msutesra resultados -->
                <?php while ($row = mysqli_fetch_assoc($queryGringas)) : ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['precio'] ?></td>
                        <td>
                            <form method="POST">

                                <input type="hidden" name="gringas" value="<?php echo $row['id']; ?>">

                                <input type="submit" class="borrar" value="Eliminar">
                            </form>
                            <a href="propiedades/actualizar/actualizarGringas.php?gringa=<?php echo $row['id']?>">Actualizar</a>
                        </td>
                    </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        <a href="/admin/propiedades/crear/crearGringas.php" class="crear-propiedad">Crear Propiead</a>
    </div>

    <div class="table">
        <h2>Sucursales</h2>

        <table class="propiedades">
            <thead>

                <tr>
                    <th>ID</th>
                    <th>Taco</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>

            </thead>

            <tbody> <!-- Muestesra resultados -->
                <tr>
                    <td>1</td>
                    <td>Taco de suadero</td>
                    <td>24</td>
                    <td>
                        <a href="">Eliminar</a>
                        <a href="admin/propiedades/actualizar/actualizarTacos.php">Actualizar</a>
                    </td>

                </tr>
            </tbody>
        </table>

        <a href="/admin/propiedades/crear/CrearSucursales.php" class="crear-propiedad">Crear Propiead</a>
    </div>

</main>

</body>

</html>