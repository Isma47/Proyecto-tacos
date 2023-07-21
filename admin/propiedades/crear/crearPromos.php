<?php 
    require '../../../includes/funciones.php';
    templateArch('header');
?>

<main class="main-crear">
    <h2 class="crear-title">Refrescos</h2>
    <form method="POST" class="formulario-crear">
        <label for="nombre">Nombre de la promoción:</label>
        <input type="text" placeholder="Ingrese la promoción" name="nombre">

        <label for="">Descripción:</label>
        <textarea name="descripcion" id="" placeholder="Ingresa una descripción"></textarea>

        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen">

        <label for="">Fecha de inicio:</label>
        <input type="date" name="fecha">

        <label for="">Fecha de caducación</label>
        <input type="date" name="fechaFinal">

        <input type="submit" value="Enviar">
    </form>
</main>