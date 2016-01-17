<?php
include "include/access.php";

check_access(ADMIN);
include "include/header.php";
?>
<br>


<br>

<div class="admin-box">
    <b style="color: black;">Neue Klasse hinzufügen:</b><br>
    <input type="text" name=newclass value="Name">

</input>

<input type="button" value="Bestätigen" style="background-color: green; float: right;">

    </input>
</div>
<br>

<div class="admin-box">
    <b style="color: black;">Neue Lehrkraft hinzufügen:</b><br>
    E-Mail-Adresse:  <input type="text" name=newteacher value="E-Mail-Adresse">
    </input><br>

    Passwort:<input type="text" name=newteacherpw value="Achtstelliges Passwort">
    </input>
    <br>
    Passwort wiederholen:<input type="text" name=newteacherpw value="">
    </input>

    <input type="button" value="Bestätigen" style="background-color: green; float: right;">

    </input>
</div>
<br>



<div class="admin-box">

    <b style="color: black;">Lehrkraft mit Klasse verknüpfen:</b>
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

    <input type="button" value="Bestätigen" style="background-color: green; float: right;">

    </input>
</div>

<br>
<div class="admin-box">

    <b style="color: black;">Bestehende Klasse bearbeiten:</b>
    <br>
    Klasse: <select name="classlist">
        <option>Die Sojapatronen</option>
        <option>Elektrokürbis</option>
        <option>Mc Do Not</option>
    </select>
    <br>
    Namensänderung: <input type="text" value="" size=40>
    <br>(nur marignale Korrektur)
    </input><br><br>
    Bestandene Challenge entfernen: <select name="challengedelete">
        <option>Keine Auswahl</option>
        <option>Challenge 1</option>
        <option>Challenge 2</option>
    </select>
    <br>
    Vorgeschlagene Selfmade-Challenge entfernen: <select name="selfmadechallengedelete">
        <option>Keine Auswahl</option>
        <option>Challenge 1</option>
        <option>Challenge 2</option>
    </select>
    <!--
         wird eine hier entfernte Selfmade-Challenge noch unter "Challenges" angezeigt?
         Oder reduziert diese Änderung nur den Kreativitätsbonus der Klasse?
       -->
    <br><br>
    Bestandene Challenge hinzufügen: <select name="challengeadd">
        <option>Keine Auswahl</option>
        <option>Challenge 1</option>
        <option>Challenge 2</option>
    </select>
    <br>
    Vorgeschlagene Selfmade-Challenge hinzufügen: <select name="selfmadechallengeadd">
        <option>Keine Auswahl</option>
        <option>Challenge 1</option>
        <option>Challenge 2</option>
    </select>
    <br><br>
    Lehrkraft ändern: <select name="teacherlist">
        <option>Aktuelle Lehrkraft</option>
        <option>Lehrkraft B</option>
        <option>Lehrkraft C</option>
    </select>
    <br><br>
    <b style="color: red;">Klasse löschen:</b>
    <br>

    <input type="radio" value="classstay" name="loeschen" checked="checked">Nein
    </input>
    <br>
    <input type="radio" value="classdelete" name="loeschen">Ja
    </input>


    <input type="button" value="Gesamteingabe bestätigen" style="background-color: green; float: right;">

    </input>
</div>

<div class="admin-box">

    <b style="color: black;">Bestehende Lehrkraft bearbeiten:</b>
    <br>
    Lehrkraft: <select name="teacher">
        <option>Lehrkraft A</option>
        <option>Lehrkraft B</option>
        <option>Lehrkraft C</option>
    </select>
    <br>
    Neue E-Mail-Adresse: <input type="text" value="" size=40>
    </input><br>
    Neues Passwort: <input type="text" value="" size=20>

    </input><br>
    Passwort wiederholen: <input type="text" value="" size=20>

    </input><br>  <br>
    Klasse ändern: <select name="classlist">
        <option>Aktuelle Klasse</option>
        <option>Elektrokürbis</option>
        <option>Mc Do Not</option>
    </select>
    <br>
    Klasse hinzufügen: <select name="classlist2">
        <option>Keine Auswahl</option>
        <option>Elektrokürbis</option>
        <option>Mc Do Not</option>
    </select>
    <br><br>
    <b style="color: red;">Lehrkraft löschen:</b>
    <br>

    <input type="radio" value="classstay" name="loeschen2" checked="checked">Nein
    </input>
    <br>
    <input type="radio" value="classdelete" name="loeschen2">Ja
    </input>


    <input type="button" value="Gesamteingabe bestätigen" style="background-color: green; float: right;">

    </input>
</div>



<div class="admin-box">

    <b style="color: black;">Neue Challenge hinzufügen:</b>
    <br>
    Titel: <input type="text" value="" size=25>
    </input>
    <br>
    Kategorie: <select name="categories">
        <option>Ernährung</option>
        <option>Wasser & Energie</option>
        <option>Interkulturelle Verständigung</option>
        <option>Klimawandel</option>
        <option>Warenproduktion</option>
    </select>
    <br>
    Punkte: <input type="text" value="" size=5>
    </input>
    <br>
    Kurzbeschreibung: <textarea rows="7">
    </textarea>
    <br>
    <input type="button" value="Gesamteingabe bestätigen" style="background-color: green; float: right;">

    </input>
</div>


<div class="admin-box">

    <b style="color: black;">Neue Selfmade-Challenge hinzufügen:</b>
    <br>
    Titel: <input type="text" value="" size=25>
    </input>
    <br>
    Kategorie: <select name="categories">
        <option>Ernährung</option>
        <option>Wasser & Energie</option>
        <option>Interkulturelle Verständigung</option>
        <option>Klimawandel</option>
        <option>Warenproduktion</option>
        <option>Sonstiges</option>
    </select>
    <br>
    Punkte: <input type="text" value="" size=5>
    </input>
    <br>
    Kurzbeschreibung: <textarea rows="7">
    </textarea>
    <br>
    Verantwortliche Klasse: <select name="classes">
        <option>Die Sojapatronen</option>
        <option>Elektrokürbis</option>
        <option>Mc Do Not</option>
    </select>
    <br>
    <input type="button" value="Gesamteingabe bestätigen" style="background-color: green; float: right;">

    </input>
</div>




<div class="admin-box">

    <b style="color: black;">Bestehende Challenge bearbeiten:</b>
    <br>
    Challenge: <select name="challenges">
        <option>Bio-Frühstück</option>
        <option>Challenge 2</option>
        <option>Challenge 3</option>
    </select>
    <br>
    Titel: <input type="text" value="" size=25>
    </input>
    <br><br>
    Kategorie: <select name="categories">
        <option>Keine Auswahl</option>
        <option>Ernährung</option>
        <option>Wasser & Energie</option>
        <option>Interkulturelle Verständigung</option>
        <option>Klimawandel</option>
        <option>Warenproduktion</option>
        <option>Sonstiges</option>
    </select>
    <br>
    Punkte: <input type="text" value="" size=5>
    </input>
    <br>
    Kurzbeschreibung: <textarea rows="7">
    </textarea>
    <br><br>
    Schüler-PDF hinzufügen: <input type="file" name="schuelerpdf" accept="text/*.pdf">
    </input>

    <br>
    Lehrer-PDF hinzufügen:<input type="file" name="schuelerpdf" accept="text/*.pdf">
    </input>

    <br><br>
    <b>Selfmade-Challenge:</b>
    <br>

    <input type="radio" value="selfmade" name="selfmade" >Ja
    </input>
    <br>
    <input type="radio" value="noselfmade" name="selfmade" checked="checked">Nein
    </input>
    <br><br>
    Verantwortliche Klasse:
    <select name="classes">
        <option>Keine Auswahl</option>
        <option>Die Sojapatronen</option>
        <option>Elektrokürbis</option>
        <option>Mc Do Not</option>
    </select>
    <br><br>
    <b style="color: red;">Challenge löschen:</b>
    <br>

    <input type="radio" value="challengestay" name="loeschen3" checked="checked">Nein
    </input>
    <br>
    <input type="radio" value="challengedelete" name="loeschen3">Ja
    </input>
    <br>
    <input type="button" value="Gesamteingabe bestätigen" style="background-color: green; float: right;">

    </input>
</div>


<div class="admin-box">

    <b style="color: black;">Leckerwissen bearbeiten:</b>
    <br>
    Leckerwissen: <select name="leckerwissen">
        <option>Leckerwissen 1</option>
        <option>Leckerissen 2</option>
        <option>Leckerwissen 3</option>
    </select>
    <br>
    Bezeichnung: <input type="text" value="" size=25>
    </input>
    <br>
    Link: <input type="text" value="">
    </input>
    <br><br>
    Kategorie: <select name="categories">
        <option>Keine Auswahl</option>
        <option>Ernährung</option>
        <option>Wasser & Energie</option>
        <option>Interkulturelle Verständigung</option>
        <option>Klimawandel</option>
        <option>Warenproduktion</option>
        <option>Weiteres</option>
    </select>
    <br>
    Art: <select name="art">
        <option>Keine Auswahl</option>
        <option>Artikel</option>
        <option>Video</option>
        <option>Sonstiges</option>
    </select>
    <br><br>
    <b style="color: red;">Leckerwissen löschen:</b>
    <br>

    <input type="radio" value="leckerstay" name="loeschen4" checked="checked">Nein
    </input>
    <br>
    <input type="radio" value="leckerdelete" name="loeschen4">Ja
    </input>
    <br>
    <input type="button" value="Gesamteingabe bestätigen" style="background-color: green; float: right;">

    </input>
</div>


<div class="admin-box">
    <b style="color: black;">Admin bearbeiten:</b>
    <br>
    Angemeldet als: ---
    <br>
    Neue E-Mail-Adresse: <input type="text" name="adminmail">
    </input>
    <br>
    Neues Passwort: <input type="text" name="adminpw">
    </input>
    <br>
    Passwort wiederholen: <input type="text" name="adminpw">
    </input>
    <br>
    <input type="button" value="Bestätigen" style="background-color: green; float: right;">

    </input>
</div>



<div style="margin-left: 15%; margin-bottom: 30px; margin-right: 20px;
            color: white; font-size: 16px; width: 50%; height: auto; position: relative;
            float: left; background-color: #1BAB3F">
    <a href="register.php" style="color: blue;">Neuen Benutzer registrieren</a>

</div>

<br>

<div>
    <form action="logout.php" method="get">
        <input type="submit" value="Logout" style="background-color: #52150D; font-size: 11px; margin-top: 25px; color: white; margin-left: 5px;
                                                   width: auto; height: auto;
                                                   float: left;">
    </form>
</div>
<br>
<br>
<br>


<br>

</body>
</html>
