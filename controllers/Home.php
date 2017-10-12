<?php

namespace Hotel\Controller;

use Hotel\Model\Calendar;
use Hotel\Model\Room;


class Home
{
    public function httpGetRequest()
    {
        $calendarModel = new Calendar('2017-10-01', 14);        // Construction d'un calendrier de 14 jours démarrant au 01/10/2017
        $roomModel     = new Room();

        $rooms = $roomModel->find($calendarModel);

        return
        [
            'calendar' => $calendarModel->dump(),               // Récupération des informations du calendrier
            'rooms'    => $roomModel->find($calendarModel)      // Récupération des chambres pour le calendrier spécifié
        ];
    }

    public function httpPostRequest()
    {
       if(array_key_exists('hasAirConditioner', $_POST)== true)
       {
       	// l'utilisateur veut une chambre avec l'air condiotnné
	       $hasAirConditioner = true;
       }


	    $calendarModel = new Calendar('2017-10-01', 14);        // Construction d'un calendrier de 14 jours démarrant au 01/10/2017
	    $roomModel     = new Room();

	    $rooms = $roomModel->find($calendarModel, $hasAirConditioner);

	    return
		    [
			    'calendar' => $calendarModel->dump(),               // Récupération des informations du calendrier
			    'rooms'    => $rooms
		    ];
    }
}