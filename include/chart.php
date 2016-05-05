<?php
$sqlClasses = fetchAll("SELECT id, name FROM class");
$classPoints = calculatePoints(array_map(function($class) { return $class->id;}, $sqlClasses));
$classes = [];
foreach($sqlClasses as $class) {
    $classPoints[$class->id]["name"] = $class->name;
    array_push($classes, $classPoints[$class->id]);
}

$milestones = fetchAll("SELECT points FROM milestone ORDER BY points ASC");

?>
<script type="text/javascript">
 var classes = <?= json_encode($classes) ?>;
 var milestones = <?= json_encode($milestones) ?>;
</script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="js/chart.js"></script>
