<?php

$config =
	[
		// Namespace racine de l'application.
		'app.namespace' => 'Hotel',

		// Liste des noms de routes implémentées par l'application.
		'mvc.routes' => [],

		/*
		 * Table des routes de l'application.
		 *
		 * Pour chaque nom de route listé dans $config['mvc.routes'] il y a un contrôleur et une vue associés.
		 * La route 'default' est utilisée quand aucune route n'est spécifiée dans l'URL.
		 */
		'mvc.route-map' =>
			[
				'default' => [ 'controller' => 'Home', 'view'        => 'home.phtml' ],
				'test'    => [ 'controller' => 'GenerateData', 'view'=> null]
			]
	];