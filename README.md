PHP: reserveringsoverzicht mogelijkheden
========================================

Voor het reserveringssysteem is de kans groot dat je als team aan de slag wilt gaan met het bouwen
van een mooi overzicht van reserveringen voor je opdrachtgever. Ter inspiratie hebben we 3
verschillende mogelijkheden klaargezet waar je gebruik van kunt maken. Deze code kun je **niet**
gebruiken als bewijs voor Programmeren 2. Maar je kunt het **wel** gebruiken om je systeem
gebruiksvriendelijker te maken binnen de context van je CLE-project.

De volgende voorbeelden staan klaar. Daarbij altijd de disclaimer dat ze gebouwd zijn door docenten
om te helpen en je misschien niet alles nodig hebt. Het 1-op-1 kopiëren raden we ook af, probeer het
zelf te bouwen op basis van hetgeen je hier ziet. Daar leer je het meest van en geeft je de kleinste
kans op fouten (_bugs_ 🪲) waar je niet uit komt.

1. [Basic:](calendar-basic) Dit voorbeeld is gebaseerd op de kennis die je al hebt vanuit de les. Er is geen
   specifieke kalenderweergave maar er wordt gebruikt gemaakt van een tabel met reserveringen. De
   formulieren werken op basis van een stappenplan waarin je eerst datum selecteert en op het volgende
   formulier de tijd.
2. [Huidige week met AJAX-form:](calendar-current-week-ajax) Dit voorbeeld toont de huidige week van het jaar waarin afspraken
   bij de juiste tijd en datum staan. Deze keer werkt het formulier met AJAX. Wanneer je de datum selecteert
   toont hij alle tijden die nog open zijn van die dag zonder dat je hiervoor naar een volgende pagina hoeft
   te gaan. **Javascript binnen je browser (waaronder dus ook de AJAX-techniek) gaan we uitgebreid behandelen
   tijdens de module Programmeren 3.**
3. [Navigatie van weken binnen CSS-grid:](calendar-grid-weeks-view) Dit voorbeeld toont een weergave van de huidige week met de optie
   om eerdere en toekomstige weken te bekijken. De afspraken worden in de calendar getoond via de CSS-grid
   techniek. Formulieren zijn in dit voorbeeld niet toegevoegd, daarvoor kun je gebruik maken van de formulieren
   uit de andere voorbeelden.

> **Import database**
> 
> Alle voorbeelden maken gebruik van dezelfde database. Deze kun je importeren door het [SQL-bestand](planning_system.sql)
> te downloaden en te importeren binnen je phpMyAdmin omgeving.

Oefenopdracht
-------------

In deze [opdracht](calendar-basic-exercise) gaan we stapsgewijs door het aanmaken van een afspraak. Bij het maken van een afspraak moeten tijden die
niet meer beschikbaar zijn niet getoond worden. Voor deze opdracht heb je een database nodig. Zie"Import database" hierboven.
Verder zijn de pagina's [index.php](calendar-basic-exercise/index.php) en [select-date.php](calendar-basic-exercise/select-date.php) al klaar. Je past alleen select-time.php aan.

### Interactie

1. Kies voor de optie om een nieuwe reservering te maken op de [indexpagina](calendar-basic-exercise/index.php)
2. We selecteren eerst een datum op de pagina [select-date.php](calendar-basic-exercise/select-date.php)
3. Op basis van de gekozen datum worden alleen de tijden opgehaald die nog beschikbaar zijn.
4. Als laatste kan een beschikbare tijd gekozen worden en een naam voor de afspraak meegegeven worden.

> Ga naar `regel 34` in [select-time.php](calendar-basic-exercise/select-time.php). Vanaf hier zal je de volgende stappen moeten uitwerken.
>
> 1. Haal de geselecteerde datum op uit de url (GET methode)
> 2. Haal op basis van deze datum de bijbehorende reserveringen op uit de database. De connectie naar de database wordt al gemaakt op `regel 2`.
> 3. Maak (los van de reserveringen) een array met tijden van 09:00 - 17:00 met stappen van 30 minuten.
> 4. Doorloop alle reserveringen en filter alle tijden die gelijk zijn aan de tijd van een reservering t/m een uur later.
> 5. Zet alle overgebleven tijden in een array
> 6. Gebruik deze array om een dropdown te vullen