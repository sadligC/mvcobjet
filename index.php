
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

/////////////////////////////////////////////////////////////////////////////////
//////////////////////// actions sur acteurs ////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

// ************** afficher la liste des acteurs**********************************
$klein -> respond('GET','/listeActeurs', function() use($fc) {
    $res = $fc -> listeActeurs();
    // require_once ('src/views/viewListActor.php');
});

// ******************* ajouter un acteur à la bd *************************************
$klein -> respond('GET','/addActor', function() {
    require_once ('src/views/viewAddActeur.php');
});

$klein -> respond('POST','/addActeur', function($request) use($bc) {
    $bc -> addActor($request->paramsPost());
});

// ******************* modifier un acteur dans la bd *******************
$klein -> respond('GET','/updateActeur', function() use($fc) {
    $actorList = $fc -> listeActeurs();
    require_once ('src/views/viewUpdateActeur.php');
});

$klein -> respond('POST','/selectActor', function($request) use($fc) {
    $id = $request->paramsPost()['acteur'];
    $acteur = $fc -> selectActeur ($id);
    $actorList = $fc -> listeActeurs();
    require_once ('src/views/viewUpdateActeur.php');
});

$klein -> respond('POST','/updateActor', function($request) use ($bc) {
    $bc -> updateActor($request->paramsPost());
});

////////////////////////////////////////////////////////////////////////////////
////////////////// actions sur les réalisateurs ////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

// *************** afficher la liste des réalisateurs *************************
$klein -> respond('GET','/directorsList', function() use($fc) {
    $res = $fc -> directorsList();
    require_once ('src/views/viewDirectorsList.php');
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
