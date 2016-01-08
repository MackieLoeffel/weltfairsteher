<?php
include "include/config.php";
?>

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="de-DE">
    <![endif]-->
    <!--[if IE 8]>
    <html class="ie ie8" lang="de-DE">
        <![endif]-->
        <!--[if !(IE 7) | !(IE 8)  ]><!-->
        <html lang="de-DE">
            <!--<![endif]-->
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width">
                <title>Die Nachhaltigkeitschallenge</title>

                <meta name="description" content="Die Nachhaltigkeitschallenge"/>
                <link rel="canonical" href="http://link"/>


                <style id='wp-polls-inline-css' type='text/css'>.wp-polls .pollbar{margin:1px;font-size:8px;line-height:10px;height:10px; border:1px solid #1874CD}</style>
                <link rel='stylesheet' id='twentythirteen-fonts-css' href='//fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C400%2C700%2C300italic%2C400italic%2C700italic%7CBitter%3A400%2C700%7COpen+Sans+Condensed%3A300%2C700&#038;subset=latin%2Clatin-ext' type='text/css' media='all'/>
                <link rel='stylesheet' id='genericons-css' href='http://de.ubergizmo.com/wp-content/themes/ubergizmo/fonts/genericons.css?ver=2.09' type='text/css' media='all'/>
                <link rel='stylesheet' id='twentythirteen-style-css' href='http://de.ubergizmo.com/wp-content/themes/ubergizmo/style.css?ver=1447668848' type='text/css' media='all'/>
                <link rel='stylesheet' href='styles.css' type='text/css' />
                <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
                <!--[if lt IE 9]>

                     <![endif]-->
                <script pagespeed_orig_type="text/javascript" type="text/psajs" orig_index="1">function w3tc_popupadmin_bar(url){return window.open(url,'','width=800,height=600,status=no,toolbar=no,menubar=no,scrollbars=yes');}</script>

                <SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
                 <!--
                                                                     var popupWindow=null;
                 function popup(mypage,myname,w,h,pos,infocus){

                     if (pos == 'random')
                     {LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
                     else
                     {LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
                     settings='width='+ w + ',height='+ h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=no,location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';popupWindow=window.open('',myname,settings);
                     if(infocus=='front'){popupWindow.focus();popupWindow.location=mypage;}
                     if(infocus=='back'){popupWindow.blur();popupWindow.location=mypage;popupWindow.blur();}

                 }
                 // -->
                </script>

            </head>

            <header id="masthead" class="site-header is-logged-in" role="banner" position="fixed">



                <div id="navbar" class="navbar">
                    <nav id="site-navigation" class="navigation main-navigation" role="navigation" style="margin-top: -33px">
                        <a class="home-link" href="index.php" title="Nachhaltigkeitschallenge" rel="home">
                            <h1 class="site-title">
                                <img src="http://www.virtuelles-geschenk-fuer.de/img/150/Baum.png" alt="Nachhaltigkeitschallenge" title="Nachhaltigkeitschallenge" style="width:20%; margin-left: 7px">
                            </h1>
                        </a>
                        <h3 class="menu-toggle">Menü</h3>
                        <a class="screen-reader-text skip-link" href="#content" title="Skip to content">Skip to content</a>
                        <div class="menu-menu-left-container" style="margin-left: -90px; float: left"><ul id="menu-menu-left" class="nav-menus nav-menu">
                            <?php
                            $sites = ["Tabelle" => "table.php",
                                      "Challenges" => "challenges.php",
                                      "Leckerwissen" => 'leckerwissen.php',
                                      'Lehrer-Bereich' => "teacher.php",
                                      'Impressum' => 'impressum.php'];
                            foreach ($sites as $site => $link) {
                            ?>
                                <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?=$link?>"><?=$site?></a></li>
                            <?php } ?>
                        </ul></div>

                        <span style="margin-right: 10px; margin-left: 10px; margin-bottom: 10px; margin-top: 9px; float: left; font-size:13px; color: #0F9C2E"><form method="POST">
                            <b>Wähle deine Klasse:</b>

                            <select id="class-select" name="klasse" size="1">
                                <?php
                                $classStmt = $db->prepare("SELECT id, name FROM class");
                                $classStmt->execute();
                                foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                                ?>
                                    <option value="<?= e($row->id) ?>"><?= e($row->name) ?></option>
                                <?php } ?>
                            </select>
                        </form></span>
                        <form role="search" method="get" class="search-form" action="http://link/">
                            <label>

                                <span class="screen-reader-text">Suche nach:</span>
                                <input type="search" class="search-field" placeholder="Suche&#160;&hellip;" value="" name="s" title="Suche nach:"/>
                            </label>
                            <input type="submit" class="search-submit" value="Suche"/>
                        </form> </nav>
                </div>
            </header>
            <style>
             .abstand { margin: 0cm 1cm 0cm 1cm;}
            </style>

            <script type="text/javascript" language="JavaScript">
             function toggleMe(a){
                 if(window.$) {
                     $("#" + a).toggle(500);
                     return true;
                 }
                 e = document.getElementById(a);
                 if(!e)return true;
                 if(e.style.display=="none"){
                     e.style.display="block"
                 }
                 else { e.style.display="none" }

             }
            </script>

            <body style="background-color:#0F9C2E;">
                  <!-- onLoad="popup('http://nachhaltigkeitschallenge.de/lehrer-login/popup/','lehrer-login','320','240','center','front');" -->
