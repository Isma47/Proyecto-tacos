<?php
require '../../../includes/funciones.php';
templateArch('header');
?>

<main class="main-crear">
<h2 class="crear-title">Sucursales</h2>
    <form method="POST" class="formulario-crear">
        <label for="nombre">Nombre de la sucursal:</label>
        <input type="text" placeholder="Ingrese la sucursal" name="nombre">
       
        <input type="submit" value="Enviar">
    </form>
</main>