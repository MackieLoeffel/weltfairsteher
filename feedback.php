<?php
include "include/access.php";

check_access(ADMIN);
include "include/header.php"
?>
<br/>
<span style="margin-left: 5%;">Das bedeuten die Spalten-Werte:</span>
<ul>
<li><b>Spass</b>: 1 = Nein -- <span style="background-color: white;">2 = Kaum</span> -- 3 = Teils teils -- <span style="background-color: white;">4 = Ziemlich</span> -- 5 = Sehr</li>
<li><b>Integration</b>: 1 = Nein -- <span style="background-color: white;">2 = Kaum</span> -- 3 = Teils teils -- <span style="background-color: white;">4 = Ziemlich</span> -- 5 = Voll und ganz</li>
<li><b>Dauer</b>: 1 = Länger -- <span style="background-color: white;">2 = Etwas länger</span> -- 3 = Wie angegeben -- <span style="background-color: white;">4 = Etwas kürzer</span> -- 5 = Kürzer</li>
<li><b>Probleme</b>: 1 = Keine -- <span style="background-color: white;">2 = Kaum</span> -- 3 = Teils teils -- <span style="background-color: white;">4 = Manche</span> -- 5 = Viele</li>
</ul><br/><br/>
<span><a href="api/exportFeedback.php" style="background-color: white; margin-left: 5%; margin-bottom: 20px;" class="indexlink"><span data-title="Feedback exportieren">Feedback exportieren </span></a></span>

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
                <?php foreach(["name", "fun", "integration", "duration", "problems", "comment"] as $row) { ?>
                    <td style="text-align: center;" class="table-lines"> <?= e($feedback->$row) ?> </td>
                    <?php }?>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php include "include/footer.php"; ?>
