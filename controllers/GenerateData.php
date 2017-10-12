<?php

namespace Hotel\Controller;
use MongoDB\Client;

class GenerateData {
	public function httpGetRequest() {
		//connect a mongo
		$client = new Client();

		//collection room:
		$room = $client->Hotel->Room;
		$room->drop();
		$insertRoom = $room->insertMany( [
				[ "number" => 100, "type" => "Suite", "floor" => 1, "bedCount" => 2, "hasAirConditioner" => false ],
				[ "number" => 110, "type" => "Suite", "floor" => 5, "bedCount" => 3, "hasAirConditioner" => false ],
				[ "number" => 120, "type" => "Suite", "floor" => 4, "bedCount" => 3, "hasAirConditioner" => true ],
				[ "number" => 130, "type" => "Suite", "floor" => 1, "bedCount" => 2, "hasAirConditioner" => false ],
				[ "number" => 140, "type" => "Supérieure", "floor" => 3,"bedCount"  => 1, "hasAirConditioner" => false],
				[ "number" => 150, "type" => "Standard", "floor" => 5, "bedCount" => 1, "hasAirConditioner" => true ],
				[ "number" => 160, "type" => "Suite", "floor" => 3, "bedCount" => 1, "hasAirConditioner" => true ],
				[ "number" => 170, "type" => "Standard", "floor" => 5, "bedCount" => 1, "hasAirConditioner" => false ],
				[ "number" => 180, "type" => "Standard", "floor" => 1, "bedCount" => 4, "hasAirConditioner" => false ],
				[ "number" => 190, "type" => "Suite", "floor" => 3, "bedCount" => 2, "hasAirConditioner" => false ],
				[ "number" => 200, "type" => "Supérieure","floor" => 1, "bedCount" => 1, "hasAirConditioner" => false ],
				[ "number" => 210, "type" => "Standard", "floor" => 2, "bedCount" => 2, "hasAirConditioner" => true ],
				[ "number" => 220, "type" => "Standard", "floor" => 2, "bedCount" => 4, "hasAirConditioner" => true ],
				[ "number" => 230, "type" => "Standard", "floor" => 5, "bedCount" => 3, "hasAirConditioner" => true ],
				[ "number" => 240, "type" => "Standard", "floor" => 1, "bedCount" => 2, "hasAirConditioner" => false ],
				[ "number" => 250, "type" => "Supérieure","floor"=> 3, "bedCount" => 2, "hasAirConditioner" => false ],
				[ "number" => 260, "type" => "Supérieure", "floor" => 2, "bedCount" => 1, "hasAirConditioner" => true ],
				[
					"number"            => 270,
					"type"              => "Supérieure",
					"floor"             => 5,
					"bedCount"          => 2,
					"hasAirConditioner" => false
				],
				[ "number" => 280, "type" => "Standard", "floor" => 3, "bedCount" => 2, "hasAirConditioner" => true ],
				[ "number" => 290, "type" => "Standard", "floor" => 3, "bedCount" => 1, "hasAirConditioner" => true ]
			]
		);
		//recup la collection de clients
		$collection = $client->Hotel->Customer;
		//supression des clients
		$collection->drop();

		$insertClient = $collection->insertMany([
				[
					"first_name" => "Arvin",
					"last_name"  => "Howison",
					"gender"     => "Male",
					"email"      => "ahowison0@cnbc.com",
					"state"      => null
				],
				[
					"first_name" => "Shirleen",
					"last_name"  => "Beazley",
					"gender"     => "Female",
					"email"      => "sbeazley1@comcast.net",
					"state"      => null
				],
				[
					"first_name" => "Virgie",
					"last_name"  => "Castellan",
					"gender"     => "Male",
					"email"      => "vcastellan2@1und1.de",
					"state"      => "Centre"
				],
				[
					"first_name" => "Brnaba",
					"last_name"  => "O'Cooney",
					"gender"     => "Male",
					"email"      => "bocooney3@sohu.com",
					"state"      => null
				],
				[
					"first_name" => "Obediah",
					"last_name"  => "Dilks",
					"gender"     => "Male",
					"email"      => "odilks4@acquirethisname.com",
					"state"      => null
				],
				[
					"first_name" => "Alfonso",
					"last_name"  => "Keesman",
					"gender"     => "Male",
					"email"      => "akeesman5@gizmodo.com",
					"state"      => null
				],
				[
					"first_name" => "Tiebout",
					"last_name"  => "Mayers",
					"gender"     => "Male",
					"email"      => "tmayers6@skype.com",
					"state"      => null
				],
				[
					"first_name" => "May",
					"last_name"  => "Laise",
					"gender"     => "Female",
					"email"      => "mlaise7@imgur.com",
					"state"      => null
				],
				[
					"first_name" => "Emlyn",
					"last_name"  => "Hadny",
					"gender"     => "Female",
					"email"      => "ehadny8@hostgator.com",
					"state"      => null
				],
				[
					"first_name" => "Ancell",
					"last_name"  => "Ram",
					"gender"     => "Male",
					"email"      => "aram9@4shared.com",
					"state"      => null
				],
				[
					"first_name" => "Gottfried",
					"last_name"  => "Norfolk",
					"gender"     => "Male",
					"email"      => "gnorfolka@behance.net",
					"state"      => null
				],
				[
					"first_name" => "Dawn",
					"last_name"  => "Augur",
					"gender"     => "Female",
					"email"      => "daugurb@eventbrite.com",
					"state"      => "Lisboa"
				],
				[
					"first_name" => "Miller",
					"last_name"  => "Airton",
					"gender"     => "Male",
					"email"      => "mairtonc@nsw.gov.au",
					"state"      => null
				],
				[
					"first_name" => "Stepha",
					"last_name"  => "Bleything",
					"gender"     => "Female",
					"email"      => "sbleythingd@posterous.com",
					"state"      => "Kalmar"
				],
				[
					"first_name" => "Liz",
					"last_name"  => "Hatter",
					"gender"     => "Female",
					"email"      => "lhattere@sohu.com",
					"state"      => null
				],
				[
					"first_name" => "Erek",
					"last_name"  => "Naseby",
					"gender"     => "Male",
					"email"      => "enasebyf@ft.com",
					"state"      => null
				],
				[
					"first_name" => "Lynda",
					"last_name"  => "Vernham",
					"gender"     => "Female",
					"email"      => "lvernhamg@alexa.com",
					"state"      => null
				],
				[
					"first_name" => "Micah",
					"last_name"  => "Lively",
					"gender"     => "Male",
					"email"      => "mlivelyh@apache.org",
					"state"      => "Norrbotten"
				],
				[
					"first_name" => "Leonore",
					"last_name"  => "Franceschino",
					"gender"     => "Female",
					"email"      => "lfranceschinoi@eepurl.com",
					"state"      => null
				],
				[
					"first_name" => "Henrie",
					"last_name"  => "Jewiss",
					"gender"     => "Female",
					"email"      => "hjewissj@godaddy.com",
					"state"      => null
				]
			]
		);

//		//recup la collection de clients
//		$booking = $client->Hotel->Customer;
//		//supression des clients
//		$booking->drop();

//		$insertBooking = $booking->insertMany([
//		["checkingDate"=>["$date"=>"2017-04-17T03:38:46.000Z"],"checkoutDate"=>["$date"=>"2017-10-25T02:44:08.000Z"],"roomId"=>["$oid"=>"59de2219fc13ae5da1000069"],"customerCount"=>3]
//]
//);

		redirect_to_route( 'default' );
	}
}