
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

$klein = new \Klein\Klein();


$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/src/views');
$twig = new Environment($loader, ['cache' => false, 'debug' => true]);
$twig->addExtension(new \Twig\Extension\DebugExtension());


$fc = new FrontController($twig);
$bc = new BackController();


// ---------------------------- ACCUEIL ------------------------------------------

$klein ->respond('GET', '/', function() use($fc) {
    $fc ->accueil();
});



/////////////////////////////////////////////////////////////////////////////////
//////////////////////// actions sur acteurs ////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

// ************** afficher la liste des acteurs**********************************
$klein -> respond('GET','/listActors', function() use($fc) {
    $fc -> printActorsList();
});

// ******************* ajouter un acteur à la bd *************************************
$klein -> respond('GET','/printAddActor', function() use($fc) {
    $fc -> printAddActor();
});

$klein -> respond('POST','/addActor', function($request) use($bc, $fc) {
    $bc -> addActor($request->paramsPost());
    $fc -> printActorsList();
});

// ******************* modifier un acteur dans la bd ******************
$klein ->respond('GET', '/printUpdateActorList', function() use($fc) {
    $fc ->printUpdateActorList();
});

$klein -> respond('POST','/printUpdateActor', function($request) use($fc) {
    $id = $request->paramsPost()['acteur'];
    $fc -> printUpdateActor ($id);
});

$klein -> respond('POST','/updateActor', function($request) use ($bc, $fc) {
    $bc -> updateActor($request->paramsPost());
    $fc -> printActorsList();
});

////////////////////////////////////////////////////////////////////////////////
////////////////// actions sur les réalisateurs ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

// *************** afficher la liste des réalisateurs *************************
$klein -> respond('GET','/directorsList', function() use($fc) {
    $res = $fc -> directorsList();
});

////////////////////////////////////////////////////////////////////////////////
///////////////// actions sur les films ////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

// ************** afficher la liste des films //////////////////////////////////
$klein ->respond('GET', '/moviesList', function() use($fc) {
    $result = $fc ->moviesList();
    require_once('src/views/viewMoviesList.php');
});

// *************** afficher les détails d'un film *****************************
$klein ->respond('GET', '/printMovie/[:id]', function($request) use($fc) {
    $movie = $fc ->getOneMovie($request ->id);
    $director = $fc ->movieDirector($request ->id);
    $casting = $fc ->movieCasting($request ->id);
    $genre = $fc ->movieGenre($request ->id);
    $comments = $fc ->movieComments($request ->id);
    require_once('src/views/viewMovieById.php');
});


$klein -> dispatch();

?>
