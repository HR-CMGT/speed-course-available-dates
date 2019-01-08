<?php
require_once "includes/database.php";

// Maak een array met tijden van 09:00 - 17:00 met stappen van 15 minuten.

if(isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $time = mysqli_real_escape_string($db, $_POST['time']);
    $date = mysqli_escape_string($db, $_POST['date']);

    //Require the form validation handling
    require_once "includes/form-validation.php";

    if (empty($errors)) {
        //Save the record to the database
        $query = "INSERT INTO reservations
                  (name, date, time)
                  VALUES ('$name', '$date', '$time')";
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

if(isset($_GET['date']) && !empty($_GET['date'])) {
    $date = mysqli_escape_string($db, $_GET['date']);

    $query = "SELECT *
          FROM reservations
          WHERE date = '$date'";

    $result = $db->query($query);

    if ($result) {
        $reservations = [];
        while($row = mysqli_fetch_assoc($result)) {
            $reservations[] = $row;
        }
    }

    // Doorloop alle reserveringen en filter alle tijden die gelijk zijn
    // aan de tijd van een reservering t/m een uur later.
    // Zet alle overgebleven tijden in de array $availableTimes.
} else {
    header('Location: select-date.php');
}



?>
<!doctype html>
<html lang="en">
<head>
    <title>Nieuwe reservering - tijd</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
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
