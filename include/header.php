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
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>WeltFAIRsteher</title>

                <meta name="description" content="WeltFAIRsteher"/>
                <link rel="canonical" href="http://link"/>
<link href="bootstraps/css/bootstrap.min.css" rel="stylesheet">
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



                <link rel="stylesheet" href="libs/font-awesome/css/font-awesome.min.css">
                <link rel='stylesheet' href='styles.css' type='text/css' />
              <script src="libs/lodash.js"></script>
              <script src="libs/jquery.js"></script>
                <script src="js/general.js"></script>
                <script src="js/api.js"></script>
                <!--[if lt IE 9]>

                     <![endif]-->

<link href='https://fonts.googleapis.com/css?family=Raleway|Roboto+Slab|PT+Sans+Narrow|Titillium+Web|Lobster|Patua+One|Bitter|Pathway+Gothic+One|Lobster+Two|Poiret+One|Amaranth|Passion+One|Open+Sans+Condensed' rel='stylesheet' type='text/css'>


                <script pagespeed_orig_type="text/javascript" type="text/psajs" orig_index="1">
                function w3tc_popupadmin_bar(url){return window.open(url,'','width=800,height=600,status=no,toolbar=no,menubar=no,scrollbars=yes');}
                </script>

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


<div class="container" style="margin-bottom: 110px; min-width: 100%;">


<div class="navbar navbar-default" role="navigation"
style="height: 32px; margin-top: -5px; background-color: #1F211F; margin-left: -4%;
border-color: green; font-color: white; position: fixed; z-index: 999; margin-bottom: 30px; min-width: 104%;">

<div class="navbar-header nav-img-logo" style="color: white;">

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="height: 37px; margin-right: 10%;">
<span class="sr-only">Menü</></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>


<span class="navbar-brand">
<a href="index.php">
    <img src="Logo_BGtransparent.png" alt="Weltfairsteher" title="Weltfairsteher" class="nav-img-logo">
  </a>

</span>



</div>


  <div class="navbar-collapse collapse" style="color: white; background-color: #1F211F; margin-right: 17%; width: 100%; ">


                                  <ul class="nav navbar-nav text-nav-head" style="font-color: white; background-color: #1F211F;">


                                     <?php
                                     $sites = ["Tabelle" => "table.php",
                                               "Challenges" => "challenges.php",
                                               "Leckerwissen" => 'leckerwissen.php',
                                               'Lehrkraft-Bereich' => "teacher.php"];
                                     if(isAdmin()) {
                                         $sites["Admin"] = "admin.php";
                                     }
                                     if(isLoggedIn()) {
                                         $sites["Logout"] = "logout.php";
                                     }
                                     foreach ($sites as $site => $link) {
                                     ?>

                                         <li
                                             style="font-size: 13pt; margin-top: 13px; margin-left: 4px; text-transform: uppercase;
                                                    font-family: Pathway Gothic One;">
                                             <span><a href="<?=$link?>" class="indexlink" style="color: white;"><span data-title="<?=$site?>"><b><?=$site?></b></span></a></span></li>
                                     <?php } ?>

                                     <?php if(in_array(basename($_SERVER['PHP_SELF']), [
                                         "table.php", "challenges.php"])) {?>
                                     <li style="margin-top: 15px; margin-left: 15px; color: grey; font-size: 10pt;">
                                         <form method="POST">
                                             <select id="class-select" name="klasse" size="1">
                                                 <option value="default">Klasse wählen</option>
                                                 <?php
                                                 $classStmt = $db->prepare("SELECT id, name FROM class");
                                                 $classStmt->execute();
                                                 foreach($classStmt->fetchAll(PDO::FETCH_OBJ) as $row) {
                                                 ?>
                                                     <option value="<?= e($row->id) ?>"><?= e($row->name) ?></option>
                                                 <?php } ?>
                                             </select>
                                         </form></li>
                                   <?php } ?>

                                    </ul>

                          </div>
                          </div>
                          </div>
                          </div>

                          <script>
                           $(document).ready(function() {
                          		var offset = 220;
                          		var duration = 500;
                          		$(window).scroll(function() {
                          			if ($(this).scrollTop() > offset) {
                          				$('.scrollbutton-top').fadeIn(duration);
                          			} else {
                          				$('.scrollbutton-top').fadeOut(duration);
                          			}
                          		});

                          		$('.scrollbutton-top').click(function(event) {
                          			event.preventDefault();
                          			$('html, body').animate({scrollTop: 0}, duration);
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

            <body style="background-color: #C5F2B6; font-family: Roboto Slab; display:flex; min-height:100vh; flex-direction:column">
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstraps/js/bootstrap.min.js"></script>
    <section id="border" class="sectionbg">
<br>
<br>
<br>

                  <!-- onLoad="popup('http://nachhaltigkeitschallenge.de/lehrer-login/popup/','lehrer-login','320','240','center','front');" -->
