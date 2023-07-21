<?php 
    //llamar a la base de datos 
    require './includes/database/database.php';
    $db = conectarDB();

    
    //Traer el header a la pagina
    include './includes/funciones.php';
    templateArch('header');
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
                <a href="index.php">RESERVACIÓNES</a>
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
                    <li>Carne asada: $15 MXN por taco</li>
                    <li>Al pastor: $12 MXN por taco</li>
                    <li>Pollo: $10 MXN por taco</li>
                    <li>Carnitas: $13 MXN por taco</li>
                    <li>Barbacoa: $18 MXN por taco</li>
                    <li>Lengua: $20 MXN por taco</li>
                    <li>Suadero: $15 MXN por taco</li>
                    <li>Chorizo: $12 MXN por taco</li>
                    <li>Tripas: $15 MXN por taco</li>
                    <li>Nopales (opción vegetariana): $10 MXN por taco</li>
                </ul>

                <h3>Gringas:</h3>
                <ul>
                    <li>Gringa de carne asada: $40 MXN por gringa</li>
                    <li>Gringa de pastor: $35 MXN por gringa</li>
                    <li>Gringa de pollo: $30 MXN por gringa</li>
                    <li>Gringa de carnitas: $35 MXN por gringa</li>
                </ul>

                <h3>BEBIDAS</h3>
                <ul>
                    <li>Refrescos: $15 MXN por lata o vaso</li>
                    <li>Agua de horchata: $20 MXN por vaso</li>
                    <li>Agua de jamaica: $20 MXN por vaso</li>
                    <li>Agua de tamarindo: $20 MXN por vaso</li>
                    <li>Agua de limón: $20 MXN por vaso</li>
                    <li>Agua de piña: $20 MXN por vaso</li>
                    <li>Agua de melón: $20 MXN por vaso</li>
                    <li>Agua de sandía: $20 MXN por vaso</li>
                    <li>Agua de naranja: $20 MXN por vaso</li>
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

    <div class="reservaciones-index contenedor-form">
        <form method="POST" class="formulario form-index">
            <h2>Reservaciones</h2>
            <!-- Datos personales -->
            <div class="form-datos">
                <label for="nombre">Nombre y Apellidos:</label>
                <input type="text" placeholder="Ingrese su nombre y apellidos" name="Nombre">

                <label for="telefono">Telefono:</label>
                <input type="number" placeholder="Ingrese su telefono"
                name="Telefono">
            </div>

            <div class="form-cita">
                <label for="sucursal">Sucursal:</label>
                <select name="Sucursal" id="select">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option id="select" value="1">Av. México</option>
                    <option id="select" value="2">Av. López</option>
                    <option id="select" value="3">Plaza CD Jardin</option>
                    <option id="select" value="4">Aragón</option>
                </select>

                <label for="dia">Día:</label>
                <input type="date" name="Fecha">

                <label for="horario">Horario</label>
                <input type="time" name="Hora">
            </div>
            <input type="submit" value="Enviar">

            <div id="errores" class="errores">

            </div>
        </form>
    </div>

    <script src="src/js/app.js"></script>
</body>
</html>