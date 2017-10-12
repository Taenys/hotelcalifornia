<?php

namespace Hotel\Controller;
use Hotel\Model\Booking;

class Home
{
	public function httpGetRequest()
	{
		$booking = new Booking();

		$bookings = $booking->find();

		return $bookings;
	}

	public function httpPostRequest()
	{
		// Code exécuté en cas de requête HTTP POST
	}
}