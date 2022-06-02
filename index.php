
<?php
$url = "http://localhost/afpa_dwwm/back_end_01/mvc/objet/mvcobjet/";
define ('_URL', $url);

 
require_once ('vendor/autoload.php');

use mvcobjet\controllers\BackController;
use mvcobjet\controllers\FrontController;
use Twig\Environment;


$base  = dirname($_SERVER['PHP_SELF']);
if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

$route = new \Klein\Klein();


$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/src/views');
$twig = new Environment($loader, ['cache' => false, 'debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());


$fc = new FrontController($twig);
$bc = new BackController();


// ---------------------------- ACCUEIL ------------------------------------------

$route ->respond('GET', '/', function() use($fc) {
    $fc ->accueil();
});



/////////////////////////////////////////////////////////////////////////////////
//////////////////////// actions sur acteurs ////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

// ************** afficher la liste des acteurs**********************************
$route -> respond('GET','/listActors', function() use($fc) {
    $fc -> printActorsList();
});

// ******************* ajouter un acteur à la bd *************************************
$route -> respond('GET','/printAddActor', function() use($fc) {
    $fc -> printAddActor();
});

$route -> respond('POST','/addActor', function($request) use($bc, $fc) {
    $bc -> addActor($request->paramsPost());
    $fc -> printActorsList();
});

// ******************* modifier un acteur dans la bd ******************
$route ->respond('GET', '/printUpdateActorList', function() use($fc) {
    $fc ->printUpdateActorList();
});

$route -> respond('POST','/printUpdateActor', function($request) use($fc) {
    $id = $request->paramsPost()['person'];
    $fc -> printUpdateActor ($id);
});

$route -> respond('POST','/updateActor', function($request) use ($bc, $fc) {
    $bc -> updateActor($request->paramsPost());
    $fc -> printActorsList();
});

////////////////////////////////////////////////////////////////////////////////
////////////////// actions sur les réalisateurs ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

// *************** afficher la liste des réalisateurs *************************
$route -> respond('GET','/listDirectors', function() use($fc) {
    $res = $fc -> printDirectorsList();
});

// ******************* ajouter un réalisateur à la bd *************************************
$route -> respond('GET','/printAddDirector', function() use($fc) {
    $fc -> printAddDirector();
});

$route -> respond('POST','/addDirector', function($request) use($bc, $fc) {
    $bc -> addDirector($request->paramsPost());
    $fc -> printDirectorsList();
});


$route ->respond('GET', '/printUpdateDirectorList', function() use($fc) {
    $fc ->printUpdateDirectorList();
});

$route -> respond('POST','/printUpdateDirector', function($request) use($fc) {
    $id = $request->paramsPost()['person'];
    $fc -> printUpdateDirector ($id);
});

$route -> respond('POST','/updateDirector', function($request) use ($bc, $fc) {
    $bc -> updateDirector($request->paramsPost());
    $fc -> printDirectorsList();
});

////////////////////////////////////////////////////////////////////////////////
///////////////// actions sur les films ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

// ************** afficher la liste des films //////////////////////////////////
$route ->respond('GET', '/moviesList', function() use($fc) {
    $fc ->moviesList();
});

$route ->respond('GET', '/printOneMovie/[:id]', function($request) use($fc) {
    $fc ->printOneMovie($request);
});




$route -> dispatch();

?>
