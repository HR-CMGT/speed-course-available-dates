<?php

/******************************************************************
 * DIT IS EEN LOS VOORBEELD MET ENKEL HET AJAX FORMULIER.
 * DITZELFDE FORMULIER STAAT OOK IN DE INDEX.PHP ONDER DE CALENDAR
 ******************************************************************/

/** @var mysqli $db */
require_once "../includes/database.php";

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
        $result = mysqli_query($db, $query);

        if ($result) {
            //Set success message & empty all variables for new form
            $name = '';
            $date = '';
            $genre = '';
            $year = '';
            $tracks = '';
            $success = true;
            // Or redirect to index.php
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

        //Close connection
        mysqli_close($db);
    }
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Nieuwe reservering - tijd</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script type="text/javascript" src="js/main.js" defer></script>
</head>
<body>
<h1>Maak een nieuwe reservering aan</h1>

<form action="" method="post">
    <div class="data-field">
        <label for="name">Jouw naam</label>
        <input id="name" type="text" name="name" value="<?= ($name ?? ''); ?>"/>
        <span class="errors"><?= $errors['name'] ?? '' ?></span>
    </div>
    <div class="data-field">
        <label for="date">Datum</label>
        <input type="date" name="date" id="date"/>
        <span class="errors"><?= $errors['date'] ?? '' ?></span>
    </div>
    <div class="data-field">
        <label for="time">Tijd</label>
        <select name="time" id="time">
            <option value="">Select a date first</option>
        </select>
        <span class="errors"><?= $errors['time'] ?? '' ?></span>
    </div>
    <div class="data-submit">
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
</body>
</html>
