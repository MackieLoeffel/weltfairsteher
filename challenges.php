<?php include "header.php"?>

<br>
<br>

<?php
$categories = ["food" => 'ERNÄHRUNG',
               "energy" => "WASSER & ENERGIE",
               "culture" => "KULTURELLE VIELFALT",
               "climate-change" => "KLIMAWANDEL",
               "production" => "WARENPRODUKTION"];
foreach($categories as $category => $desc) {
?>
    <div class=".abstand challenge-header <?= $category ?>">
        <?= $desc ?>
    </div>
<?php
}
// TODO: error handling
$db = new PDO('mysql:host=localhost;dbname=website;charset=utf8', 'root', '', array(PDO::ATTR_EMULATE_PREPARES => false,
                                                                                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$challengeStmt = $db->prepare("SELECT * FROM challenge WHERE category=:category");
foreach($categories as $category => $desc) {
?>
    <div class=".abstand" style="background-color:#1BAB3F;
                             z-index: 1;
                             width: 18%;
                             height: auto;
                             float: left;
                             margin-top: 5px;
                             margin-right: 0px;
                             margin-bottom: 10px;
                             margin-left: 7px;
                             text-align:center;
                             color: white;
                             font-size: 11px;
                             ">

        <?php
        $challengeStmt->execute(['category' => $category]);
        foreach($challengeStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
        ?>
            <div class="<?= $row->category ?>"
                 style="z-index: 2;
                        width: 20px;
                        height: 20px;
                        border-radius:20px;
                        margin-top: 0px;
                        margin-right: 0px;
                        margin-bottom: -20px;
                        margin-left: 93%;
                        text-align:center;
                        color: black;
                        font-size: 14px;
                        font-width: bold;
                        float: left;
                        ">
                <b><?= $row->points?></b>
            </div>
            <b><u><a onclick="return toggleMe('challenge-<?=$row->id?>')" href="javascript:void(0)" style="color: white"><?=$row->name?></a></u></b><br>
            <div  style="display:none;" class="dbox" id="challenge-<?=$row->id?>">
                <?= $row->description ?>
            </div><br><br>
        <?php } ?>
    </div>
<?php } ?>


<div style="background-color:#54CC72;
            z-index: 1;
            width: 97%;
            height: 30px;
            float: left;
            margin-top: 15px;
            margin-right: 0px;
            margin-bottom: 5px;
            margin-left: 7px;
            text-align:center;
            color: white;
            font-size: 18px;
            ">
    Selfmade-Challenges
</div>
<div style="background-color:#1BAB3F;
            z-index: 1;
            width: 97%;
            height: auto;
            float: left;
            margin-top: 5px;
            margin-right: 0px;
            margin-bottom: 10px;
            margin-left: 7px;
            text-align:center;
            color: white;
            font-size: 11px;
            ">
    <div class=".abstand" style="z-index: 1; visibility: hidden;
                                 width: 18%;
                                 float: left;
                                 margin-top: 5px;
                                 margin-right: 0px;
                                 margin-bottom: 10px;
                                 margin-left: 5px;
                                 text-align:center;
                                 color: white;
                                 font-size: 11px;
                                 ">

        <div style="background-color: white; visibility: hidden;
                    z-index: 2;
                    width: 20px;
                    height: 20px;
                    border-radius:20px;
                    margin-top: 0px;
                    margin-right: 0px;
                    margin-bottom: -20px;
                    margin-left: 93%;
                    text-align:center;
                    color: black;
                    font-size: 14px;
                    font-width: bold;
                    float: left;
                    ">
            <b>3</b>
        </div>
        <b><u><a onclick="return toggleMe('para60')" href="javascript:void(0)" style="color: white">Städtisches Müllsammeln</a></u></b><br><div  style="display:none;" class="dbox" id="para60">
            Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.  <br><div style="color: black; visibility: hidden;">Klasse: <b> Die Sojapatronen</b></div>
        </div><br>
        <div style="background-color: white; visibility: hidden;
                    z-index: 2;
                    width: 20px;
                    height: 20px;
                    border-radius:20px;
                    margin-top: 0px;
                    margin-right: 0px;
                    margin-bottom: -20px;
                    margin-left: 93%;
                    text-align:center;
                    color: black;
                    font-size: 14px;
                    font-width: bold;
                    float: left;
                    ">
            <b>4</b>
        </div>
        <b><u><a onclick="return toggleMe('para61')" href="javascript:void(0)" style="color: white">Kleidertausch</a></u></b><br><div  style="display:none;" class="dbox" id="para61">
            Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. <br><div style="color: black; visibility: hidden;">Klasse: <b> Die Sojapatronen</b></div>
        </div><br><br>
    </div>
    <div class=".abstand" style="z-index: 1; visibility: hidden;
                                 width: 18%;
                                 float: left;
                                 margin-top: 5px;
                                 margin-right: 0px;
                                 margin-bottom: 10px;
                                 margin-left: 29px;
                                 text-align:center;
                                 color: white;
                                 font-size: 11px;
                                 ">
        <div style="background-color:#CC4321; visibility: hidden;
                    z-index: 15;
                    width: 20px;
                    height: 20px;
                    border-radius:20px;
                    margin-top: 0px;
                    margin-right: 0px;
                    margin-bottom: -20px;
                    margin-left: 93%;
                    text-align:center;
                    color: black;
                    font-size: 14px;
                    font-width: bold;
                    float: right;
                    ">
            <b>5</b>
        </div>
        <b><u><a onclick="return toggleMe('para62')" href="javascript:void(0)" style="color: white">Eigenproduziertes Etwas</a></u></b><br><div  style="display:none;" class="dbox" id="para62">
            Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.
            <br><div style="color: black; visibility: hidden;">Klasse: <b> Die Sojapatronen</b></div></div><br>
            <div style="background-color:#1B5A0A; visibility: hidden;
                        z-index: 2;
                        width: 20px;
                        height: 20px;
                        border-radius:20px;
                        margin-top: 0px;
                        margin-right: 0px;
                        margin-bottom: -20px;
                        margin-left: 93%;
                        text-align:center;
                        color: black;
                        font-size: 14px;
                        font-width: bold;
                        float: left;
                        ">
                <b>6</b>
            </div>
            <b><u><a onclick="return toggleMe('para63')" href="javascript:void(0)" style="color: white">Beispielchallenge</a></u></b><br><div  style="display:none;" class="dbox" id="para63">
                Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.  <br><div style="color: black; visibility: hidden;">Klasse: <b> Die Sojapatronen</b></div>
            </div><br></div>
</div>

<?php include "footer.php"?>
