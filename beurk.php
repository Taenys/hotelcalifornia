<?php

// Initialisation de l'autoload de classes de Composer.
include __DIR__.'/vendor/autoload.php';

/*
 * Initialisation des constantes globales utilisées pour l'architecture MVC du projet :
 *
 * Les constantes commençant par DIR servent aux chemins absolus sur le disque dur
 * Les constantes commençant par URL servent aux URLs absolues depuis localhost
 */
const DIR_ROOT   = __DIR__;
const DIR_MODELS = DIR_ROOT.'/models';
const DIR_VIEWS  = DIR_ROOT.'/views';
const DIR_WWW    = DIR_ROOT.'/www';

const URL_ROOT = '/hotel';
const URL_WWW  = URL_ROOT.'/www';


$client = new Client;  //connect au server mongodb en localhost

$collection = $client->Hotel->Customer;  //on accède a la collection customer

// création d'un document mongo dns la collection représentant un client
$insertOneResult = $collection->insertOne([
	'firstName' => 'mon prénom',
	'lastName'  => 'mon nom',
	'email'     => 'admin@example.com'
]);

var_dump($insertOneResult->getInsertedId());

$collection = (new Client)->Hotel->Customer;

$document = $collection->findOne(['email' => 'admin@example.com']);

var_dump($document);


// Chargement de la vue.
include DIR_VIEWS.'/index.phtml';

[["first_name"=>"Arvin","last_name"=>"Howison","gender"=>"Male","email"=>"ahowison0@cnbc.com","state"=>null],
["first_name"=>"Shirleen","last_name"=>"Beazley","gender"=>"Female","email"=>"sbeazley1@comcast.net","state"=>null],
["first_name"=>"Virgie","last_name"=>"Castellan","gender"=>"Male","email"=>"vcastellan2@1und1.de","state"=>"Centre"],
["first_name"=>"Brnaba","last_name"=>"O'Cooney","gender"=>"Male","email"=>"bocooney3@sohu.com","state"=>null],
["first_name"=>"Obediah","last_name"=>"Dilks","gender"=>"Male","email"=>"odilks4@acquirethisname.com","state"=>null],
["first_name"=>"Alfonso","last_name"=>"Keesman","gender"=>"Male","email"=>"akeesman5@gizmodo.com","state"=>null],
["first_name"=>"Tiebout","last_name"=>"Mayers","gender"=>"Male","email"=>"tmayers6@skype.com","state"=>null],
["first_name"=>"May","last_name"=>"Laise","gender"=>"Female","email"=>"mlaise7@imgur.com","state"=>null],
["first_name"=>"Emlyn","last_name"=>"Hadny","gender"=>"Female","email"=>"ehadny8@hostgator.com","state"=>null],
["first_name"=>"Ancell","last_name"=>"Ram","gender"=>"Male","email"=>"aram9@4shared.com","state"=>null],
["first_name"=>"Gottfried","last_name"=>"Norfolk","gender"=>"Male","email"=>"gnorfolka@behance.net","state"=>null],
["first_name"=>"Dawn","last_name"=>"Augur","gender"=>"Female","email"=>"daugurb@eventbrite.com","state"=>"Lisboa"],
["first_name"=>"Miller","last_name"=>"Airton","gender"=>"Male","email"=>"mairtonc@nsw.gov.au","state"=>null],
["first_name"=>"Stepha","last_name"=>"Bleything","gender"=>"Female","email"=>"sbleythingd@posterous.com","state"=>"Kalmar"],
["first_name"=>"Liz","last_name"=>"Hatter","gender"=>"Female","email"=>"lhattere@sohu.com","state"=>null],
["first_name"=>"Erek","last_name"=>"Naseby","gender"=>"Male","email"=>"enasebyf@ft.com","state"=>null],
["first_name"=>"Lynda","last_name"=>"Vernham","gender"=>"Female","email"=>"lvernhamg@alexa.com","state"=>null],
["first_name"=>"Micah","last_name"=>"Lively","gender"=>"Male","email"=>"mlivelyh@apache.org","state"=>"Norrbotten"],
["first_name"=>"Leonore","last_name"=>"Franceschino","gender"=>"Female","email"=>"lfranceschinoi@eepurl.com","state"=>null],
["first_name"=>"Henrie","last_name"=>"Jewiss","gender"=>"Female","email"=>"hjewissj@godaddy.com","state"=>null]];