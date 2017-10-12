<?php

namespace Hotel\Model;
use MongoDB\Client;

class Booking {
public function find()
{
	$mongodb = new Client();

	$booking = $mongodb->Hotel->Booking;

	$bookings = $booking->find();
	return $bookings;
}
}