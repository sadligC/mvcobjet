
<?php
$url = "http://localhost/afpa_dwwm/back_end_01/mvc/objet/mvcobjet/";
define ('_URL', $url);

require_once ('header.php');

require_once ('vendor/autoload.php');

use mvcobjet\controllers\BackController;
use mvcobjet\controllers\FrontController;

$fc = new FrontController();
$bc = new BackController();
// $fc -> index();

$base  = dirname($_SERVER['PHP_SELF']);
if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

$klein = new \Klein\Klein();

$klein -> respond ('GET','/', function () use($fc) {
    $fc -> index();
});

$klein -> respond('GET','/helloworld', function() {
    return 'hello world';
} );

$klein->respond('GET','/listeActeurs', function() use($bc){
 
    $bc->listeActeurs();
});

$klein->respond('GET','/listeFilms', function() use($bc){
 
    $bc->listeFilms();
});

$klein->respond('GET','/unActeur/[:id]', function($request) use($bc){
 
    $bc->getActor($request -> id);
});


$klein -> dispatch();

?>