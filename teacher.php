<?php
include "include/access.php";
check_access(TEACHER);
include "include/header.php";


if(isset($_POST["class"])) {
    $checkStmt = $db->prepare("SELECT * FROM class WHERE id = :id AND teacher = :teacher");
    $checkStmt->execute(["id" => $_POST["class"], "teacher" => $_SESSION["user"]]);

    if($_SESSION["role"] > 1 || $checkStmt->fetch() !== false) {
        if(isset($_POST["challenge"])) {
            $scStmt = $db->prepare("SELECT * FROM solved_challenge WHERE class = :class AND challenge = :challenge");
            $scStmt->execute(["class" => $_POST["class"], "challenge" => $_POST["challenge"]]);

            if($scStmt->fetch() === false) {
                // race condition here
                $insertStmt = $db->prepare("INSERT INTO solved_challenge (class, challenge, at) VALUES (:class, :challenge, NOW())");
                $insertStmt->execute(["class" => $_POST["class"], "challenge" => $_POST["challenge"]]);
            }
        }
        if(isset($_POST["title"]) && isset($_POST["desc"]) && isset($_POST["points"])) {
            $insertStmt = $db->prepare("INSERT INTO suggested (title, description, class, points) VALUES (:title, :desc, :class, :points)");
            $insertStmt->execute(["title" => $_POST["title"],
                                  "desc" => $_POST["desc"],
                                  "class" => $_POST["class"],
                                  "points" => $_POST["points"]]);
        }
    }
}



if($_SESSION['role'] < 2) {
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





        <!--Klasse wechseln, Logout
           -->
        <div class="teacher-challenge-box-inner">
            <h4>Challenge eintragen:</h4>
            <span style="margin-bottom: 4px; margin-top: 9px; font-size:13px; color: black">
                <form method="post">
                    <b>Klasse:</b>
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
                        $challenges = [];
                        foreach($allowed_classes as $class) {
                            $challengeStmt->execute(["class" => $class->id]);
                            $challenges[$class->id] = $challengeStmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                            <option value="<?=e($class->id)?>"><?=e($class->name)?></option>
                        <?php } ?>
                    </select><br>
                    <b>Challenge:</b>
                    <select name="challenge" id="challenges" size="1"> </select>
                    <br><br>
                    <input type="submit" value="eintragen" style="background-color: green"><br><br>
                </form>
                <script type="text/javascript">
                 var challenges = <?= json_encode($challenges); ?>;
                </script>
                <script src="js/teacher.js"></script>
            </span>
            <!--"Klasse wechseln" nur anzeigen, wenn ein Lehrer für mehrere Klassen verantwortlich ist.
              In der Auswahlliste nur die Klassen anzeigen, die mit dem Konto des Lehrers verbunden sind -->
        </div>




<!--Liniendiagramm
   -->
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

<!-- Selfmade-Challenge vorschlagen
     evtl noch insofern ändern, dass nicht eine Beschreibung gefordert ist, sondern jenes formuliert werden muss, was auch wir für eine Challenge ausarbeiten (kategorie, punktzahl, einbettung...... gefahr: zu hohe hürde, eine eigene challenge zu formulieren)
   -->
<div
    style="margin-left: 328px;
           margin-top: 60px;
           margin-right: 5%;
           position: absolute;
           float: left;
           background-color:#1BAB3F;
           width: auto;
           max-width: 500px;
           height: auto;">

           <h4 style="margin-left: 22px;">Allgemeine Hinweise</h4>

           <ul> <span style="color: white; text-align: justify; margin-right: 8px;">
<li>Auf dieser Seite können bestandene <b style="color: black;">Challenges eingetragen</b> werden.
  Falls man für mehrere Klassen verantwortlich ist, muss die entsprechende Klasse
  zunächst ausgewählt werden. (Achtung: Relevant hierfür ist nicht die Auswahl
  in der schwarzen Menüleiste)
</li><br>
<li>Nachdem Sie sich als Lehrkraft eingeloggt haben, können Sie unter
  <i>Challenges</i> zu jeder Aufgabe eine <b style="color: black;">PDF-Datei downloaden</b>, in der
  Sie weitere Informationen zur Umsetzung einer Challenge finden, die für
  Sie als Lehrkraft relevant sind.
</li><br>
<li>Sie können auf dieser Seite auch <b style="color: black;">Selfmade-Challenges</b> von einer Klasse,
  für die Sie verantwortlich sind, vorschlagen. Füllen Sie dazu einfach das
  neben stehende Formular aus. Die vorgeschlagene Challenge wird allerdings
  nicht sofort hinzugefügt, sondern erst einer Kontrolle unterzogen. Entspricht
  die vorgeschlagene Selfmade-Challenge den Kriterien der Nachhaltigkeit, wird
  sie dem Challenge-Verzeichnis hinzugefügt und ist öffentlich sichtbar. Auch
  der Name der Klasse, die die Aufgabe vorgeschlagen hat, wird dort zu sehen sein.
  Wenn die vorgeschlagene Challenge nicht den nachhaltigen Kriterien
  entspricht, antworten wir Ihnen per Mail. Das Team hinter WeltFAIRsteher
  behält es sich vor, über die Entscheidung bezüglich der Akzeptanz einer
  Challenge selbständig zu verfügen.
</li></span>

           </ul>


         </div>

           <div
               style="margin-left: 14px;
               z-index: 1;
                      margin-top: 425px;
                      position: absolute;
                      float: left;
                      background-color:#1BAB3F;
                      width: 300px;
                      height: auto;
                      text-align: center">

        <form method="post">
            <h4>Selfmade-Challenge vorschlagen</h4>
            <div style="margin-left: 14px">
                <b>Von:</b>
                <select name="class" size="1">
                    <?php
                    foreach($allowed_classes as $class) {
                    ?>
                        <option value="<?=e($class->id)?>"><?=e($class->name)?></option>
                    <?php } ?>
                </select><br>

                <b>Titel:</b>
                <input type="text" name="title" size="20" max="200"><br>

                <b>Punkte für Challenge:</b>
                <select name="points" size="1">
                    <?php for($i = 1; $i <= 9; $i++) {?>
                        <option value="<?= $i?>"><?= $i?></option>
                    <?php } ?>
                </select>

            </div>
            <br>
            <div style="color: white; margin-left: 14px; margin-right: 14px;">
                <textarea cols="50" row=8" name="desc">Challenge-Beschreibung</textarea>

                <br>

                <span style="font-size: 13px; color: white">
                  Die Challenge-Beschreibung sollte Folgendes beinhalten:
<ul>
<li>abc
</li>
<li>def
</li>

</ul>                  </span><br>


                <input type="submit" value="Abschicken"
                style="background-color: green; margin-left: auto; margin-right: auto;">
            </div>
        </form><br>
</div>
<div class=".abstand teacher-challenge-box"><br>
    <section class="container">
        <form action="logout.php" method="get">
            <input type="submit" value="Logout" style="background-color: #52150D; font-size: 11px;">
        </form>
<br>
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
<?php include "include/footer.php"?>
