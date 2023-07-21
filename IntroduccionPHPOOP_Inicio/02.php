<?php 
declare(strict_types = 1);
include 'includes/header.php';

class Producto{
    public $nombre;

    public function __construct(string $nombre){
        $this->nombre = $nombre;
    }
}

$producto = new Producto('Ismael');
var_dump($producto);





include 'includes/footer.php';