<?php
include "include/access.php";

check_access(ADMIN);
include "include/header.php";
?>
<br>
<h3> ADMIN </h3>
<b>Funktionen, die hier möglich gemacht werden sollen:<br></b>
Bestehende Klasse bearbeiten (Name (aus Liste wählen), Kreativität (nach Listenwahl anzeigen und bearbeiten können), Challenges (auswählen und hinzufügen oder bestandene entfernen (unter zweiter auswahl)), Punkte (aktuelle anzeigen), Klasse entfernen)<br>
Bestehende Lehrkraft bearbeiten (eMail-Adresse, Lehrkraft löschen)<br>
Neue Challenge hinzufügen <br>
Neue Selfmade-Challenge hinzufügen (mit verantwortlicher Klasse und Kreativitätsbonus)<br>
Schüler-PDF zu Challenge hinzufügen <br>
Lehrer-PDF zu Challenge hinzufügen <br>
Bestehende Challenge bearbeiten (Titel, Kategorie, Beschreibung, Punkte, PDF für Schüler/Lehrer)<br>
Leckerwissen bearbeiten (Titel, Link, Leckerwissen entfernen)<br>
Admin-Daten bearbeiten
<br>

<div style="margin-left: 15%; margin-top: 30px; margin-right: 20px;
 color: white; font-size: 16px; width: auto; height: auto;
  float: left; background-color: #1BAB3F">
  <b>Neue Klasse hinzufügen:</b>
  <input type="text" name=newclass value="Name">

</input>

<input type="button" value="Bestätigen" style="background-color: green;">

</input>
</div>
<br>

<div style="margin-left: 15%; margin-top: 30px; margin-right: 20px;
 color: white; font-size: 16px; width: auto; height: auto;
  float: left; background-color: #1BAB3F">
  <b>Neue Lehrkraft hinzufügen:</b>
  <input type="text" name=newteacher value="E-Mail-Adresse">
</input><br>

<input type="text" name=newteacherpw value="Achtstelliges Passwort"
style="margin-left: 198px;">
</input>

<input type="button" value="Bestätigen" style="background-color: green;">

</input>
</div>
<br>



<div style="margin-left: 15%; margin-top: 30px; margin-right: 20px;
 color: white; font-size: 16px; width: auto; height: auto;
  float: left; background-color: #1BAB3F">

  <b>Lehrkraft mit Klasse verknüpfen:</b>
    <br>
  Lehrkraft: <select name="teacherlist">
    <option>Lehrkraft 1</option>
      <option>Lehrkraft 2</option>
        <option>Lehrkraft 3</option>
  </select>
  <br>
Klasse: <select name="classlist">
  <option>Die Sojapatronen</option>
    <option>Elektrokürbis</option>
      <option>Mc Do Not</option>
</select>

<input type="button" value="Bestätigen" style="background-color: green;">

</input>
</div>
<br>



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<a href="register.php">Benutzer registrieren</a>
<form action="logout.php" method="get">
    <input type="submit" value="Logout" style="background-color: #52150D; font-size: 11px;">
</form>
<?php
include "include/footer.php";
?>
