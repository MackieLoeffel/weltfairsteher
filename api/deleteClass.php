<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($id) = apiCheckParams("id");

apiAction(function() use($id) {
    dbExecute("UPDATE challenge SET author = NULL WHERE author = :id", ["id" => $id]);
    dbExecute("DELETE FROM solved_challenge WHERE class = :id", ['id' => $id]);
    dbExecute("DELETE FROM suggested WHERE class = :id", ['id' => $id]);
    dbExecute("DELETE FROM class WHERE id = :id", ['id' => $id]);
});
?>
