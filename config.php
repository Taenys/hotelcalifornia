<?php

/*
 * Constantes globales utilisées pour l'architecture MVC du projet.
 *
 * Les constantes commençant par DIR_ servent aux chemins absolus sur le disque dur.
 * Les constantes commençant par URL_ servent aux URLs absolues depuis localhost.
 */
const DIR_ROOT  = __DIR__;                      // Chemin vers le dossier racine de l'application
const DIR_DATA  = DIR_ROOT.'/data';             // Chemin vers les données de l'application
const DIR_VIEWS = DIR_ROOT.'/views';            // Chemin vers les vues de l'application
const DIR_WWW   = DIR_ROOT.'/www';              // Chemin vers les fichiers statiques de l'application

const URL_ROOT = '/hotel';                      // URL vers l'application
const URL_WWW  = URL_ROOT.'/www';               // URL vers les fichiers statiques de l'application
 


$config =
[
    // Namespace racine de l'application.
    'app.namespace' => 'Hotel',

    /*
     * Table des routes de l'application.
     *
     * Pour chaque nom de route listé il y a un contrôleur et éventuellement une vue associés.
     * La route 'default' est utilisée quand aucune route n'est spécifiée dans l'URL.
     */
    'mvc.routes' =>
    [
        'default' => [ 'controller' => 'Home',              'view' => 'home.phtml' ],
        'test'    => [ 'controller' => 'GenerateData',      'view' => null         ],
	    'book'    => [ 'controller' => 'Book',              'view' => null         ],
	    'booking' => [ 'controller' => 'BookingValidation', 'view' => 'booking_validation.phtml']
    ]
];