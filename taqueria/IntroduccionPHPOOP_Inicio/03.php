<?php include 'includes/header.php';


class Producto{

    public function __construct( public string $nombre){
        
    }

    public function mostrarNombre(){
        echo 'su nombre es: ' . $this->nombre;
    }
}

$producto = new Producto('Ismael');
//var_dump($producto);
$producto->mostrarNombre();

$producto2 = new Producto('micha');
//var_dump($producto2);
$producto2->mostrarNombre();


include 'includes/footer.php';