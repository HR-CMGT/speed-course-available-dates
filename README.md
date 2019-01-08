# speed-course-available-dates
Materiaal Speed Course Available dates (PHPStorm project)

In deze Speed Course wordt behandeld hoe je tijden kunt filteren die niet beschikbaar zijn. Wanneer bij een reserveringssysteem data en tijden in de database staan. Dan zullen deze tijden doorlopen moeten worden zodat alleen de beschikbare tijden, voor en datum, overblijven.

## Bestanden
- index.php (overzicht van alle reserveringen)
- select-date.php (voor het selecteren van een datum)
- select-time.php (op deze pagina vindt de filtering plaats en hier zal uiteindelijk de reservering kunnen worden afgerond.)
- available_dates.sql (dump van de database)

## Werkwijze
- Clone deze repository in de htdocs map van XAMPP middels  
  `git clone https://github.com/HR-CMGT/speed-course-available-dates.git`
- importeer de database via PHPMyAdmin  
  PhPMyAdmin > Importeren > bestand _available_dates.sql_ selecteren
- Open de map in PHPStorm

## Opdracht
- Maak select-time.php werkend  
  Vul de code aan onder de commentaarregels.

