<?php
include __DIR__."/include.php";

check_access_api(ADMIN);

list($id) = apiCheckParams("id");

apiAction(function() use($id) {
    dbExecute("DELETE FROM feedback WHERE challenge = :id", ['id' => $id]);
    dbExecute("DELETE FROM solved_challenge WHERE challenge = :id", ['id' => $id]);
    dbExecute("DELETE FROM challenge WHERE id = :id", ['id' => $id]);
});
?>
