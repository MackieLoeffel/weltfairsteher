<?php
include __DIR__."/include.php";

check_access(ADMIN);

list($lw) = apiCheckParams("leckerwissen");

apiCheck(dbExists("SELECT id FROM leckerwissen WHERE id = :lw", ['lw' => $lw]),
         "Leckerwissen existiert nicht!");

apiAction(function() use($lw) {
    dbExecute("DELETE FROM leckerwissen WHERE id = :lw", ['lw' => $lw]);
});
?>
