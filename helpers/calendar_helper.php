<?php

/**
 * @param string $start in format "HH:ii"
 * @param string $end in format "HH:ii"
 * @param int $interval time in minutes
 * @return array with string format "HH:ii"
 */
function createArrayWithTimes(string $start, string $end, int $interval) {
    $times = [];

    $time = strtotime($start);
    $timeToAdd = 30;

    // loop (while of for loop)
    while($time <= strtotime($end))
    {
        // time toevoegen aan times array
        $times[] = date('H:i', $time);

        // time + een half uur optellen
        $time +=  60 * $timeToAdd;
    }

    return $times;
}

/**
 * @param array $times in format "HH:ii"
 * @param array $events with 'start_time' and 'end_time'
 * @return array in format "HH:ii"
 */
function filterTimesAndEvents(array $times, array $events) {
    $availableTimes = [];
    foreach ($times as $time)
    {
        $occurs = false;
        $time = strtotime($time);
        foreach ($events as $reservation)
        {
            $reservationStart = strtotime($reservation['start_time']);
            $reservationEnd     = strtotime($reservation['end_time']);

            if($time >=  $reservationStart && $time <  $reservationEnd) {
                $occurs = true;
            }
        }

        if(!$occurs) {
            $availableTimes[] = date('H:i', $time);
        }
    }

    return $availableTimes;
}