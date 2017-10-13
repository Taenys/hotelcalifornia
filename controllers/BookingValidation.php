<?php

namespace Hotel\Controller;
use Hotel\Model\Booking;

class BookingValidation {

	public function httpGetRequest()
	{
		$booking = new Booking();
		$bookingRequests = $booking->findRequests();

		return
			[
				'bookingRequests' => $bookingRequests
			];

	}

	public function httpPostRequest()
	{

	}
}