
<?php
$url = "http://localhost/afpa_dwwm/back_end_01/mvc/objet/mvcobjet/";
define ('_URL', $url);

require_once ('header.php');

require_once ('vendor/autoload.php');

use mvcobjet\controllers\BackController;
use mvcobjet\controllers\FrontController;


$base  = dirname($_SERVER['PHP_SELF']);
if(ltrim($base, '/')){ 
    $_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], strlen($base));
}

$klein = new \Klein\Klein();


$fc = new FrontController();
$bc = new BackController();


$klein -> respond('GET','/listeActeurs', function() use($fc) {
    $res = $fc -> listeActeurs();
    // echo "<pre>";
    // print_r ($res);
    // echo "</pre>";
    require_once ('src/views/viewListActor.php');
});

$klein -> respond('GET','/addActor', function() {
    require_once ('src/views/viewAddActeur.php');
});

$klein -> respond('POST','/addActeur', function($request) use($bc) {
    $bc -> addActor($request->paramsPost());
});

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



$klein -> dispatch();

?>
</body>
</html>