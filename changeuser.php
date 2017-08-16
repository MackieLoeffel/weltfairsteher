<?php
include "include/header.php"; ?>

<div style="text-align:center">
<?php

ob_implicit_flush(true);
ob_end_flush();

function flog($msg) {
	echo $msg."<br>";
	ob_flush();
	flush();
}

function flogb($msg) {
	echo "<b>".$msg."</b><br>";
	ob_flush();
	flush();
}
function flogerror($msg) {
	echo "<font color='red'><b>".$msg."</b></font>"."<br>";
	ob_flush();
	flush();
}


//Create unique jobid
$jobid = date('Ymd-H-i-s');
$failed = false;

##################### 1. FETCH VALIDATED FORM INPUT ##############################
//flog("Reading fields...");

$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$password_r = $_REQUEST["pasword_r"];
$firstname = $_REQUEST["realname_1"];
$lastname = $_REQUEST["realname_2"];
$schoolname = $_REQUEST["schoolname"];
$scholadress = $_REQUEST["schooladress"];
$studentstotal = $_REQUEST["studentstotal"];
$studentsyear = $_REQUEST["studentsyear"];
$mode = $_REQUEST["mode"];
$teamname = $_REQUEST["teamname"];

$password_hashed = password_hash($password, PASSWORD_BCRYPT); //hash password

##################### 2. MODE 'ADD': CREATE USER #######################

## 2a Create user

if ($mode == "ADD"){
	$sql = $db->prepare("INSERT INTO `user` (`password`, `email`, `role`) VALUES (?, ?, ?)");
	
	$output = $sql->execute(array($password_hashed, $email, 1));
	
	if ($output == true) {
		
		flogb("<div>Herzlich Willkommen, $firstname $lastname!<br>Die Anmeldung war erfolgreich. Sie können sich nun in den Lehrkraft-Bereich einloggen.</div>");
		
	}
	else {
		flogerror("<div>Die Anmeldung ist fehlgeschlagen. Versuchen Sie es später erneut oder kontaktieren Sie das Weltfairsteher-Team.</div>");
		
	}

## 2b If teamname given, create class
	if ($teammate != "") {
		$sql = $db->prepare("INSERT INTO `user` (`password`, `email`, `role`) VALUES (?, ?, ?)");
	
		$output = $sql->execute(array($password_hashed, $email, 1));
		
		if ($output == true) {
			
			flogb("<div>Herzlich Willkommen, $firstname $lastname!<br>Die Anmeldung war erfolgreich. Sie können sich nun in den Lehrkraft-Bereich einloggen.</div>");
			
		}
		else {
			flogerror("<div>Die Anmeldung ist fehlgeschlagen. Versuchen Sie es später erneut oder kontaktieren Sie das Weltfairsteher-Team.</div>");
			
		}
		
	}



}

?>

</div>
<?php
include "include/footer.php";
?>
