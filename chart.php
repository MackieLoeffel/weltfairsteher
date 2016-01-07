<?php
$startTime = mktime(0, 0, 0, 12, 22, 2015);
$secondsPerDay = 60 * 60 * 24;

$classStmt = $db->prepare("SELECT id, name FROM class");
$classStmt->execute();
$classes = array();
foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $class) {
    $challengeStmt = $db->prepare("
SELECT c.points, sc.at FROM solved_challenge AS sc
JOIN challenge AS c ON c.id = sc.challenge
WHERE sc.class = :id
ORDER BY sc.at
");
    $challengeStmt->execute(['id' => $class->id]);

    $history = array();
    $points = 0;
    $curday = $startTime;
    foreach(array_merge($challengeStmt->fetchAll(PDO::FETCH_ASSOC),
                        [["points" => 0, "at" => date("Y-m-d H:i:s", time())]])
                            as $ch) {
        while(strtotime($ch["at"]) >= $curday) {
            array_push($history, $points);
            $curday += $secondsPerDay;
        }
        $points += $ch["points"];
    }
    array_push($classes, ["name" => $class->name,
                      "points" => $history,
                      "id" => $class->id]);
}
?>
<script type="text/javascript">
 classes = <?= json_encode($classes) ?>;
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script src="js/chart.js"></script>
