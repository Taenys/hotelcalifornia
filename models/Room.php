<?php

namespace Hotel\Model;

use MongoDB\Client;

use DateTimeImmutable;


class Room
{
	private function computeOccupancyRate(array $rooms, Calendar $calendar)
	{
		// Calcul du taux d'occupation de chaque chambre pour une période spécifiée.
		foreach($rooms as $room)
		{
			// Au départ on part du principe que la chambre est libre sur toute la période.
			$room['occupancy'] = array_fill_keys(range(0, $calendar->getDayCount() - 1), [ 'status' => 'free' ]);

			// Est-ce qu'il y a au moins une réservation pour cette chambre ?
			if(count($room['bookings']) > 0)
			{
				for($day = 0; $day < $calendar->getDayCount(); $day++)
				{
					$date = $calendar->createShiftedDate($day);

					foreach($room['bookings'] as $roomBooking)
					{
						$checkinDate  = new DateTimeImmutable($roomBooking['checkinDate']);
						$checkoutDate = new DateTimeImmutable($roomBooking['checkoutDate']);

						if($date >= $checkinDate && $date <= $checkoutDate)
						{
							$room['occupancy'][$day]['status'] = 'booked';

							// TODO: recopier ici les autres informations de la réservation.
						}
					}
				}
			}
		}

		return $rooms;
	}

	public function find(Calendar $calendarModel, $hasAirConditioner = null)
	{
		// au debut pas de filtre de recherche
		$filter = [];

		//présence de chambre avec air conditionné
		if($hasAirConditioner == true)
		{
			$filter['hasAirConditioner'] = true;
		}

		//connection mongodb
		$mongodb = new Client();

		// Récupération de la collection des chambres.
		$roomCollection = $mongodb->Hotel->Room;

		// Recherche de toutes les chambres et calcul du taux d'occupation pour chacune d'entre elles.
		$rooms = $roomCollection->find($filter)->toArray();
		$rooms = $this->computeOccupancyRate($rooms, $calendarModel);

		return $rooms;
	}
}