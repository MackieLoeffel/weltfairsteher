<?php
include "include/access.php";

check_access(ADMIN);
include "include/header.php";
?>
<script src="js/admin.js"></script>
<br>


<br>

<form id="addTeacher" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this)">
    <b style="color: black;">Neue Lehrkraft hinzufügen:</b><br>
    E-Mail-Adresse:  <input type="text" name="email" value="">
    </input><br>

    Passwort:<input type="text" name="password" value="">
    </input>
    <br>
    Passwort wiederholen:<input type="text" name="password2" value="">
    </input>

    <input type="submit" value="Bestätigen" style="background-color: green; float: right;">

    </input>
</form>
<br>
<form id="changeUser" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this)">
    <b style="color: black;">Bestehenden Benutzer bearbeiten:</b><br>
    (Felder leer lassen, um sie nicht zu ändern)<br/>
    Benutzer: <select name="user">
        <?php foreach(fetchAll("SELECT id, email FROM user") as $class) {?>
            <option value="<?=e($class->id)?>"><?=e($class->email)?></option>
        <?php } ?>
    </select><br/>
    Neue E-Mail-Adresse:  <input type="text" name="email" value=""> </input><br>

    Neues Passwort:<input type="text" name="password" value=""> </input>
    <br>
    Neues Passwort wiederholen:<input type="text" name="password2" value=""> </input>

    <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
</form>
<br>

<form id="addClass" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this)">
    <b style="color: black;">Neue Klasse hinzufügen:</b><br>
    Name: <input type="text" name="name" value=""></input> <br/>
    Lehrer: <select name="teacher" size="1">
        <?php foreach(fetchAll("SELECT id, email FROM user") as $teacher) {?>
            <option value="<?=e($teacher->id)?>"><?=e($teacher->email)?></option>
        <?php } ?>
    </select> <br/>
    <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
</form>
<br>

<form id="changeClass" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this)">
    <b style="color: black;">Bestehende Klasse bearbeiten:</b>
    <br>
    Klasse: <select name="class">
        <?php foreach(fetchAll("SELECT id, name FROM class") as $class) {?>
            <option value="<?=e($class->id)?>"><?=e($class->name)?></option>
        <?php } ?>
    </select>
    <br>
    Namensänderung: <input type="text" value="" name="name" size=40>
    <br>(nur marginale Korrektur)
    </input><br>
    Lehrkraft ändern:
    <select name="teacher" size="1">
        <option value="-1"> Aktueller Lehrer </option>
        <?php foreach(fetchAll("SELECT id, email FROM user") as $teacher) {?>
            <option value="<?=e($teacher->id)?>"><?=e($teacher->email)?></option>
        <?php } ?>
    </select><br/>
    <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
</form>

<form id="deleteClassBox" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this, {'api': 'deleteEntry'})">
    <input type="hidden" name="table" value="class" />
    <b style="color: red;">Klasse löschen</b><br/>
    <select name="id">
        <?php foreach(fetchAll("SELECT id, name FROM class") as $class) {?>
            <option value="<?=e($class->id)?>"><?=e($class->name)?></option>
        <?php } ?>
    </select><br/>
    <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
</form>

<form id="deleteTeacher" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this)">
    <b style="color: red;">Lehrer löschen</b><br/>
    <select name="teacher">
        <?php foreach(fetchAll("SELECT id, email FROM user WHERE role != :admin",
                               ["admin" => ADMIN]) as $class) {?>
            <option value="<?=e($class->id)?>"><?=e($class->email)?></option>
        <?php } ?>
    </select><br/>
    <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
</form>

<form id="addChallenge" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this)">
    <input type="hidden" name="class" value="-1">
    <input type="hidden" name="suggested" value="">
    <b style="color: black;">Neue Challenge hinzufügen:</b>
    <br>
    Titel: <input type="text" value="" size=25 name="title">
    </input>
    <br>
    Kategorie: <select name="category">
        <?php foreach($categories as $cat) {?>
            <option value="<?=e($cat->name)?>"><?= e($cat->title) ?></option>
        <?php } ?>
    </select>
    <br>
    Punkte:
    <select name="points" size="1">
        <?php for($i = 1; $i <= 9; $i++) {?>
            <option value="<?= $i?>"><?= $i?></option>
        <?php } ?>
    </select>

    <br>
    Kurzbeschreibung: <textarea rows="7" name="description"></textarea>
    <br>
    <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
</form>

<form id="changeChallenge" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this)">
    <b style="color: black;">Challenge bearbeiten:</b><br/>
    (Felder leer lassen, um sie nicht zu ändern)<br/>
    Challenge: <select name="challenge">
        <?php foreach(fetchAll("SELECT id, name FROM challenge") as $c) {?>
            <option value="<?=e($c->id)?>"><?=e($c->name)?></option>
        <?php } ?>
    </select><br/>
    <br>
    Titel: <input type="text" value="" size=25 name="name">
    </input>
    <br>
    Kategorie: <select name="category">
        <option value="">Aktuelle Kategorie</option>
        <?php foreach($categories as $cat) {?>
            <option value="<?=e($cat->name)?>"><?= e($cat->title) ?></option>
        <?php } ?>
    </select>
    <br>
    Punkte:
    <select name="points" size="1">
        <option value=""> Aktuelle Punktzahl </option>
        <?php for($i = 1; $i <= 10; $i++) {?>
            <option value="<?= $i?>"><?= $i?></option>
        <?php } ?>
    </select>

    <br>
    Kurzbeschreibung: <textarea rows="7" name="description"></textarea>
    <br>
    <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
</form>

<form id="acceptSelfmade" class="admin-box" action="javascript:void(0);" onsubmit="acceptSelfmade()">
    <input type="hidden" name="class" value="-1">
    <input type="hidden" name="suggested" value="">
    <input type="hidden" name="category" value="selfmade">
    <b style="color: black;">Selfmade-Challenge übernehmen:</b>
    <br>
    <div style="float: left">
        <select id="selfmadeSelect" size="10">
            <?php
            $suggestedChallenges = [];
            foreach(fetchAll("SELECT s.id, s.title, s.description, s.points, s.class, c.name, u.email FROM suggested s JOIN class c ON c.id = s.class JOIN user u ON u.id = c.teacher ") as $c) {
                $suggestedChallenges[$c->id] = $c;?>
                <option value="<?=e($c->id)?>"> <?=e($c->title)?></option>
            <?php } ?>
        </select>
        <script> var suggestedChallenges = <?= json_encode($suggestedChallenges) ?>; </script>
    </div>
    <div style="float: right">
        Von: <b id="class-name"> </b> <br/>
        Lehrkraft: <b id="teacher-email"> </b> <br/>
        Titel: <input type="text" value="" size="25" name="title"> </input>
        <br>
        Punkte:
        <select name="points" size="1">
            <?php for($i = 1; $i <= 10; $i++) {?>
                <option value="<?= $i?>"><?= $i?></option>
            <?php } ?>
        </select>

        <br>
        Kurzbeschreibung: <textarea rows="7" name="description"></textarea>
        <br>
        <input type="button" value="Selfmade-Challenge verwerfen" style="background-color: #52150D; float: right"
               onclick="sendForm('#acceptSelfmade', {'api': 'deleteEntry', 'data': {'table': 'suggested', 'id': $('#selfmadeSelect').val()}})"/>
        <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
    </div>
</form>

<form id="deleteChallengeBox" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this, {'api': 'deleteEntry'})">
    <input type="hidden" name="table" value="challenge" />
    <b style="color: red;">Challenge löschen</b><br/>
    <select name="id">
        <?php foreach(fetchAll("SELECT id, name FROM challenge") as $challenge) {?>
            <option value="<?=e($challenge->id)?>"><?=e($challenge->name)?></option>
        <?php } ?>
    </select><br/>
    <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
</form>

<div id="upload" class="admin-box">
    <b style="color: black;">PDF hochladen:</b>
    <br>
    Challenge: <select name="challenge">
        <?php foreach(fetchAll("SELECT id, name FROM challenge") as $challenge) {?>
            <option value="<?=e($challenge->id)?>"><?=e($challenge->name)?></option>
        <?php } ?>
    </select><br/>
    <br>
    PDF: <input type="file" name="file" accept="text/*.pdf"> </input>
    <br>
    <label for="teacher-pdf"> Hinweise für Lehrkraft [PDF] </label>
    <input id="teacher-pdf" type="radio" name="type" value="<?= e(TEACHER_PDF) ?>"></input>
    <br/>
    <label for="pupil-pdf"> Materialdatei für Schüler_innen [PDF] </label>
    <input id="pupil-pdf" type="radio" name="type" value="<?= e(PUPIL_PDF) ?>"></input>
    <br>
    <input type="submit" onclick="sendFile('upload')" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
</div>

<form id="changeLeckerwissen" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this)">
    <b style="color: black;">Leckerwissen bearbeiten:</b>
    <br>
    Leckerwissen:
    <select name="lw">
        <?php foreach(fetchAll("SELECT id, title FROM leckerwissen") as $lw) {?>
            <option value="<?=e($lw->id)?>"><?=e($lw->title)?></option>
        <?php } ?>
    </select><br/>
    <br>
    Bezeichnung: <input type="text" name="title" value="" size=25>
    </input>
    <br>
    Link: <input type="url" name="link" value="">
    </input>
    <br><br>
    Kategorie: <select name="category">
        <?php foreach($categories as $cat) {?>
            <option value="<?=e($cat->name)?>"><?= e($cat->title) ?></option>
        <?php } ?>
    </select>
    <br>
    Art: <select name="type">
        <?php foreach($leckerwissenTypes as $t) {?>
            <option value="<?=e($t["name"])?>"><?= e($t["desc"]) ?></option>
        <?php }?>
    </select>

    <br>
    <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;">

    </input>
</form>

<form id="deleteLWBox" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this, {'api': 'deleteEntry'})">
    <input type="hidden" name="table" value="leckerwissen" />
    <b style="color: red;">Leckerwissen löschen</b><br/>
    <select name="id">
        <?php foreach(fetchAll("SELECT id, title FROM leckerwissen") as $lw) {?>
            <option value="<?=e($lw->id)?>"><?=e($lw->title)?></option>
        <?php } ?>
    </select><br/>
    <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
</form>

<form id="addMilestone" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this)">
    <b style="color: black;">Etappe hinzufügen</b><br/>
    Punkte: <input type="text" value="" name="points" size="4" />
    <br>
    Kurzbeschreibung: <textarea rows="7" name="description"></textarea>
    <br>

    <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
</form>

<form id="changeMilestone" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this)">
    <b style="color: black;">Etappe ändern</b><br/>
    Punkte: <select name="milestone">
        <?php foreach(fetchAll("SELECT id, points FROM milestone") as $milestone) {?>
            <option value="<?=e($milestone->id)?>"><?=e($milestone->points)?></option>
        <?php } ?>
    </select><br>

    Neuer Punktwert für Etappe: <input type="text" value="" name="points" size=4 />
    <br>
    Kurzbeschreibung: <textarea rows="7" name="description"></textarea>
    <br>

    <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
</form>

<form id="deleteMilestoneBox" class="admin-box" action="javascript:void(0);" onsubmit="sendForm(this, {'api': 'deleteEntry'})">
    <input type="hidden" name="table" value="milestone" />
    <b style="color: red;">Etappe löschen</b><br/>
    Punkte: <select name="id">
        <?php foreach(fetchAll("SELECT id, points FROM milestone") as $m) {?>
            <option value="<?=e($m->id)?>"><?=e($m->points)?></option>
        <?php } ?>
    </select><br/>
    <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
</form>

<div class="admin-box">
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


<br>

</body>
</html>
