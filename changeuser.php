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
$new_teamname = $_REQUEST["new_teamname"];
$newname= $_REQUEST["newname"];
$user = $_REQUEST["user"];
$class = $_REQUEST["class"];
$action = $_REQUEST["action"];

$password_hashed = password_hash($password, PASSWORD_BCRYPT); //hash password

##################### 2. MODE 'ADD': CREATE USER / CLASS #######################

## 2a Create user
$teacherid = -1;
if ($mode == "ADD"){
	$sql = $db->prepare("INSERT INTO `user` (`password`, `email`, `role`) VALUES (?, ?, ?)");
	
	$output = $sql->execute(array($password_hashed, $email, 1));
	$teacherid = $db->lastInsertId();

	if ($output == true) {
		
		flogb("<div>Herzlich Willkommen, $firstname $lastname!<br>Die Anmeldung war erfolgreich. Sie können sich nun in den Lehrkraft-Bereich einloggen.</div>");
		
	}
	else {
		flogerror("<div>Die Anmeldung ist fehlgeschlagen. Versuchen Sie es später erneut oder kontaktieren Sie das Weltfairsteher-Team.</div>");
		
	}

## 2b If teamname given, create class
	if ($teamname!= "" && $teacherid != -1) {
		$sql = $db->prepare("INSERT INTO `class` (`name`, `teacher`) VALUES (?, ?)");
	
		$output = $sql->execute(array($teamname, $teacherid));
		
		if ($output == true) {
			
			flogb("Das Team $teamname kann nun mit den Challenges beginnen.");
			
		}
		else {
			flogerror("<div>Fehler beim Erstellen des Teams.</div>");
			
		}
		
	}
	elseif ($teamname == "" && $teacherid != -1){
		flogb("Bitte denken Sie daran, im Lehrkraft-Bereich vor dem Bearbeiten von Challenges einen Teamnamen einzutragen.");
		
	}
	
	echo("<br><a href='login.php'>OK</a>");



}

##################### 2. MODE 'CHANGE': MODIFY USER / CLASS #######################
## 2a Modify class
if ($mode == "CHANGE"){
	if ($action == "Namen ändern") {
		
		if ($newname == "") {
			flogerror("<div>Bitte geben Sie einen gültigen Teamnamen ein.</div><br><a href='javascript:history.back()'>Zurück</a>");
			exit();
		}
		if ($class == "") {
			flogerror("<div>Sie müssen eine Klasse auswählen.</div><br><a href='javascript:history.back()'>Zurück</a>");
			exit();
		}
		
		$sql = $db->prepare("UPDATE `class` SET name = ? WHERE id = ?");
		
		$output = $sql->execute(array($newname, $class));
	
		if ($output == true) {
			//echo $class;
			flogb("<div>Name geändert.<br><a href='javascript:history.back()'>Zurück</a></div>");
			
		}
		else {
			flogerror("<div>Fehler beim Ändern des Namens.</div>");
			
		}
	
	}
	else { #Klick auf "Klase löschen"

## 2b remove class
		if ($class == "") {
			flogerror("<div>Sie müssen eine Klasse auswählen.</div><br><a href='javascript:history.back()'>Zurück</a>");
			exit();
		}
		
		$sql = $db->prepare("DELETE FROM `class` WHERE id = ?");
	
		$output = $sql->execute(array($class));
		
		if ($output == true) {
			
			flogb("Das Team wurde gelöscht.<br><a href='javascript:history.back()'>Zurück</a>");
			
		}
		else {
			flogerror("<div>Fehler beim Löschen des Teams.</div>");
			
		}
	}
}


##################### 2. MODE 'NEW': ADD CLASS  #######################
if ($mode == "NEW"){
	if ($new_teamname!= "") {
		$sql = $db->prepare("INSERT INTO `class` (`name`, `teacher`) VALUES (?, ?)");
	
		$output = $sql->execute(array($new_teamname, $user));
		
		if ($output == true) {
			
			flogb("Das Team $new_teamname kann nun mit den Challenges beginnen.<br><a href='javascript:history.back()'>Zurück</a>");
			
		}
		else {
			flogerror("<div>Fehler beim Erstellen des Teams.</div>");
			
		}
		
	}
	else{
		flogerror("Bitte geben Sie einen gültigen Teamnamen ein. <div style='text-align: center'><br><a href='javascript:history.back()'>Zurück</a></div>");
		
	}
}
?>

</div>
<?php
include "include/footer.php";
?>
