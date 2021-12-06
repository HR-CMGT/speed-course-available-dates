# speed-course-available-dates
Materiaal Speed Course Available dates (PHPStorm project)

In deze Speed Course wordt behandeld hoe je tijden kunt filteren die niet beschikbaar zijn. Wanneer bij een reserveringssysteem data en tijden in de database staan. Dan zullen deze tijden doorlopen moeten worden zodat alleen de beschikbare tijden, voor en datum, overblijven.

## Bestanden
- index.php (overzicht van alle reserveringen)
- index_advanced.php (Events in een calendar view, nieuw event met AJAX request)
- select-date.php (voor het selecteren van een datum)
- select-time.php (op deze pagina vindt de filtering plaats en hier zal uiteindelijk de reservering kunnen worden afgerond.)
- planning_system.sql (dump van de database)
- MAP: calendar-week-view (bevat een andere weergave van een weekkalender met de events in een CSS-grid view)

## Werkwijze
- Clone deze repository in de htdocs map van XAMPP via phpStorm  
  `git clone https://github.com/HR-CMGT/speed-course-available-dates.git`
- importeer de database via PHPMyAdmin  
  PhPMyAdmin > Importeren > bestand _planning_system.sql_ selecteren
- Werk in dit phpStorm project

## Opdracht
- Maak select-time.php werkend  
  Vul de code aan onder de commentaarregels.