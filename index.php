<?php

// Chargement de l'autoload de classes de Composer.
require './vendor/autoload.php';

// Chargement du fichier de configuration de l'application.
require 'config.php';



// Fonction générant une redirection HTTP vers une autre route.
function redirect_to_route($route)
{
    header('Location: '.URL_ROOT."/index.php?r=$route");
    exit();
}

// Fonction affichant une vue.
function render_view($view, array $app)
{
    // Création des variables de la vue.
    extract($app['view-data'], EXTR_SKIP);

    // Affichage de la vue spécifié.
    require DIR_VIEWS."/$view";
}

// Fonction traduisant le nom d'une route en une URL : pratique pour hyperliens, submit de formulaires, etc.
function route_to_url($route)
{
    return URL_ROOT."/index.php?r=$route";
}



// --------------------------------------------------------------------------------------------------------------------
// CODE PRINCIPAL
// --------------------------------------------------------------------------------------------------------------------

/*
 * Création du conteneur de l'application contenant toutes les informations nécessaires pour l'exécution.
 *
 * - $app['controller']         : instance du contrôleur
 * - $app['controller-class']   : nom de la classe du contrôleur
 * - $app['controller-method']  : nom de la méthode du contrôleur
 * - $app['route']              : nom de la route
 * - $app['route-match']        : données correspondant à la route (nom du contrôleur et de la vue)
 * - $app['view']               : chemin vers la vue chargée par le layout
 * - $app['view-data']          : données renvoyées par le contrôleur à transmettre à la vue
 *
 * Ces informations sont enregistrées les unes après les autres dans le code ci-dessous.
 */
$app = [];


/*
 * Recherche si une route a été spécifiée dans l'URL et si elle est implémentée par l'application.
 * Utilisation de la route 'default' si au moins l'une des deux conditions n'est pas remplie.
 */
$app['route'] = array_key_exists('r', $_GET) ? $_GET['r'] : 'default';
$app['route'] = array_key_exists($app['route'], $config['mvc.routes']) ? $app['route'] : 'default';

if(array_key_exists($app['route'], $config['mvc.routes']) == false)
{
    die("ERREUR FATALE : table des routes incorrecte, aucune correspondance pour la route '{$app['route']}'.");
}

// Enregistrement des données correspondant à la route.
$app['route-match'] = $config['mvc.routes'][$app['route']];

if(array_key_exists('controller', $app['route-match']) == false)
{
    die("ERREUR FATALE : table des routes incorrecte, pas de contrôleur spécifié pour la route '{$app['route']}'.");
}
if(array_key_exists('view', $app['route-match']) == false)
{
    die("ERREUR FATALE : table des routes incorrecte, pas de vue spécifiée pour la route '{$app['route']}'.");
}

// Enregistrement du nom de la classe du contrôleur.
$app['controller-class'] = $config['app.namespace'].'\\Controller\\'.$app['route-match']['controller'];

// Création d'une instance du contrôleur spécifié par la route.
$app['controller'] = new $app['controller-class']($app);

// Sélection de la méthode du contrôleur qui va être appelée.
$app['controller-method'] = $_SERVER['REQUEST_METHOD'] == 'GET' ? 'httpGetRequest' : 'httpPostRequest';

if(method_exists($app['controller'], $app['controller-method']) == false)
{
    die
    (
        "ERREUR FATALE : requête HTTP de type '".$_SERVER['REQUEST_METHOD']."' ".
        "mais il n'y a pas de méthode correspondante dans le contrôleur '".get_class($app['controller'])."'."
    );
}

// Enregistrement du chemin vers la vue qui va être utilisée par le layout.
$app['view'] = DIR_VIEWS.'/'.$app['route-match']['view'];

// Appel la méthode du contrôleur et stocke le résultat éventuel pour transmission future à la vue.
$app['view-data'] = call_user_func([ $app['controller'], $app['controller-method'] ]);

// Affichage du layout de l'application.
render_view('layout.phtml', $app);