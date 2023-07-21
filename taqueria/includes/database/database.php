<?php  

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'root', 'dbtacos');

    if(!$db) {
        echo 'db no conectada';
        exit;
    }

    return $db;
}

?>