<?php
include "include/access.php";

check_access(ADMIN);
include "include/header.php";
?>
<br>
<h3> ADMIN </h3>
<b>Funktionen, die hier möglicht gemacht werden sollen:<br></b>
Neue Klasse hinzufügen<br>
Neue Lehrkraft hinzufügen und mit Klasse(n) verknüpfen<br>
Bestehende Klasse bearbeiten (Name, Kreativität, Challenges, Punkte, Klasse entfernen)<br>
Bestehende Lehrkraft bearbeiten (eMail-Adresse, Lehrkraft löschen)<br>
Neue Challenge hinzufügen <br>
Neue Selfmade-Challenge hinzufügen (mit verantwortlicher Klasse und Kreativitätsbonus)<br>
Schüler-PDF zu Challenge hinzufügen <br>
Lehrer-PDF zu Challenge hinzufügen <br>
Bestehende Challenge bearbeiten (Titel, Kategorie, Beschreibung, Punkte, PDF für Schüler/Lehrer)<br>
Leckerwissen bearbeiten (Titel, Link, Leckerwissen entfernen)<br>
Admin-Daten bearbeiten
<br>
<a href="register.php">Benutzer registrieren</a>
<form action="logout.php" method="get">
    <input type="submit" value="Logout" style="background-color: #52150D; font-size: 11px;">
</form>
<?php
include "include/footer.php";
?>
