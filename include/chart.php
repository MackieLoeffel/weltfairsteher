<?php
array_push($categories, new Category("selfmade", "SELFMADE"));

function getCurrentPoints($c) {
    return end(array_values($c["points"]));
}

$sqlClasses = fetchAll("SELECT id, name FROM class");
$classPoints = calculatePoints(array_map(function($class) { return $class->id;}, $sqlClasses));
$classes = [];
$numSolvedChallenges = 0;
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
    $numSolvedChallenges += $classPoints[$class->id]["solved"][$cat->name];
    }

    array_push($classes, $classPoints[$class->id]);
}

$milestones = fetchAll("SELECT points FROM milestone ORDER BY points ASC");

$jsCategories = [];
foreach($categories as $cat) {
    $jsCat = [];
    $jsCat["name"] = $cat->name;
    $jsCat["title"] = $cat->title;
    $jsCat["num"] = fetch("SELECT COUNT(*) AS count FROM challenge WHERE category = :cat", ["cat" => $cat->name])->count;

    array_push($jsCategories, $jsCat);
}

?>
<script type="text/javascript">
 var classes = <?= json_encode($classes) ?>;
 var milestones = <?= json_encode($milestones) ?>;
 var categories = <?= json_encode($jsCategories) ?>;
</script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="js/chart.js"></script>
