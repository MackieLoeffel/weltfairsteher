<?php
include "include/access.php";

check_access(ADMIN);

function slideDown($name, $func) {
?>
    <div class="slide-down admin-box">
        <div class="slide-down-header">
            <b style="color: black; float:left"><?= e($name) ?></b>
            <a href="javascript:void(0)" style="float:right; background-color: white; border: 2px solid white; border-radius: 30px;">
                <i class="fa fa-arrow-down"></i>
            </a>
        </div>
        <br/>

        <?php $func(); ?>
    </div>
    <br/>
<?php
}

include "include/header.php";
?>
<script src="js/admin.js"></script>
<br>


<br>
<?php slideDown("Neue Lehrkraft hinzufügen", function() { ?>
    <form id="addTeacher" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        E-Mail-Adresse:  <input type="text" style="color: black;" name="email" value="">
    </input><br>

    Passwort:<input type="text" style="color: black;" name="password" value="">
        </input>
        <br>
        Passwort wiederholen:<input style="color: black;" type="text" name="password2" value="">
        </input>

        <input type="submit" value="Bestätigen" style="background-color: green; float: right;">

        </input>
    </form>
<?php }); slideDown("Bestehenden Benutzer bearbeiten", function() { ?>
    <form id="changeUser" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        (Felder leer lassen, um sie nicht zu ändern)<br/>
        Benutzer: <select style="color: black;" name="user">
        <?php foreach(fetchAll("SELECT id, email FROM user") as $class) {?>
            <option style="color: black;" value="<?=e($class->id)?>"><?=e($class->email)?></option>
        <?php } ?>
        </select><br/>
        Neue E-Mail-Adresse:  <input type="text" style="color: black;" name="email" value=""> </input><br>

        Neues Passwort:<input type="text" style="color: black;" name="password" value=""> </input>
        <br>
        Neues Passwort wiederholen:<input type="text" style="color: black;" name="password2" value=""> </input>

        <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("Lehrkraft löschen", function() { ?>
    <form id="deleteTeacher" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        <select style="color: black;" name="teacher">
            <?php foreach(fetchAll("SELECT id, email FROM user WHERE role != :admin",
                                   ["admin" => ADMIN]) as $class) {?>
                <option style="color: black;" value="<?=e($class->id)?>"><?=e($class->email)?></option>
            <?php } ?>
        </select><br/>
        <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("Neue Klasse hinzufügen", function() { ?>
    <form id="addClass" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        Name: <input type="text" style="color: black;" name="name" value=""></input> <br/>
        Lehrer: <select style="color: black;" name="teacher" size="1">
        <?php foreach(fetchAll("SELECT id, email FROM user") as $teacher) {?>
            <option style="color: black;" value="<?=e($teacher->id)?>"><?=e($teacher->email)?></option>
        <?php } ?>
        </select> <br/>
        <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("Bestehende Klasse bearbeiten", function() { ?>
    <form id="changeClass" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        Klasse: <select style="color: black;" name="class">
        <?php foreach(fetchAll("SELECT id, name FROM class") as $class) {?>
            <option style="color: black;" value="<?=e($class->id)?>"><?=e($class->name)?></option>
        <?php } ?>
        </select>
        <br>
        Namensänderung: <input type="text" style="color: black;" value="" name="name" size=40>
        <br>(nur marginale Korrektur)
        </input><br>
        Lehrkraft ändern:
        <select style="color: black;" name="teacher" size="1">
            <option style="color: black;" value="-1"> Aktueller Lehrer </option>
            <?php foreach(fetchAll("SELECT id, email FROM user") as $teacher) {?>
                <option style="color: black;" value="<?=e($teacher->id)?>"><?=e($teacher->email)?></option>
            <?php } ?>
        </select><br/>
        <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("Klasse löschen", function() { ?>
    <form id="deleteClass" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        <input type="hidden" name="table" value="class" />
        <select style="color: black;" name="id">
            <?php foreach(fetchAll("SELECT id, name FROM class") as $class) {?>
                <option style="color: black;" value="<?=e($class->id)?>"><?=e($class->name)?></option>
            <?php } ?>
        </select><br/>
        <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("Neue Challenge hinzufügen", function() use ($categories, $locationTypes) { ?>
    <form id="addChallenge" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        <input type="hidden" name="class" value="-1">
        <input type="hidden" name="suggested" value="">
        Titel: <input style="color: black;" type="text" value="" size=25 name="title"></input>
        <br>
        Kategorie: <select style="color: black;" name="category">
            <?php foreach($categories as $cat) {?>
                <option style="color: black;" value="<?=e($cat->name)?>"><?= e($cat->title) ?></option>
            <?php } ?>
        </select>
        <br>
        Punkte:
        <select style="color: black;" name="points" size="1">
            <?php for($i = 1; $i <= 9; $i++) {?>
                <option style="color: black;" value="<?= $i?>"><?= $i?></option>
            <?php } ?>
        </select>
        <br>
        Extrapunkte:
        <select style="color: black;" name="extrapoints" size="1">
            <option value="">Keine</option>
            <?php for($i = 1; $i <= 10; $i++) {?>
                <option style="color: black;" value="<?= $i?>"><?= $i?></option>
            <?php } ?>
        </select><br>

        Durchführungsart:
        <select style="color: black;" name="location" size="1">
            <?php foreach($locationTypes as $lt) {?>
                <option style="color: black;" value="<?= e($lt["name"])?>"><?= e($lt["desc"]) ?></option>
            <?php } ?>
        </select>

        <br>
        Kurzbeschreibung: <textarea rows="7" style="color: black;" name="description"></textarea>
        <br>
        <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("Challenge bearbeiten", function() use ($categories, $locationTypes) { ?>
    <form id="changeChallenge" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        (Felder leer lassen, um sie nicht zu ändern)<br/>
        Challenge: <select style="color: black;" name="challenge">
        <?php foreach(fetchAll("SELECT id, name FROM challenge") as $c) {?>
            <option style="color: black;" value="<?=e($c->id)?>"><?=e($c->name)?></option>
        <?php } ?>
        </select><br/>
        <br>
        Titel: <input style="color: black;" type="text" value="" size=25 name="name">
        </input>
        <br>
        Kategorie: <select style="color: black;" name="category">
            <option style="color: black;" value="">Aktuelle Kategorie</option>
            <?php foreach($categories as $cat) {?>
                <option style="color: black;" value="<?=e($cat->name)?>"><?= e($cat->title) ?></option>
            <?php } ?>
        </select>
        <br>
        Punkte:
        <select style="color: black;" name="points" size="1">
            <option style="color: black;" value=""> Aktuelle Punktzahl </option>
            <?php for($i = 1; $i <= 10; $i++) {?>
                <option style="color: black;" value="<?= $i?>"><?= $i?></option>
            <?php } ?>
        </select><br>
        Extrapunkte:
        <select style="color: black;" name="extrapoints" size="1">
            <option value="nochange">Keine Änderung</option>
            <option value="">Keine</option>
            <?php for($i = 1; $i <= 10; $i++) {?>
                <option style="color: black;" value="<?= $i?>"><?= $i?></option>
            <?php } ?>
        </select><br>

        Durchführungsart:
        <select style="color: black;" name="location" size="1">
            <option style="color: black;" value=""> Aktueller Ort </option>
            <?php foreach($locationTypes as $lt) {?>
                <option style="color: black;" value="<?= e($lt["name"])?>"><?= e($lt["desc"]) ?></option>
            <?php } ?>
        </select>

        <br>
        Kurzbeschreibung: <textarea rows="7" name="description" style="color: black;"></textarea>
        <br>
        <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("Eigenkreation übernehmen", function() use ($locationTypes, $categories){ ?>
    <form id="acceptSelfmade" class="slide-down-hidden" action="javascript:void(0);" onsubmit="acceptSelfmade()">
        <input type="hidden" name="class" value="-1">
        <input type="hidden" name="suggested" value="">
        <input type="hidden" name="category" value="selfmade">
        <div style="float: left">
            <select id="selfmadeSelect" style="color: black;" size="10">
                <?php
                $suggestedChallenges = [];
                foreach(fetchAll("SELECT s.id, s.title, s.description, s.points, s.class, c.name, u.email, s.location, s.extrapoints, s.suggested_category, s.goals, s.aid, s.allow_continuous_use, s.duration, 0 as dimensions FROM suggested s JOIN class c ON c.id = s.class JOIN user u ON u.id = c.teacher ") as $c) {
                    $c->dimensions = [];
                    $c->suggested_category = array_pop(array_filter($categories, function($cat) use ($c) { return $cat->name === $c->suggested_category; }))->title;
                    foreach(fetchAll("SELECT dimension FROM suggested_dimension WHERE suggested_id = :id", ["id" => $c->id]) as $d) {
                        array_push($c->dimensions, $d->dimension);
                    }
                    $suggestedChallenges[$c->id] = $c;
                ?>
                    <option style="color: black;" value="<?=e($c->id)?>"> <?=e($c->title)?></option>
                <?php } ?>
            </select>
            <script> var suggestedChallenges = <?= json_encode($suggestedChallenges) ?>; </script>
        </div>
        <div style="float: right">
            Von: <b style="color: black;" id="class-name"> </b> <br/>
            Lehrkraft: <b style="color: black;" id="teacher-email"> </b> <br/>
            Titel: <input type="text" style="color: black;" value="" size="25" name="title"> </input>
            <br>
            Vorgeschlagener Themenbereich: <b style="color: black;" id="suggested_category"></b>
            <br>
            Punkte:
            <select style="color: black;" name="points" size="1">
                <?php for($i = 1; $i <= 10; $i++) {?>
                    <option style="color: black;" value="<?= $i?>"><?= $i?></option>
                <?php } ?>
            </select> <br>
            Extrapunkte:
            <select style="color: black;" name="extrapoints" size="1">
                <option value="">Keine</option>
                <?php for($i = 1; $i <= 10; $i++) {?>
                    <option style="color: black;" value="<?= $i?>"><?= $i?></option>
                <?php } ?>
            </select>
            <br/>
            Durchführungsart:
            <select style="color: black;" name="location" size="1">
                <?php foreach($locationTypes as $lt) {?>
                    <option style="color: black;" value="<?= e($lt["name"])?>"><?= e($lt["desc"]) ?></option>
                <?php } ?>
            </select>


            <br>
            Beschreibung: <textarea rows="7" style="color: black;" name="description"></textarea>
            <br>

            Dimensionen: <b style="color: black;" id="dimensions" ></b><br>

            Die Challenge gilt als bestanden, wenn...:
            <b style="color: black;" id="goals"></b>
            <br>

            Aufwand/Geschätzte Dauer: <b style="color: black;" id="duration" ></b>
            <br>

            Benötigte Hilfsmittel/Quellen  <b style="color: black;" id="aid"></b> <br>

            Die Eigenkreation darf über dieses Schuljahr hinaus öffentlich verfügbar sein:  <b style="color: black;" id="allow_continuous_use"></b>
<br>
           <br>


            <input type="button" value="Eigenkreation verwerfen" style="background-color: #52150D; float: right"
                   onclick="sendForm('#acceptSelfmade', {'api': 'deleteEntry', 'data': {'table': 'suggested', 'id': $('#selfmadeSelect').val()}})"/>
            <br/>
            <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
        </div>
    </form>
<?php }); slideDown("Challenge löschen", function() { ?>
    <form id="deleteChallenge" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        <input type="hidden" name="table" value="challenge" />
        <select style="color: black;" name="id">
            <?php foreach(fetchAll("SELECT id, name FROM challenge") as $challenge) {?>
                <option style="color: black;" value="<?=e($challenge->id)?>"><?=e($challenge->name)?></option>
            <?php } ?>
        </select><br/>
        <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("PDF hochladen", function() { ?>
    <div id="upload" class="slide-down-hidden">
        Challenge: <select style="color: black;" name="challenge">
        <?php foreach(fetchAll("SELECT id, name FROM challenge") as $challenge) {?>
            <option style="color: black;" value="<?=e($challenge->id)?>"><?=e($challenge->name)?></option>
        <?php } ?>
        </select><br/>
        <br>
        PDF: <input type="file" name="file" accept="text/*.pdf"> </input>
        <br>
        <label for="teacher-pdf"> Hinweise für Lehrkraft [PDF] </label>
        <input id="teacher-pdf" type="radio" name="type" value="<?= e(TEACHER_PDF) ?>"></input>
        <br/>
        <label for="pupil-pdf"> Challenge-Beschreibung [PDF] </label>
        <input id="pupil-pdf" type="radio" name="type" value="<?= e(PUPIL_PDF) ?>"></input>
        <br>
        <input type="submit" onclick="sendFile('upload')" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
    </div>
<?php }); slideDown("Challenge Bild hochladen", function() { ?>
    <div id="changePicture" class="slide-down-hidden">
        Challenge: <select style="color: black;" name="challenge">
        <?php foreach(fetchAll("SELECT id, name FROM challenge") as $challenge) {?>
            <option style="color: black;" value="<?=e($challenge->id)?>"><?=e($challenge->name)?></option>
        <?php } ?>
        </select><br/>
        <br>
        Bild (.png oder .jpg): <input type="file" name="file" accept="image/x-png,image/jpeg"> </input>
        <br>
        <input type="submit" onclick="sendFile('changePicture')" value="Gesamteingabe bestätigen" style="background-color: green; float: right;"> </input>
    </div>
<?php }); slideDown("Leckerwissen bearbeiten", function() use ($categories, $leckerwissenTypes){ ?>
    <form id="changeLeckerwissen" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        Leckerwissen:
        <select name="lw" style="color: black;">
            <?php foreach(fetchAll("SELECT id, title FROM leckerwissen") as $lw) {?>
                <option style="color: black;" value="<?=e($lw->id)?>"><?=e($lw->title)?></option>
            <?php } ?>
        </select><br/>
        <br>
        Bezeichnung: <input type="text" name="title" style="color: black;" value="" size=25>
        </input>
        <br>
        Link: <input type="url" name="link" style="color: black;" value="">
        </input>
        <br><br>
        Kategorie: <select name="category" style="color: black;">
            <?php foreach($categories as $cat) {?>
                <option style="color: black;" value="<?=e($cat->name)?>"><?= e($cat->title) ?></option>
            <?php } ?>
        </select>
        <br>
        Art: <select name="type" style="color: black;">
            <?php foreach($leckerwissenTypes as $t) {?>
                <option style="color: black;" value="<?=e($t["name"])?>"><?= e($t["desc"]) ?></option>
            <?php }?>
        </select>

        <br>
        <input type="submit" value="Gesamteingabe bestätigen" style="background-color: green; float: right;">

        </input>
    </form>
<?php }); slideDown("Leckerwissen löschen", function() { ?>
    <form id="deleteLWBox" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this, {'api': 'deleteEntry'})">
        <input type="hidden" name="table" value="leckerwissen" />
        <select name="id" style="color: black;">
            <?php foreach(fetchAll("SELECT id, title FROM leckerwissen") as $lw) {?>
                <option style="color: black;" value="<?=e($lw->id)?>"><?=e($lw->title)?></option>
            <?php } ?>
        </select><br/>
        <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("Etappe hinzufügen", function() { ?>
    <form id="addMilestone" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        Punkte: <input type="text" style="color: black;" value="" name="points" size="4" />
        <br>
        Kurzbeschreibung (aktuell unbenutzt): <br/>
        <textarea style="color: black;" rows="7" name="description"></textarea>
        <br>

        <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("Etappe ändern", function() { ?>
    <form id="changeMilestone" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this)">
        Punkte: <select style="color: black;" name="milestone">
        <?php foreach(fetchAll("SELECT id, points FROM milestone") as $milestone) {?>
            <option style="color: black;" value="<?=e($milestone->id)?>"><?=e($milestone->points)?></option>
        <?php } ?>
        </select><br>

        Neuer Punktwert für Etappe: <input style="color: black;" type="text" value="" name="points" size=4 />
        <br>
        Kurzbeschreibung (aktuell unbenutzt): <br/>
        <textarea style="color: black;" rows="7" name="description"></textarea>
        <br>

        <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); slideDown("Etappe löschen", function() { ?>
    <form id="deleteMilestoneBox" class="slide-down-hidden" action="javascript:void(0);" onsubmit="sendForm(this, {'api': 'deleteEntry'})">
        <input type="hidden" name="table" value="milestone" />
        Punkte: <select style="color: black;" name="id">
            <?php foreach(fetchAll("SELECT id, points FROM milestone") as $m) {?>
                <option style="color: black;" value="<?=e($m->id)?>"><?=e($m->points)?></option>
            <?php } ?>
        </select><br/>
        <input type="submit" value="Bestätigen" style="background-color: green; float: right;"> </input>
    </form>
<?php }); ?>
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
<br>


<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br> <br>
 <br> <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br> <br>
   <br> <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br> <br>
     <br> <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br> <br>
       <br> <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br> <br>
         <br> <br>
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
<?php include "include/footer.php"?>
