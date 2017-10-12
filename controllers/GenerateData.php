<?php

namespace Hotel\Controller;

use MongoDB\Client;


class GenerateData
{
    public function httpGetRequest()
    {
        // Connexion à MongoDB.
        $mongodb = new Client();


        /*
         * - Récupération de la collection des clients.
         * - Suppression de tous les clients (tous les documents dans la collection).
         * - Insertion des clients du jeu de données de test.
         */
        $customer = $mongodb->Hotel->Customer;
        $customer->drop();
        $customer->insertMany(json_decode(file_get_contents(DIR_DATA.'/Customer.json')));

        // Création d'un tableau listant tous les identifiants MongoDB des clients.
        $customerList = $customer->find([],['projection'=> ['_id'=> 1]])->toArray();
        

        /*
         * - Récupération de la collection des chambres.
         * - Suppression de toutes les chambres (tous les documents dans la collection).
         * - Insertion des chambres du jeu de données de test.
         * - Mise à jour des chambres pour relier les réservations à des clients aléatoires.
         */
        $room = $mongodb->Hotel->Room;
        $room->drop();
        $room->insertMany(json_decode(file_get_contents(DIR_DATA.'/Room.json')));

        // Recherche de toutes les chambres qui possèdent au moins une réservation.
        foreach($room->find(['bookings'=> ['$ne' => [] ] ]) as $oneRoom)
        {
            // Mise à jour de la réservation de la chambre, ajout du numéro de client.
            $room->updateOne
            (
            	['_id'=> $oneRoom['_id'] ],
	            ['$set'=> ['bookings.0.customerId' =>$customerList[array_rand($customerList)] ] ]
            );
        }
 

         // Retour à la page d'accueil.
        redirect_to_route('default');
    }
}