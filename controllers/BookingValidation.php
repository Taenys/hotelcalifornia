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
		$bookingModel = new Booking();

		if($_POST['isBooked'] == true)
		{
			$bookingModel->validate($_POST['roomId'],$_POST['customerId']);
		}
	}
}