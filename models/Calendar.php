<?php

namespace Hotel\Model;

use DateTimeImmutable;


// Modèle servant à manipuler un calendrier de dates
class Calendar
{
    private $dayCount;

    private $firstDate;


    public function __construct($firstDate, $dayCount)
    {
        $this->dayCount  = $dayCount;
        $this->firstDate = new DateTimeImmutable($firstDate);
    }

    public function createShiftedDate($days)
    {
        // Retourne une date basée sur la date de début du calendrier + un décalage en jours
        return $this->firstDate->modify("+$days days");
    }

    public function dump()
    {
        return
        [
            'dayCount'   => $this->dayCount,                    // Nombre de jours du calendrier
            'firstDate'  => $this->firstDate,                   // Date de début du calendrier
            'firstDay'   => $this->firstDate->format('j')       // Extraction du jour de la date de début du calendrier
        ];
    }

    public function getDayCount()
    {
        return $this->dayCount;
    }

    public function getFirstDate()
    {
        return $this->firstDate;
    }
}