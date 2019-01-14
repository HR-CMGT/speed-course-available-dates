<?php
require_once "includes/database.php";

$query = "SELECT *
          FROM reservations";

$result = mysqli_query($db, $query);

if ($result) {
    $reservations = [];
    while($row = mysqli_fetch_assoc($result)) {
        $reservations[] = $row;
    }
}

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Overzicht van alle reserveringen</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Alle reserveringen</h1>

<a href="select-date.php">Nieuwe reservering</a>
<a href="select-date-ajax.php">Nieuwe reservering (met Ajax)</a>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Naam</th>
        <th>Datum</th>
        <th>Tijd</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($reservations as $index => $reservation) {
        ?>
        <tr>
            <td><?= $index + 1?></td>
            <td><?= $reservation['name']; ?></td>
            <td><?= $reservation['date']; ?></td>
            <td><?= $reservation['time']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>
