<?php
/**
 * Created by PhpStorm.
 * User: bobpikaar
 * Date: 2019-01-14
 * Time: 16:15
 */
require_once "includes/database.php";

$times = [];
$time = strtotime('09:00');
$timeToAdd = 30;

while($time <= strtotime('17:00')) {

    $times[] = date('H:i', $time);
    $time += 60 * $timeToAdd;
}

$date = mysqli_escape_string($db, $_GET['date']);

$query = "SELECT *
          FROM planning_system.reservations
          WHERE date = '$date'";

$result = $db->query($query) or die('Error: '.mysqli_error($db). 'QUERY: '.$query);

if ($result) {
    $reservations = [];
    while($row = mysqli_fetch_assoc($result)) {
        $reservations[] = $row;
    }
}

$availableTimes = [];
foreach ($times as $time)
{
    $occurs = false;
    $time = strtotime($time);
    foreach ($reservations as $reservation)
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

header("Content-type: application/json");
echo json_encode($availableTimes);
exit;
