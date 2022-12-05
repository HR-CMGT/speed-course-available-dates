<?php

/** @var mysqli $db */
require_once '../includes/database.php';
require_once '../includes/functions.php';

//Date of today & date of the day in 1 week
$date = date('Y-m-d');
$endDate = date('Y-m-d', strtotime('+1 week'));

$query = "SELECT * 
          FROM planning_system.reservations 
          WHERE date >= '$date' AND date <= '$endDate'
          ORDER BY start_time ASC";
$result = mysqli_query($db, $query) or die('Error ' . mysqli_error($db) . ' with query ' . $query);

$reservations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
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
mysqli_close($db);

$times = createArrayWithTimes('09:00', '17:00');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="js/main.js" defer></script>
</head>
<body>
<div class="row head">
    <div class="first"><?= date('M', strtotime($date)) ?></div>
    <?php for ($i = 0; $i < 7; $i++) { ?>
        <div class="column">
            <div>
                <?= date('D', strtotime($date . " + $i days")) ?>
                <br>
                <?= date('j', strtotime($date . " + $i days")) ?>
            </div>
        </div>
    <?php } ?>
</div>

<?php foreach ($times as $row => $time) { ?>
    <div class="row">
        <?php for ($i = -1; $i < 7; $i++) { ?>
            <?php if ($i == -1) { ?>
                <div class="time"><?= $time ?></div>
            <?php } else { ?>
                <div class="column border-top-gray">
                    <?php foreach ($reservations as $reservation) : ?>
                        <?php if (date('N', strtotime($reservation['date'])) == date('N', strtotime('+' . $i . ' day')) && strtotime($time) == strtotime($reservation['start_time'])) : ?>
                            <?php include 'templates/template_event.php' ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>

<!--    NEW EVENT   -->
<div class="row">
    <div class="column">
        <h2>Nieuw event</h2>
        <form action="" method="post">
            <div class="data-field">
                <label for="name">Omschrijving</label>
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
    </div>
</div>
</body>
</html>
