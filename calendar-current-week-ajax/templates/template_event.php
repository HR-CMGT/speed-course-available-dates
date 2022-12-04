<?php
$start  = date('H:i', strtotime($reservation['start_time']));
$end    = date('H:i', strtotime($reservation['end_time']));
?>
<event>
    <header><?= $reservation['description'] ?></header>
    <div><?= $start ?> - <?= $end ?></div>
    <div><?= $reservation['description'] ?></div>
</event>
