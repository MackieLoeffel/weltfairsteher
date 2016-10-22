<?php
array_push($categories, new Category("selfmade", ""));

$sqlClasses = fetchAll("SELECT id, name FROM class");
$classPoints = calculatePoints(array_map(function($class) { return $class->id;}, $sqlClasses));
$classes = [];
foreach($sqlClasses as $class) {
    $classPoints[$class->id]["name"] = $class->name;
    $classPoints[$class->id]["solved"] = [];
    foreach($categories as $cat) {
        $classPoints[$class->id]["solved"][$cat->name] = fetch("
SELECT COUNT(*) AS count
FROM solved_challenge sc
JOIN challenge c ON c.id = sc.challenge
WHERE sc.class = :class AND c.category = :category", [
    "class" => $class->id,
    "category" => $cat->name
])->count;
    }
    array_push($classes, $classPoints[$class->id]);
}

$milestones = fetchAll("SELECT points FROM milestone ORDER BY points ASC");

?>
<script type="text/javascript">
 var classes = <?= json_encode($classes) ?>;
 var milestones = <?= json_encode($milestones) ?>;
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="js/chart.js"></script>
