<?php
$startTime = mktime(0, 0, 0, 12, 22, 2015);
$secondsPerDay = 60 * 60 * 24;

$classStmt = $db->prepare("SELECT id, name FROM class");
$classStmt->execute();
$classes = array();
foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $class) {
    $challengeStmt = $db->prepare("
SELECT c.points, sc.at, 0 AS creativity FROM solved_challenge AS sc
JOIN challenge AS c ON c.id = sc.challenge
WHERE sc.class = :id
UNION
SELECT 0 AS points, author_time AS at, 1 AS creativity FROM challenge
WHERE author = :id2
ORDER BY at
");
    // php is strange, can't use param multiple times
    $challengeStmt->execute(['id' => $class->id, 'id2' => $class->id]);

    $history = array();
    $points = 0;
    $creativity = 1;
    $curday = $startTime;
    foreach(array_merge($challengeStmt->fetchAll(PDO::FETCH_ASSOC),
                        [["points" => 0, "creativity" => 0, "at" => date("Y-m-d H:i:s", time() + $secondsPerDay)]])
                            as $ch) {
        while(strtotime($ch["at"]) >= $curday) {
            array_push($history, $points * $creativity);
            $curday += $secondsPerDay;
        }
        $points += $ch["points"];
        $creativity += $ch["creativity"] * 0.2;
    }
    array_push($classes, ["name" => $class->name,
                          "points" => $history,
                          "creativity" => $creativity,
                          "id" => $class->id]);
}

$milestones = fetchAll("SELECT points FROM milestone ORDER BY points ASC");

?>
<script type="text/javascript">
 var classes = <?= json_encode($classes) ?>;
 var milestones = <?= json_encode($milestones) ?>;
</script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="js/chart.js"></script>
