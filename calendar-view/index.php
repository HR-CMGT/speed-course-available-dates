<?php
// get monday of the current week
$monday = strtotime('last monday');
$currentDate= $monday;
$currentTime = strtotime('09:00');
$endTime = strtotime('17:00');
?>
<!doctype html>
<html lang="en" class="theme-light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css"
    >
    <title>Calendar View</title>
</head>
<body>

<div class="container mt-5">
    <p>
        This view uses <a href="https://bulma.io/">Bulma CSS</a> grid. There is one loop that goes over all the cells
        in the table. The first cell of the header is the time, the other cells are the dates. The first cell of the
        body is the time, the other cells are links to create an appointment. The time is incremented by 30 minutes.
        The date is incremented by 1 day. The loop stops when the time is 17:00.
    </p>
    <p>
        Because the grid is fixed and set to 8 columns (<strong>has-8-cols</strong>), the cells are automatically
        distributed. If you would like to see an example without a css framework, click on the link below.
    </p>
    <a href="view-with-divs.php">Calendar view without css framework</a>
    <h1 class="title has-text-centered">Weekly Calendar</h1>
    <div class="table-container">

        <div class="fixed-grid has-8-cols">
            <div class="grid">
                <!-- Header -->
                <?php for ($i = 0 ; $i < 8 ; $i++) { ?>
                    <div class="cell has-text-weight-bold">
                        <?php
                            if($i % 8 !== 0) {
                                echo date('l <\b\r> j F', $currentDate);
                                $currentDate += 24 * 3600;
                            }
                        ?>
                    </div>
                <?php } ?>

                <!-- Body-->
                <?php for ($i = 0 ; $currentTime < $endTime ; $i++) { ?>
                    <?php if($i % 8 === 0) { ?>
                        <!-- Reset current date-->
                        <?php $currentDate = $monday; ?>
                        <div class="cell has-background-light">
                            <?= date('H:i',$currentTime) ?>
                        </div>
                    <?php } if($i % 8 !== 0) { ?>
                        <div class="cell">
                            <a  class="button is-link is-light is-small"
                                href="create.php?date=<?= $currentDate ?>&time=<?= date('H:i', $currentTime) ?>">
                                maak afspraak
                            </a>
                        </div>
                        <?php $currentDate += 24 * 3600; ?>
                    <?php }  ?>
                    <?php
                        if($i % 8 === 7) {
                            $currentTime += 30 * 60;
                        }
                    ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>
