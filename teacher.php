<?php
include "include/access.php";
check_access(TEACHER);
include "include/header.php";

if(isTeacher()) {
    $classStmt = $db->prepare("SELECT id, name FROM class WHERE teacher = :teacher ");
    $classStmt->execute(["teacher" => $_SESSION['user']]);
} else {
    // admins are allowed to change everything
    $classStmt = $db->prepare("SELECT id, name FROM class");
    $classStmt->execute();
}
$allowed_classes = $classStmt->fetchAll(PDO::FETCH_OBJ);
include "include/chart.php";
?>


<section  class="sectionbg" style="background-color: #F2F2DA;">

<div  style="
margin-left: 1%;
float: left;
width: 100%;
z-index: 2;
margin-left: 0%;
margin-top: -14px;
margin-right: 0%;
margin-bottom: 0px;
">


   <img src="teacher-banner.png" tag="light" width="100%" alt="light"
 height="auto">

        </div>


        <div
            style="margin-left: 1%;
                   margin-top: 154px;
                   margin-bottom: 0px;
                   margin-right: 1%;
                   position: relative;
z-index: 3;
                   background-color:#1BAB3F;
                   width: 98%;
                   " >

           <span style="font-size: 18px; text-align: center; color: white; margin-left: 2%;">Allgemeine Hinweise</span>	&#x2003;&#x2003;

           <a href="javascript:void(0)" onclick="return toggleArrow(this, '#teacherinfo')" style="background-color: white; margin-top: 10px;
            border: 2px solid white; border-radius: 30px;"

           ><i class="fa fa-arrow-down"></i></a>
           <span style="float: right;"><b>Alle Challenge-PDFs in einem ZIP-File?</b> <span><a href="/challenge-all.zip" class="indexlink" style="color: white; background-color: #E84B82;">
             <span data-title="hier downloaden!">hier downloaden!</span></a></span></span>
           <br>
 <span id="teacherinfo" style="display:none; margin-left: 2%; margin-right: 2%; font-size: 12px;">

                   <span style="color: black; text-align: justify; padding: 10px;">

              Vorgeschlagene Eigenkreationen werden nicht sofort hinzugefügt, sondern erst einer
                   Kontrolle unterzogen. Entspricht die vorgeschlagene
                   Eigenkreation den Kriterien der Nachhaltigkeit, wird sie dem
                   Challenge-Verzeichnis hinzugefügt und ist öffentlich mit Klassennamen sichtbar.
                   Wenn die vorgeschlagene Challenge unserer Einschätzung nach nicht den nachhaltigen
                   Kriterien entspricht, antworten wir Ihnen per Mail. <br><br>
                   Die Challenge-PDF zur Aufgabe "Barnga" ist nur für Lehrkräfte sichtbar. Sie können sie nach dem Login unter <i>Challenges</i> aufrufen.
  Wenn sich die
                   Größe Ihrer Klasse ändert oder Sie anderweitige
                   Fragen beziehungsweise Probleme haben, schreiben Sie uns einfach eine
                   E-Mail an   <span><a href="mailto:kontakt@weltfairsteher.jetzt" target="_top" class="indexlink" style="color: white; background-color: #E84B82;"><span data-title="kontakt@weltfairsteher.jetzt">kontakt@weltfairsteher.jetzt</span></a></span>. <br>

                 </span>
        </span>

                 </div>

        <!--Klasse wechseln, Logout
           -->
        <div class="teacher-challenge-box-inner" style="width: 98%;">
            <h4 style="color: white;">Challenge eintragen:</h4>

               <form id="solveChallenge" action="javascript:void(0);" onsubmit="sendForm(this)">
                    <b>Klasse:</b><br>
                    <select name="class" id="class" size="1">
                        <?php
                        // select all unsolved challenges by this class
                        $challengeStmt = $db->prepare("
SELECT id, name FROM challenge
WHERE id NOT IN (
SELECT c.id
FROM challenge AS c
JOIN solved_challenge AS sc ON c.id = sc.challenge
WHERE sc.class = :class
GROUP BY c.id)");
                        $challengesForClass = [];
                        foreach($allowed_classes as $class) {
                            $challengeStmt->execute(["class" => $class->id]);
                            $challengesForClass[$class->id] = $challengeStmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                            <option value="<?=e($class->id)?>"><?=e($class->name)?></option>
                        <?php } ?>
                    </select><br>
                    <b id="selfmadecha">Challenge:</b><br>
                    <select name="challenge" id="challenges" size="1"> </select><br/>
                    <label >
                        <input id="extra" type="checkbox" name="extra" value="extra"> Extrapunkte
                    </label>
                    <br><br>
                    <input type="submit" value="eintragen" style="background-color: green; color: white;"><br><br>
                </form>
                <script type="text/javascript">
                 var challengesForClass = <?= json_encode($challengesForClass); ?>;
                 var challenges = <?= json_encode(fetchAll("SELECT id, extrapoints FROM challenge"));?>;
                </script>
                <script src="js/teacher.js"></script>

            <!--"Klasse wechseln" nur anzeigen, wenn ein Lehrer für mehrere Klassen verantwortlich ist.
              In der Auswahlliste nur die Klassen anzeigen, die mit dem Konto des Lehrers verbunden sind -->
        </div>



        <div     style="
            z-index: 1;
        width: 98%;  margin-top: 30px; margin-bottom: 10px;
                   position: relative;
                   float: left; margin-left: 1%;
                   background-color:#1BAB3F;
        padding: 10px;
                   height: auto;
                   text-align: center">
        <h4 style="color: white;">Feedback: Einzelne Challenges bewerten</h4>
        <a href="javascript:void(0)" onclick="return toggleArrow(this, '#feedback')" style="background-color: white; margin-top: 10px;
         border: 2px solid white; border-radius: 30px;"

        ><i class="fa fa-arrow-down"></i></a><br>
        <span id="feedback" style="display:none; font-size: 12px;">
        Bitte jede Challenge-Bewertung einzeln abschicken. Die Daten gehen anonym ein.<br><br>
        <form id="addFeedback" action="javascript:void(0);" onsubmit="sendForm(this)">

          <b>Die Challenge:</b> <select style="color: black;" name="challenge">
            <?php foreach(fetchAll("SELECT id, name FROM challenge") as $c) {?>
                <option style="color: black;" value="<?=e($c->id)?>"><?=e($c->name)?></option><br>
            <?php } ?></select>
            <br><br>
            <b>...machte den Schüler*innen Spaß:</b><br>
        Nein:<input class="" type="radio" name="fun" value="1" /><br>
        Kaum:<input class="" type="radio" name="fun" value="2" /><br>
        Teils teils:<input class="" type="radio" name="fun" value="3" /><br>
        Ziemlich:<input class="" type="radio" name="fun" value="4" /><br>
        Sehr:<input class="" type="radio" name="fun" value="5" /><br>
        <br><br>
        <b>...konnte wie beschrieben in den Unterricht oder Schüler*innen-Alltag integriert werden:</b><br>
        Nein:<input class="" type="radio" name="integration" value="1" /><br>
        Kaum:<input class="" type="radio" name="integration" value="2" /><br>
        Teils teils:<input class="" type="radio" name="integration" value="3" /><br>
        Ziemlich:<input class="" type="radio" name="integration" value="4" /><br>
        Voll und ganz:<input class="" type="radio" name="integration" value="5" /><br>
        <br><br>
        <b>...dauerte so lange wie angegeben:</b><br>
        Länger:<input class="" type="radio" name="duration" value="1" /><br>
        Etwas länger:<input class="" type="radio" name="duration" value="2" /><br>
        Wie angegeben:<input class="" type="radio" name="duration" value="3" /><br>
        Etwas kürzer:<input class="" type="radio" name="duration" value="4" /><br>
        Kürzer:<input class="" type="radio" name="duration" value="5" /><br>
        <br><br>
        <b>...warf Probleme bei der Durchführung auf:</b><br>
        Keine:<input class="" type="radio" name="problems" value="1" /><br>
        Kaum:<input class="" type="radio" name="problems" value="2" /><br>
        Teils teils:<input class="" type="radio" name="problems" value="3" /><br>
        Manche:<input class="" type="radio" name="problems" value="4" /><br>
        Viele:<input class="" type="radio" name="problems" value="5" /><br>
        <br><br>


            Optionale Nachricht:
            <textarea name="comment" value="" cols="39" rows="5"></textarea><br><br>
            <input type="submit" style="background-color: green; color: white; value="Diese Challenge-Bewertung abschicken">
            <input type="reset" value="Zurücksetzen">
          </form>
          <span id="kontaktdaten"></span>
            </span>
        <br/>
        </div>



<!--Liniendiagramm

<div>
    <div id="chart" style="margin-left: 14px; width: 300px; height: auto; margin-bottom: 25px;
    background-color: #1BAB3F; margin-top: 255px; float: left; position: absolute;">
  </div>
</div>
<script type="text/javascript">
 $('document').ready(function(){
     var chart = new LineChart("chart");
 })
</script>
-->
<!-- Selfmade-Challenge vorschlagen
     evtl noch insofern ändern, dass nicht eine Beschreibung gefordert ist, sondern jenes formuliert werden muss, was auch wir für eine Challenge ausarbeiten (kategorie, punktzahl, einbettung...... gefahr: zu hohe hürde, eine eigene challenge zu formulieren)
   -->


           <div class="teacher-challenge-box-inner"
               style="
               z-index: 1;
width: 98%;
                      position: relative;
                      float: left;
                      background-color:#1BAB3F;
padding: 10px;
                      height: auto;
                      text-align: center;
                      font-size: 16px;">

               <form id="addChallenge" action="javascript:void(0);" onsubmit="sendForm(this, {'cb': function(errors) { if(!errors.length) alert('Eigenkreation erfolgreich eingereicht. Der Vorschlag Ihrer Klasse wird zeitnah besprochen.');}})">
                   <input type="hidden" name="suggested" value="yes">
                   <input type="hidden" name="category" value="">
            <h4 style="color: white;">Eigenkreation vorschlagen</h4>

            <a href="javascript:void(0)" onclick="return toggleArrow(this, '#eigenkreation')"
            style="background-color: white; margin-top: 10px;
             border: 2px solid white; border-radius: 30px;"

            ><i class="fa fa-arrow-down"></i></a><br>
            <span id="eigenkreation" style="display:none; font-size: 13px;">

            Damit die Eigenkreationen langfristig in das WeltFAIRsteher-Challenge-Angebot aufgenommen werden,<br>
            bitten wir Sie beim Ausfüllen der folgenden Felder die Hinweise und hinterlegten Richtwerte zu berücksichtigen.<br>
            Wir freuen uns auf die Ideen Ihrer Klasse!
            <div ><br>
                <b>Von:</b>
                <select name="class" size="1">
                    <?php
                    foreach($allowed_classes as $class) {
                    ?>
                        <option value="<?=e($class->id)?>"><?=e($class->name)?></option>
                    <?php } ?>
                </select><br><br>



                <b>Titel:</b>
                <input type="text" name="title" size="30" max="200" value="Maximal 200 Zeichen"></input><br><br>



                <b>Themenbereich:</b>
                <select style="color: black;" name="suggested_category" size="1">
                    <?php foreach($categories as $c) {?>
                        <option style="color: black;" value="<?= e($c->name)?>"><?= e($c->title)?> </option>
                    <?php } ?>
                </select><br><br>

                <b>Punkte für Challenge:</b>
                <select name="points" size="1">
                    <?php for($i = 1; $i <= 10; $i++) {?>
                        <option value="<?= $i?>"><?= $i?></option>
                    <?php } ?>
                </select><br><br>

                <b>Extrapunkte für Challenge:</b>
                <select name="extrapoints" size="1">
                    <option value="">Keine</option>
                    <?php for($i = 1; $i <= 10; $i++) {?>
                        <option value="<?= $i?>"><?= $i?></option>
                    <?php } ?>
                </select><br><br>

                <b>Durchführungsart:</b>
                <select style="color: black;" name="location" size="1">
                    <?php foreach($locationTypes as $lt) {?>
                        <option style="color: black;" value="<?= e($lt["name"])?>"><?= e($lt["desc"]) ?></option>
                    <?php } ?>
                </select>

            </div>
            <br>
            <div style="color: black;">
                <textarea cols="40" row="8" name="description" style="height: 320px; width: 93%;" >
                  Hinführung zum Thema bzw. zugrundeliegenden Problem (circa 200 - 300 Zeichen).

                  Beschreibung der Aufgabe (Ablauf, Organisation, Ziele, Gruppengröße, etc. - circa 700 - 1.000 Zeichen)</textarea>

                <br><br>

                <b>Dimensionen der Nachhaltigkeit (mehrere möglich):</b>
                <fieldset style="color: black;">

                        <label>
                            <input type="checkbox" name="dimensions[]" value="Ökologie">
                            Ökologie
                          </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <label>
                            <input type="checkbox" name="dimensions[]" value="Soziales">
                            Soziales
                          </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <label>
                            <input type="checkbox" name="dimensions[]" value="Ökonomie">
                            Ökonomie
                          </label>


              </fieldset><br>

              <b>Die Challenge gilt als bestanden, wenn...</b><textarea cols="10" row="3" name="goals" style="height: 80px; width: 93%;" >
            Kurze und prägnante Beschreibung der Minimalziele der Challenge, die erreicht werden müssen (circa 100 - 200 Zeichen)</textarea>

              <br><br>

              <b>Aufwand/Geschätzte Dauer</b><textarea cols="10" row="3" name="duration" style="height: 80px; width: 93%;" >
              Geschätzte Dauer einzelner voraussichtlicher Teilaufgaben der Challenge</textarea>
              <br><br>

              <b>Benötigte Hilfsmittel/Quellen</b><textarea cols="10" row="3" name="aid" style="height: 80px; width: 93%;" >
              Materialien, Links, etc.</textarea>
              <br><br>

              <b>Die Eigenkreation darf über dieses Schuljahr hinaus öffentlich verfügbar sein:</b>
              <fieldset style="color: black;">

                  <label>
                      <input type="checkbox" name="allow_continuous_use" value="zustimmung">

                        </label>

            </fieldset><br>
                 <br>


                <input type="submit" value="Abschicken"
                style="background-color: green; color: white; margin-left: auto; margin-right: auto;">
          </span>  </div>
        </form><br>

</div>



<div class=".abstand teacher-challenge-box"
id="pdf2"
 style="position: relative;
 margin-top: 30px;
 margin-right: 1%;
 width: 98%;
 margin-left: ;
 float: right;
padding: 10px;
 ">
 <form id="changeUser" action="javascript:void(0);" onsubmit="sendForm(this)">
     <h4 style="color: white;">Daten bearbeiten</h4>

     <span style="font-size: 11px;">(Felder leer lassen, um sie nicht zu ändern)<br/></span>
     <input type="hidden" name="user" value="<?= e($_SESSION["user"]) ?>">
     Neue E-Mail-Adresse: <br>
      <input type="text" name="email" value="">
     </input><br>

     Neues Passwort: <br>
     <input type="text" name="password" value=""> </input>
     <br>
     Passwort wiederholen:<br>
     <input type="text" name="password2" value=""> </input>
 <br><br>
     <input type="submit" value="Bestätigen" style="background-color: green; color: white;"> </input>
 </form>
 </div>
 <br>
 <br>
 <br> <br>
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
   <br>
   <br>
   <br> <br>
   <br> <br>

   <br>
   <br>
   <br>
   <br>
   <br> <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br> <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br>
     <br> <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br> <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br> <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
 <br>
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
  <br><br>
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
   <br><br>
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
 <br><br>
 <br>
 <br>
 <br>
<br>
<br>
<br>
<br>
</section>
<?php include "include/footer.php"?>
