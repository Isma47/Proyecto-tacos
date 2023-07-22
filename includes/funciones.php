<?php 
    
require 'app.php';
function templateArch($nombreArch, $mostrarHeader = false) {
   require TEMPLATES_URL."/${nombreArch}.php"; 

   $mostrarHeader = true;
}

