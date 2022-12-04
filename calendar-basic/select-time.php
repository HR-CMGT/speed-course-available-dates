<?php

require_once "../includes/database.php";

// Maak een array met tijden van 09:00 - 17:00 met stappen van 30 minuten.
$times = [];
$time = strtotime('09:00');
$timeToAdd = 30;

// loop (while of for loop)
while ($time <= strtotime('17:00')) {
    // time toevoegen aan times array
    $times[] = date('H:i', $time);

    // time + een half uur optellen
    $time += 60 * $timeToAdd;
}

if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $endTime = date('H:i', strtotime($time . ' 1hour'));
    //Require the form validation handling
    require_once "../includes/form-validation.php";

    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO planning_system.reservations
                  (description, date, start_time, end_time)
                  VALUES ('$name', '$date', '$time', '$endTime')";
        $result = mysqli_query($db, $query)
        or die('Error: ' . mysqli_error($db) . 'QUERY: ' . $query);

        if ($result) {
            header('Location: index.php');
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }
    }
}

if (isset($_GET['date']) && !empty($_GET['date'])) {
    $date = mysqli_escape_string($db, $_GET['date']);

    // Haal de reserveringen uit de database voor een specifieke datum
    $query = "SELECT *
              FROM reservations
              WHERE date = '$date'";

    $result = mysqli_query($db, $query);

    if ($result) {
        $reservations = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $reservations[] = $row;
        }
    }

    // Doorloop alle reserveringen en filter alle tijden die gelijk zijn
    // aan de tijd van een reservering t/m een uur later.
    // Zet alle overgebleven tijden in de array $availableTimes.
    $availableTimes = [];

    // doorloop alle tijden (van 9:00 - 17:00)
    foreach ($times as $time) {
        $time = strtotime($time);
        $occurs = false;
        // controleer de tijd tegen ALLE reserveringen van die dag
        foreach ($reservations as $reservation) {
            $startTime = strtotime($reservation['start_time']);
            $endTime = strtotime($reservation['end_time']);
            // ALS de tijd van de begintijd tot de eindtijd van
            // een reservering valt voeg deze tijd ($time) niet
            // toe aan availableTimes
            if ($time >= $startTime &&
                $time < $endTime) {
                $occurs = true;
            }
        }

        if (!$occurs) {
            $availableTimes[] = date('H:i', $time);
        }
    }
} else {
    header('Location: select-date.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Nieuwe reservering - tijd</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
<h1>Maak een nieuwe reservering aan</h1>

<form action="" method="post">
    <div>
        <p>Reservering voor <?= date('d-m-Y', strtotime($date)) ?></p>
    </div>
    <div class="data-field">
        <label for="name">Jouw naam</label>
        <input id="name" type="text" name="name" value="<?= (isset($name) ? $name : ''); ?>"/>
        <span class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="time">Tijd</label>
        <select name="time" id="time">
            <?php foreach ($availableTimes as $time) { ?>
                <option value="<?= $time ?>"><?= $time ?></option>
            <?php } ?>
        </select>
        <span class="errors"><?= isset($errors['time']) ? $errors['time'] : '' ?></span>
    </div>
    <input type="hidden" name="date" value="<?= $date ?>"/>
    <div class="data-submit">
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
</body>
</html>
