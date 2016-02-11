<?php
include __DIR__."/config.php";
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
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
                <title>WeltFAIRsteher</title>

                <meta name="description" content="Die Nachhaltigkeitschallenge"/>
                <link rel="canonical" href="http://link"/>

<!-- Favicon einbinden
-->
<link rel="apple-touch-icon" sizes="57x57" type="image/x-icon" href="favi/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" type="image/x-icon" href="favi/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" type="image/x-icon" href="favi/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" type="image/x-icon" href="favi/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" type="image/x-icon" href="favi/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" type="image/x-icon" href="favi/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="favi/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" type="image/x-icon" href="favi/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" type="image/x-icon" href="favi/apple-icon-180x180.png">
<link rel="icon" type="image/x-icon" sizes="192x192"  href="favi/android-icon-192x192.png">
<link rel="icon"  sizes="32x32" type="image/x-icon" href="favi/favicon-32x32.png">
<link rel="icon" type="image/x-icon" sizes="96x96" href="favi/favicon-96x96.png">
<link rel="icon" sizes="16x16" type="image/x-icon" href="favi/favicon-16x16.png">
<link rel="manifest" href="favi/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favi/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">



                <style id='wp-polls-inline-css' type='text/css'>.wp-polls .pollbar{margin:1px;font-size:8px;line-height:10px;height:10px; border:1px solid #1874CD}</style>
                <link rel='stylesheet' id='twentythirteen-fonts-css' href='//fonts.googleapis.com/css?family=Source+Sans+Pro%3A300%2C400%2C700%2C300italic%2C400italic%2C700italic%7CBitter%3A400%2C700%7COpen+Sans+Condensed%3A300%2C700&#038;subset=latin%2Clatin-ext' type='text/css' media='all'/>
             <link rel='stylesheet' id='genericons-css' href='http://de.ubergizmo.com/wp-content/themes/ubergizmo/fonts/genericons.css?ver=2.09' type='text/css' media='all'/>
                <link rel='stylesheet' id='twentythirteen-style-css' href='http://de.ubergizmo.com/wp-content/themes/ubergizmo/style.css?ver=1447668848' type='text/css' media='all'/>
                <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
                <link rel='stylesheet' href='styles.css' type='text/css' />
              <script src="libs/lodash.js"></script>
              <script src="libs/jquery.js"></script>
                <script src="js/classSelect.js"></script>
                <script src="js/api.js"></script>
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
                                  <a class="home-link" href="index.php" title="Weltfairsteher" rel="home">
                                      <h1 class="site-title">
                                        <img src="Logo_BGtransparent.png" alt="Weltfairsteher" title="Weltfairsteher" style="height: 32px; margin-left: 10px">
                                      </h1>
                                  </a>

<!--
                                  <a class="menu-toggle"
                                         href="#" style="color: white;" title="menu">Menü</a>
-->



                                  <div class="menu-menu-left-container" style="margin-left: -10px; float: left"><ul id="menu-menu-left" class="nav-menus nav-menu">

                                     <?php
                                     $sites = ["Tabelle" => "table.php",
                                               "Challenges" => "challenges.php",
                                               "Leckerwissen" => 'leckerwissen.php',
                                               'Lehrkraft-Bereich' => "teacher.php",
                                               'Impressum' => 'impressum.php'];
                                     if(isAdmin()) {
                                         $sites["Admin"] = "admin.php";
                                     }
                                     foreach ($sites as $site => $link) {
                                     ?>

                                         <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?=$link?>"><?=$site?></a></li>

                                     <?php } ?>
                                  </ul></div>

                                  <span style="margin-right: 10px; margin-left: 10px; margin-bottom: 10px; margin-top: 9px; float: left; font-size:13px; color: #0F9C2E">
                                    <form method="POST">
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
                                  </nav>
                          </div>

                          <!--  Scroll to Top Script -->
                          <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
                          </script>

                          <script>
                          	jQuery(document).ready(function() {
                          		var offset = 220;
                          		var duration = 500;
                          		jQuery(window).scroll(function() {
                          			if (jQuery(this).scrollTop() > offset) {
                          				jQuery('.scrollbutton-top').fadeIn(duration);
                          			} else {
                          				jQuery('.scrollbutton-top').fadeOut(duration);
                          			}
                          		});

                          		jQuery('.scrollbutton-top').click(function(event) {
                          			event.preventDefault();
                          			jQuery('html, body').animate({scrollTop: 0}, duration);
                          			return false;
                          		})
                          	});
                          </script>




          </header>
<!--
<div style="margin-left: auto; margin-right: auto; margin-top: 10px; margin-bottom: 20px;
width: 40%; text-align: center; color: black; background-color: yellow;">
  Homepage noch in Bearbeitung.
</div>
-->
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

            <body style="background-color: #C5F2B6;">
<section id="border" class="sectionbg">
                  <!-- onLoad="popup('http://nachhaltigkeitschallenge.de/lehrer-login/popup/','lehrer-login','320','240','center','front');" -->
