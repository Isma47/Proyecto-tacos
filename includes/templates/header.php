<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Taqueria Neza</title>
    <link rel="stylesheet" href="../../../about/css/app.css"/>
</head>

<body>
    <!-- Logo y nav header -->
    <header class="header">
        <!-- Logo y nav -->
        <div class="header-logo">
            <p>Taqueria Neza</p>

            <nav <?php echo ($mostrarHeader == true) ? 'header-open' : 'none-header'; ?>>
                <a href="">SUCURSALES</a>
                <a href="">MENÚ</a>
            </nav>
        </div>

        <!-- reservar y desplegable -->
        <div class="<?php echo ($mostrarHeader == true) ? 'header-reservaciones' : 'none-header'; ?>">
            <a href="reservaciones.php">RESERVACIÓNES</a>

            <div class="header-hamburguesa">
                <div></div>
                <div></div>
                <div></div>
            </div>

            <nav class="modal-menu">
                <p class="cerrar-modal">X</p>
                <ul>
                    <li>Menú</li>
                    <li>Sucursales</li>
                    <li>Fotos</li>
                    <li>Reservaciones</li>
                    <li>Nuestros clientes</li>
                    <li>Asociados</li>
                    <li>Comentarios</li>
                </ul>
            </nav>
        </div>
    </header>