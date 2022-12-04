<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP: reserveringsoverzicht mogelijkheden</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="content">
        <h1 class="title is-2">
            PHP: reserveringsoverzicht mogelijkheden
        </h1>
        <p class="mb-4">
            Voor het reserveringssysteem is de kans groot dat je zelf aan de slag wilt gaan met het bouwen van een mooi overzicht van
            reserveringen voor je opdrachtgever. Ter inspiratie hebben we 3 verschillende mogelijkheden klaargezet waar je gebruik van kunt
            maken. Deze code kun je <strong>niet</strong> gebruiken als bewijs voor Programmeren 2. Maar je kunt het <strong>wel</strong>
            gebruiken om je systeem gebruiksvriendelijker te maken binnen de context van je CLE-project.
        </p>
        <p class="mb-4">
            De volgende voorbeelden staan klaar. Daarbij altijd de disclaimer dat ze gebouwd zijn door docenten om te helpen en je misschien
            niet alles nodig hebt. Het 1-op-1 kopieren raden we ook af, probeer het zelf te bouwen op basis van hetgeen je hier ziet. Daar leer
            je het meest van en geeft je de kleinste kans op fouten (<em>bugs</em> 🪲) waar je niet uit komt.
        </p>
        <ol>
            <li>
                <a href="calendar-basic" target="_blank" class="is-bold">Basic:</a> Dit voorbeeld is gebaseerd op de kennis die je al hebt vanuit de les.
                Er is geen specifieke kalenderweergave maar er wordt gebruikt gemaakt van een tabel met reserveringen. De formulieren werken
                op basis van een stappenplan waarin je eerst datum selecteert en op het volgende formulier de tijd.
            </li>
            <li>
                <a href="calendar-current-week-ajax" target="_blank" class="is-bold">Huidige week met AJAX-form:</a> Dit voorbeeld toont de huidige week van
                het jaar waarin afspraken bij de juiste tijd en datum staan. Deze keer werkt het formulier met AJAX. Wanneer je de datum selecteert
                toont hij alle tijden die nog open zijn van die dag zonder dat je hiervoor naar een volgende pagina hoeft te gaan. <strong>Javascript
                binnen je browser (waaronder dus ook de AJAX-techniek) gaan we uitgebreid behandelen tijdens de module Programmeren 3.</strong>
            </li>
            <li>
                <a href="calendar-grid-weeks-view" target="_blank" class="is-bold">Navigatie van weken binnen CSS-grid:</a> Dit voorbeeld toont een weergave van
                de huidige week met de optie om eerdere en toekomstige weken te bekijken. De afspraken worden in de calendar getoond via de CSS-grid
                techniek. Formulieren zijn in dit voorbeeld niet toegevoegd, daarvoor kun je gebruik maken van de formulieren uit de andere voorbeelden.
            </li>
        </ol>
        <blockquote>
            Alle voorbeelden maken gebruik van dezelfde database. Deze kun je importeren door het <a href="planning_system.sql" download>SQL-bestand</a>
            te downloaden en te importeren binnen je phpMyAdmin omgeving.
        </blockquote>
    </div>
</section>
</body>
</html>