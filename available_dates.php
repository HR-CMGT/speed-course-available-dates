<?php
/**
 * Created by PhpStorm.
 * User: bobpikaar
 * Date: 2019-01-14
 * Time: 16:15
 */
require_once "includes/database.php";
require_once "helpers/calendar_helper.php";

$times = createArrayWithTimes('09:00', '17:00', 30);

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


$availableTimes = filterTimesAndEvents($times, $reservations);


header("Content-type: application/json");
echo json_encode($availableTimes);
exit;
