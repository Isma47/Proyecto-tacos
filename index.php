<?php
//llamar a la base de datos 
require './includes/database/database.php';
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


//Traer el header a la pagina
include './includes/funciones.php';
templateArch('header', true);
?>

<section class="header-presentacion">

    <!-- bg de color negro -->
    <div class="header-presentacion__bg">
    </div>

    <!-- titulo de la taqueria e infromacion -->
    <section class="header-1-grid contenedor">
        <div class="header-presentacion__title">
            <h1>Somos la mejor taqueria de CD Nezahualcoyótl</h1>

            <p>Estamos convencidos que somos los mejores tacos de la ciudad, convive con nosotros, amigos y familia.
            </p>
        </div>

        <!-- Reservaciones y conocenos -->
        <div class="header-presentacion__boton">
            <a href="index.php">CONOCENOS</a>
            <a href="./reservaciones.php">RESERVACIÓNES</a>
        </div>
    </section>
</section>
<!-- FIN DEL HEADER Y E IMAGEN PRINCIPAL -->


<!--  -->
<section class="info-servicio contenedor">
    <!-- Horarios -->
    <div class="info-servicio__horario">
        <h2>Horarios</h2>
        <article>
            <p>Lunes - Viernes</p>
            <p>10hrs - 22hrs</p>
        </article>

        <article>
            <p>Sabado - Domingos</p>
            <p>13:00hrs - 1hrs</p>
        </article>
    </div>

    <!-- Contacto -->
    <div class="info-servicio__contacto">
        <h2>Contacto</h2>
        <p>Tel: 551232378</p>
    </div>

    <!-- Ubicacion -->
    <div class="info-servicio__ubicacion">
        <h2>Ubicación</h2>
        <p>Plaza Ciudad Jardin #4454</p>
    </div>
</section>

<!-- Inicio del main -->
<main>
    <!-- somos -->
    <div class="main-somos">
        <div class="main-somos__info">
            <h2>Somos los mejores tacos de CD Nezahualcoyótl</h2>

            <p>¡Bienvenido a Tacos Neza en Ciudad jardin! Nos complace saber que estás interesado en disfrutar de
                nuestros deliciosos platillos. En Tacos Neza, te ofrecemos una amplia variedad de opciones de tacos
                que seguramente te encantarán.</p>

            <p>En Tacos Neza, nos enorgullece ofrecer platillos de calidad, un servicio amable y un ambiente
                acogedor para que disfrutes de una experiencia gastronómica excepcional. </p>
        </div>

        <div class="main-somos__photo">
            <img src="src/img/presentacion-tacos.jpg" alt="">
        </div>
    </div>


    <!-- menu -->

    <div class="main-menu">
        <div class="main-menu__photo">
        </div>
        <div class="main-menu__productos">
            <h2>MENÚ</h2>

            <h3>TACOS:</h3>
            <ul>
                <?php while($row = mysqli_fetch_assoc($queryTacos)) :?>
                <li><?php echo $row['nombre'] . " " .  $row['precio']?> </li>
                <?php endwhile ?>
            </ul>

            <h3>Gringas:</h3>
            <ul>
                <?php while($row = mysqli_fetch_assoc($queryRefrescos)) :?>
                <li><?php echo $row['nombre'] . " " . $row['precio']; ?></li>
                <?php endwhile ?>
            </ul>

            <h3>BEBIDAS</h3>
            <ul>
            <?php while($row = mysqli_fetch_assoc($queryGringas)) :?>
                <li><?php echo $row['nombre'] . " " . $row['precio']; ?></li>
                <?php endwhile ?>
            </ul>
        </div>
    </div>
</main>

<!-- Promociones -->
<section class="promociones">
    <div class="promociones__info">
        <!-- cumpleaños promo -->
        <div class="promociones__cumple promocion">
            <div class="cumple-foto foto-promo">
                <img src="src/img/promo-cumpleaños.jpg" alt="">
            </div>
            <span>Cumpleañero no paga</span>
            <a href="">*Ver las conciones para validación de promoción</a>
        </div>

        <!-- Egresados promo -->
        <div class="promociones__egresado promocion">
            <div class="egresado-foto foto-promo">
                <img src="src/img/cumple-egresado.jpg" alt="">
            </div>
            <span>Recien egresado no paga</span>
            <a href="">*Ver las conciones para validación de promoción</a>
        </div>

        <!-- promos -->
        <div class="promociones__visita promocion">
            <div class="cumple-foto foto-promo">
                <img src="src/img/decima-visita.jpg" alt="">
            </div>
            <span>En tu visita 10 no pagas</span>
            <a href="">*Ver las conciones para validación de promoción</a>
        </div>
    </div>


    <article class="politicas-promo">
        <a href="">Politicas de promociones</a>
    </article>
</section>

<script src="src/js/app.js"></script>
</body>

</html>