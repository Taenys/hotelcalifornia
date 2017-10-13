<?php

namespace Hotel\Model;

use Predis\Client as Redis;
use MongoDB\Client as Mongo;
use MongoDB\BSON\ObjectID;

class Booking {

	public function addRequest($roomId, $customerId, $checkinDate, $checkoutDate)
	{

		//créer l'instance du client
		$redis = new Redis();

		//créer les clés/valeurs
		$redis->set('booking', json_encode([
			 $roomId,          //0
			 $customerId,      //1
			 $checkinDate,     //2
			 $checkoutDate
		])); //3

	}

	public function findRequests()
	{
		$mongoDB = new Mongo(); // connexion mongo
		$redisDB = new Redis(); //connexion redis

		//decode le json de redis
		$bookingRequest = json_decode($redisDB->get("booking"), true);

		//accès à la collection customer et room
		$customerCollection = $mongoDB->Hotel->Customer;
		$roomCollection = $mongoDB->Hotel->Room;

		//chercher par un id une entrée de la base de données
		$customer = $customerCollection->findOne(['_id'=> new ObjectID($bookingRequest[1]) ] );
		$room = $roomCollection->findOne(['_id'=> new ObjectID($bookingRequest[0]) ] );

		return
			[
			'roomId'       => $room['_id'],
			'roomNumber'   => $room['number'],
			'customerId'   => $customer['_id'],
			'firstName'    => $customer['firstName'],
			'lastName'     => $customer['lastName'],
			'checkinDate'  => $bookingRequest['2'],
			'checkoutDate' => $bookingRequest['3']
		];


	}
}