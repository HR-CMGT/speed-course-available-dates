<!doctype html>
<html lang="en">
<head>
    <title>Nieuwe reservering - datum</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
<h1>Maak een nieuwe reservering aan</h1>

<form action="select-time.php" method="get">
    <div class="data-field">
        <label for="date">Selecteer een datum</label>
        <input id="date" type="date" name="date" value="<?= date('Y-m-d') ?>"/>
    </div>
    <div class="data-submit">
        <input type="submit" name="submit" value="Kies een tijd"/>
    </div>
</form>
</body>
</html>
