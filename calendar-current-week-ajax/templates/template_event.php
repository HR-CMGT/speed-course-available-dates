<?php

/** @var array $reservation */
$start = date('H:i', strtotime($reservation['start_time']));
$end = date('H:i', strtotime($reservation['end_time']));
$diffInMinutes = (strtotime($reservation['end_time']) - strtotime($reservation['start_time'])) / 60;
?>
<section class="event minutes-<?= $diffInMinutes ?>">
    <header><?= $reservation['description'] ?></header>
    <div><?= $start ?> - <?= $end ?></div>
    <div><?= $reservation['description'] ?></div>
</section>
