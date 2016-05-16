<?php
include "include/access.php";

check_access(ADMIN);
include "include/header.php"
?>
<br/><br/><br/><br/><br/><br/><br/>
<table style="color: white; width:98%;">
    <thead><tr>
        <th class="table-head"> Challenge </th>
        <th class="table-head"> Spass </th>
        <th class="table-head"> Integration </th>
        <th class="table-head"> Dauer </th>
        <th class="table-head"> Probleme </th>
        <th class="table-head"> Kommentar </th>
    </tr></thead>
    <tbody>
        <?php
        foreach(fetchAll("SELECT f.*, c.name  FROM feedback f JOIN challenge c ON f.challenge = c.id ") as $feedback) {
        ?>
            <tr>
                <?php foreach(["name", "fun", "integration", "problems", "duration", "comment"] as $row) { ?>
                    <td style="text-align: center;" class="table-lines"> <?= e($feedback->$row) ?> </td>
                    <?php }?>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include "include/footer.php"; ?>
