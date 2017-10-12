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

        return
        [
            'calendar' => $calendarModel->dump(),               // Récupération des informations du calendrier
            'rooms'    => $roomModel->find($calendarModel)      // Récupération des chambres pour le calendrier spécifié
        ];
    }

    public function httpPostRequest()
    {
        // Code exécuté en cas de requête HTTP POST
    }
}