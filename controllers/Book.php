<?php

namespace Hotel\Controller;

use Hotel\Model\Booking;

class Book {

	public function httpPostRequest()
	{
		$booking = new Booking();
		$booking->addRequest("59df8a12cd2b7e3464005bca",
			"59df8a12cd2b7e3464005bb4", "2017-10-10", "2017-20-10");


		// Retour à la page d'accueil.
		redirect_to_route('default');
	}
}