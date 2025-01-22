<?php
// get monday of the current week
$monday = strtotime('last monday');
$currentTime = strtotime('09:00');
$endTime = strtotime('17:00');
$timeToAdd = 30;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar view without css framework</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
</head>
<body>
<p>
    This example does not use a css framework. It uses a loop in a loop to create rows and columns of divs. If the
    column = 0 this mean this is the header row. The day is displayed in the header row. If the row = 0 this means
    this is the first column of the row. The time is displayed in the first column of the row. The other columns
    are links to create an appointment. In the link the date and the selected time are passed as query parameters.
</p>
<a href="index.php">Back to Calendar View with Bulma CSS</a>
<p><br></p>

    <?php for ($row = 0 ; $currentTime < $endTime ; $row++) { ?>
        <?php $currentDate = $monday; ?>
        <div style="display: flex">
        <?php for ($column = 0 ; $column < 8 ; $column++) { ?>
            <div style="width: 100px; height: 40px; display: flex; justify-content: center; align-items: center">
            <?php // Header ?>
            <?php if($row == 0) { ?>
                <?php if($column == 0) { // first cell of header ?>
                    Time
                <?php } else { // other cells of header ?>
                    <?= date('l <\b\r> j F', $currentDate) ?>
                <?php } ?>

            <?php } else { ?>
                <?php // Body ?>
                <?php if($column == 0) { // first cell of the row ?>
                    <?= date('H:i',$currentTime) ?>
                <?php } else { // other cells of the row ?>
                    <a  class="button is-link is-light is-small"
                        href="create.php?date=<?= $currentDate ?>&time=<?=date('H:i', $currentTime)?>">
                        Maak afspraak
                    </a>
                <?php } ?>
            <?php } ?>
            </div>
            <?php if($column !== 0) $currentDate += 24 * 3600; ?>
        <?php } ?>
        </div>
        <?php if($row !== 0) $currentTime += $timeToAdd * 60; ?>
    <?php } ?>
</body>
</html>
