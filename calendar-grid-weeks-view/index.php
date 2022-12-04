<?php

require_once "includes/functions.php";

//Get the current week from the GET or default to 0 (current week)
$selectedWeek = $_GET['week'] ?? 0;

//Retrieve the timestamp that belongs to the week that is active
$timestampWeek = strtotime("+$selectedWeek weeks");

//Get the weekdays that are part of the active week based on the timestamp
$weekDays = getWeekDays($timestampWeek);

//Get the month that belongs to the monday of that week
$monthOfWeek = date('F', $weekDays[0]['timestamp']);

//Get the year that belongs to the monday of that week
$yearOfWeek = date('Y', $weekDays[0]['timestamp']);

//The actual times visible in the calendar view
$rosterTimes = getRosterTimes();

//The events from the database that are in this week
$events = getEvents($weekDays[0]['fullDate'], $weekDays[6]['fullDate']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar weekview</title>
    <!-- From: https://codepen.io/kjellmf/pen/qgxyVJ -->
    <link href="css/normalize.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <style>
        .content {
            grid-template-rows: repeat(<?= count($rosterTimes); ?>, 2em);
        }

        .col {
            grid-row: 1/span<?= count($rosterTimes); ?>;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">
        <a href="?week=<?= $selectedWeek - 1 ?>">Vorige week</a>
        <span><?= $monthOfWeek . ' ' . $yearOfWeek; ?></span>
        <a href="?week=<?= $selectedWeek + 1 ?>">Volgende week</a>
    </div>
    <div class="days">
        <div class="filler"></div>
        <div class="filler"></div>
        <?php foreach ($weekDays as $weekday) { ?>
            <div class="day<?= $weekday['current'] ? ' current' : ''; ?>">
                <?= $weekday['day'] . ' ' . $weekday['dayNumber']; ?>
            </div>
        <?php } ?>
    </div>
    <div class="content">
        <?php foreach ($rosterTimes as $index => $rosterTime) { ?>
            <div class="time" style="grid-row:<?= $index + 1; ?>"><?= $rosterTime; ?></div>
        <?php } ?>
        <div class="filler-col"></div>
        <div class="col" style="grid-column:3"></div>
        <div class="col" style="grid-column:4"></div>
        <div class="col" style="grid-column:5"></div>
        <div class="col" style="grid-column:6"></div>
        <div class="col" style="grid-column:7"></div>
        <div class="col weekend" style="grid-column:8"></div>
        <div class="col weekend" style="grid-column:9"></div>
        <?php for ($i = 0; $i < count($rosterTimes); $i++) { ?>
            <div class="row" style="grid-row:<?= $i + 1; ?>"></div>
        <?php } ?>
        <?php foreach ($events as $event) { ?>
            <a href="" class="event" style="
                    grid-column: <?= $event['day_number'] + 2; ?>;
                    grid-row: <?= $event['row_start']; ?>/span <?= $event['row_span']; ?>;
                    "><?= $event['description']; ?></a>
        <?php } ?>
    </div>
</div>
</body>
</html>
