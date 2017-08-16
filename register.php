<?php
include "include/header.php"; ?>

<style>


.appnitro li
{
	width:61%;
}

form ul
{
	font-size:100%;
	list-style-type:none;
	margin:0;
	padding:0;
	width:100%;
}

form li
{
	display:block;
	margin:0;
	padding:4px 5px 2px 9px;
	position:relative;
}

form li:after
{
	clear:both;
	content:".";
	display:block;
	height:0;
	visibility:hidden;
}

.buttons:after
{
	clear:both;
	content:".";
	display:block;
	height:0;
	visibility:hidden;
}

.buttons
{
	clear:both;
	display:block;
	margin-top:10px;
}

* html form li
{
	height:1%;
}

* html .buttons
{
	height:1%;
}

* html form li div
{
	display:inline-block;
}

form li div
{
	color:#444;
	margin:0 4px 0 0;
	padding:0 0 8px;
}

form li span
{
	color:#444;
	float:left;
	margin:0 4px 0 0;
	padding:0 0 8px;
}

form li div.left
{
	display:inline;
	float:left;
	width:48%;
}

form li div.right
{
	display:inline;
	float:right;
	width:48%;
}

form li div.left .medium
{
	width:100%;
}

form li div.right .medium
{
	width:100%;
}

.clear
{
	clear:both;
}

form li div label
{
	clear:both;
	color:#444;
	display:block;
	font-size:9px;
	line-height:9px;
	margin:0;
	padding-top:3px;
}

form li span label
{
	clear:both;
	color:#444;
	display:block;
	font-size:9px;
	line-height:9px;
	margin:0;
	padding-top:3px;
}

form li .datepicker
{
	cursor:pointer !important;
	float:left;
	height:16px;
	margin:.1em 5px 0 0;
	padding:0;
	width:16px;
}

.form_description
{
	border-bottom:1px dotted #ccc;
	clear:both;
	display:inline-block;
	margin:0 0 1em;
}

.form_description[class]
{
	display:block;
}

.form_description h2
{
	clear:left;
	font-size:160%;
	font-weight:400;
	margin:0 0 3px;
}

.form_description p
{
	font-size:95%;
	line-height:130%;
	margin:0 0 12px;
}

form hr
{
	display:none;
}

form li.section_break
{
	border-top:1px dotted #ccc;
	margin-top:9px;
	padding-bottom:0;
	padding-left:9px;
	padding-top:13px;
	width:97% !important;
}

form ul li.first
{
	border-top:none !important;
	margin-top:0 !important;
	padding-top:0 !important;
}

form .section_break h3
{
	font-size:110%;
	font-weight:400;
	line-height:130%;
	margin:0 0 2px;
}

form .section_break p
{
	font-size:85%;

	margin:0 0 10px;
}

/**** Buttons ****/
input.button_text
{
	overflow:visible;
	padding:0 7px;
	width:auto;
}

.buttons input
{
	font-size:120%;
	margin-right:5px;
}

/**** Inputs and Labels ****/
label.description
{
	border:none;
	color:#222;
	display:block;
	font-size:95%;
	font-weight:700;
	line-height:150%;
	padding:0 0 1px;
}

span.symbol
{
	font-size:115%;
	line-height:130%;
}

input.text
{
	#background:#fff url(../../../images/shadow.gif) repeat-x top;
	border-bottom:1px solid #ddd;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-top:1px solid #7c7c7c;
	color:#333;
	font-size:100%;
	margin:0;
	padding:2px 0;
}

input.file
{
	color:#333;
	font-size:100%;
	margin:0;
	padding:2px 0;
}

textarea.textarea
{
	#background:#fff url(../../../images/shadow.gif) repeat-x top;
	border-bottom:1px solid #ddd;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-top:1px solid #7c7c7c;
	color:#333;
	#font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
	font-size:100%;
	margin:0;
	width:99%;
}

select.select
{
	color:#333;
	font-size:100%;
	margin:1px 0;
	padding:1px 0 0;
	#background:#fff url(../../../images/shadow.gif) repeat-x top;
	border-bottom:1px solid #ddd;
	border-left:1px solid #c3c3c3;
	border-right:1px solid #c3c3c3;
	border-top:1px solid #7c7c7c;
}


input.currency
{
	text-align:right;
}

input.checkbox
{
	display:block;
	height:13px;
	line-height:1.4em;
	margin:6px 0 0 3px;
	width:13px;
}

input.radio
{
	display:block;
	height:13px;
	line-height:1.4em;
	margin:6px 0 0 3px;
	width:13px;
}

label.choice
{
	color:#444;
	display:block;
	font-size:100%;
	line-height:1.4em;
	margin:-1.55em 0 0 25px;
	padding:4px 0 5px;
	width:90%;
}

select.select[class]
{
	margin:0;
	padding:1px 0;
}

*:first-child+html select.select[class]
{
	margin:1px 0;
}

.safari select.select
{
	font-size:120% !important;
	margin-bottom:1px;
}

input.small
{
	width:25%;
}

select.small
{
	width:25%;
}

input.medium
{
	width:50%;
}

select.medium
{
	width:50%;
}

input.large
{
	width:99%;
}

select.large
{
	width:100%;
}

textarea.small
{
	height:5.5em;
}

textarea.medium
{
	height:10em;
}

textarea.large
{
	height:20em;
}

/**** Errors ****/
#error_message
{
	background:#fff;
	border:1px dotted red;
	margin-bottom:1em;
	padding-left:0;
	padding-right:0;
	padding-top:4px;
	text-align:center;
	width:99%;
}

#error_message_title
{
	color:#DF0000;
	font-size:125%;
	margin:7px 0 5px;
	padding:0;
}

#error_message_desc
{
	color:#000;
	font-size:100%;
	margin:0 0 .8em;
}

#error_message_desc strong
{
	background-color:#FFDFDF;
	color:red;
	padding:2px 3px;
}

form li.error
{
	background-color:#FFDFDF !important;
	border-bottom:1px solid #EACBCC;
	border-right:1px solid #EACBCC;
	margin:3px 0;
}

form li.error label
{
	color:#DF0000 !important;
}

form p.error
{
	clear:both;
	color:red;
	font-size:10px;
	font-weight:700;
	margin:0 0 5px;
}

form .required
{
	color:red;
	float:none;
	font-weight:700;
}

/**** Guidelines and Error Highlight ****/
form li.highlighted
{
	background-color:#fff7c0;
}

form .guidelines
{
	background:#f5f5f5;
	border:1px solid #e6e6e6;
	color:#444;
	font-size:80%;
	left:100%;
	line-height:130%;
	margin:0 0 0 8px;
	padding:8px 10px 9px;
	position:absolute;
	top:0;
	visibility:hidden;
	width:42%;
	z-index:1000;
}

form .guidelines small
{
	font-size:105%;
}

form li.highlighted .guidelines
{
	visibility:visible;
}

form li:hover .guidelines
{
	visibility:visible;
}

.no_guidelines .guidelines
{
	display:none !important;
}

.no_guidelines form li
{
	width:97%;
}

.no_guidelines li.section
{
	padding-left:9px;
}

/*** Success Message ****/
.form_success 
{
	clear: both;
	margin: 0;
	padding: 90px 0pt 100px;
	text-align: center
}

.form_success h2 {
    clear:left;
    font-size:160%;
    font-weight:normal;
    margin:0pt 0pt 3px;
}

/*** Password ****/
ul.password{
    margin-top:60px;
    margin-bottom: 60px;
    text-align: center;
}
.password h2{
    color:#DF0000;
    font-weight:bold;
    margin:0pt auto 10px;
}

.password input.text {
   font-size:170% !important;
   width:380px;
   text-align: center;
}
.password label{
   display:block;
   font-size:120% !important;
   padding-top:10px;
   font-weight:bold;
}

#li_captcha{
   padding-left: 5px;
}


#li_captcha span{
	float:none;
}

/** Embedded Form **/

.embed #form_container{
	border: none;
}

.embed #top, .embed #bottom, .embed h1{
	display: none;
}

.embed #form_container{
	width: 100%;
}

.embed #footer{
	text-align: left;
	padding-left: 10px;
	width: 99%;
}

.embed #footer.success{
	text-align: center;
}

.embed form.appnitro
{
	margin:0px 0px 0;
	
}



/*** Calendar **********************/
div.calendar { position: relative; }

.calendar table {
cursor:pointer;
border:1px solid #ccc;
font-size: 11px;
color: #000;
background: #fff;
#font-family:"Lucida Grande", Tahoma, Arial, Verdana, sans-serif;
}

.calendar .button { 
text-align: center;    
padding: 2px;          
}

.calendar .nav {
background:#f5f5f5;
}

.calendar thead .title { 
font-weight: bold;      
text-align: center;
background: #dedede;
color: #000;
padding: 2px 0 3px 0;
}

.calendar thead .headrow { 
background: #f5f5f5;
color: #444;
font-weight:bold;
}

.calendar thead .daynames { 
background: #fff;
color:#333;
font-weight:bold;
}

.calendar thead .name { 
border-bottom: 1px dotted #ccc;
padding: 2px;
text-align: center;
color: #000;
}

.calendar thead .weekend { 
color: #666;
}

.calendar thead .hilite { 
background-color: #444;
color: #fff;
padding: 1px;
}

.calendar thead .active { 
background-color: #d12f19;
color:#fff;
padding: 2px 0px 0px 2px;
}


.calendar tbody .day { 
width:1.8em;
color: #222;
text-align: right;
padding: 2px 2px 2px 2px;
}
.calendar tbody .day.othermonth {
font-size: 80%;
color: #bbb;
}
.calendar tbody .day.othermonth.oweekend {
color: #fbb;
}

.calendar table .wn {
padding: 2px 2px 2px 2px;
border-right: 1px solid #000;
background: #666;
}

.calendar tbody .rowhilite td {
background: #FFF1AF;
}

.calendar tbody .rowhilite td.wn {
background: #FFF1AF;
}

.calendar tbody td.hilite { 
padding: 1px 1px 1px 1px;
background:#444 !important;
color:#fff !important;
}

.calendar tbody td.active { 
color:#fff;
background: #529214 !important;
padding: 2px 2px 0px 2px;
}

.calendar tbody td.selected { 
font-weight: bold;
border: 1px solid #888;
padding: 1px 1px 1px 1px;
background: #f5f5f5 !important;
color: #222 !important;
}

.calendar tbody td.weekend { 
color: #666;
}

.calendar tbody td.today { 
font-weight: bold;
color: #529214;
background:#D9EFC2;
}

.calendar tbody .disabled { color: #999; }

.calendar tbody .emptycell { 
visibility: hidden;
}

.calendar tbody .emptyrow { 
display: none;
}

.calendar tfoot .footrow { 
text-align: center;
background: #556;
color: #fff;
}

.calendar tfoot .ttip { 
background: #222;
color: #fff;
font-size:10px;
border-top: 1px solid #dedede;
padding: 3px;
}

.calendar tfoot .hilite { 
background: #aaf;
border: 1px solid #04f;
color: #000;
padding: 1px;
}

.calendar tfoot .active { 
background: #77c;
padding: 2px 0px 0px 2px;
}

.calendar .combo {
position: absolute;
display: none;
top: 0px;
left: 0px;
width: 4em;
border: 1px solid #ccc;
background: #f5f5f5;
color: #222;
font-size: 90%;
z-index: 100;
}

.calendar .combo .label,
.calendar .combo .label-IEfix {
text-align: center;
padding: 1px;
}

.calendar .combo .label-IEfix {
width: 4em;
}

.calendar .combo .hilite {
background: #444;
color:#fff;
}

.calendar .combo .active {
border-top: 1px solid #999;
border-bottom: 1px solid #999;
background: #dedede;
font-weight: bold;
}


</style>
 <section  class="sectionbg" style="background-color: #F2F2DA;"> 
	 
	 
<div id="form_container">
	
		<form id="register" onsubmit="return validateForm();" method="post" action="changeuser.php">
					<div class="form_description">
			<h2>Mitmachen</h2>
			<p>Bitte teilen Sie uns folgende Informationen mit. Die mit * gekennzeichneten Felder sind Pflichtangaben. Alle anderen Informationen können zu einem späteren Zeitpunkt nachgeliefert werden.</p>
			<b><div id="errmsg0" style="color:red;margin:10px"></div></b>
		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="email">Email* </label>
		<div>
			<input id="email" name="email" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_1"><small>Ihre Email-Adresse zur Korrespondenz und zur Anmeldung im Lehrkraft-Bereich.</small></p> 
		</li>		<li id="li_2" >
		<label class="description" for="password">Passwort* </label>
		<div>
			<input id="password" name="password" class="element text medium" type="password" maxlength="255" value=""/> 
		</div><p class="guidelines" id="guide_2"><small>Wählen Sie ein Passwort.</small></p> 
		</li>		<li id="li_4" >
		<label class="description" for="password_r">Passwort wiederholen* </label>
		<div>
			<input id="password_r" name="password_r" class="element text medium" type="password" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_3" >
		<label class="description" for="realname">Name* </label>
		<span>
			<input id="realname_1" name= "realname_1" class="element text" maxlength="255" size="8" value=""/>
			<label>Vorname</label>
		</span>
		<span>
			<input id="realname_2" name= "realname_2" class="element text" maxlength="255" size="14" value=""/>
			<label>Nachname</label>
		</span> 
		</li>		<li id="li_5" >
		<label class="description" for="schoolname">Name der Schule* </label>
		<div>
			<input id="schoolname" name="schoolname" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_6" >
		<label class="description" for="schooladress">Adresse der Schule* </label>
		<div>
			<textarea id="schooladress" name="schooladress" class="element textarea small"></textarea> 
		</div> 
		</li>		<li id="li_7" >
		<label class="description" for="studentstotal">Anzahl der Schüler </label>
		<div>
			<input id="studentstotal" name="studentstotal" class="element text small" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_8" >
		<label class="description" for="studentsyear">Jahrgangsstufe </label>
		<div>
		<select class="element select small" id="studentsyear" name="studentsyear"> 
			<option value="" selected="selected"></option>
<option value="1" >5</option>
<option value="2" >6</option>
<option value="3" >7</option>
<option value="4" >8</option>
<option value="5" >9</option>
<option value="6" >10</option>
<option value="7" >11</option>
<option value="8" >12</option>
<option value="9" >13</option>
<option value="10" >übergreifend</option>

		</select>
		</div> 
		</li>
		
	<li id="li_x" >
		<label class="description" for="teamname">Teamname </label>
		<div>
			<input id="teamname" name="teamname" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="mode" id="mode" value="ADD" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Abschicken" />
		</li>
			</ul>
			<b><div id="errmsg" style="color:red;margin:10px"></div></b>
		</form>	
	</div>

</section>
<br>
<br>
<br>


<?php
include "include/footer.php";
?>


	<script>
		

function isNumber(n) { return /^-?[\d.]+(?:e-?\d+)?$/.test(n); } 


function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password_r = document.getElementById("password_r").value;
    var firstname = document.getElementById("realname_1").value;
    var lastname = document.getElementById("realname_2").value;
    var schoolname = document.getElementById("schoolname").value;
    var schooladress = document.getElementById("schooladress").value;
    var studentstotal = document.getElementById("studentstotal").value;
    var studentsyear = document.getElementById("studentsyear").value;
    var teamname = document.getElementById("teamname").value;
    validRegEx = /^[^\\\/&]*$/;
    var errormsg = "";
    var good = true;
    if (!((email.match(validRegEx) == email) && (email))) {
        errormsg += "Bitte geben Sie eine Email-Adresse an.<br>";
        good = false;
    }
    if (!(password)) {
        errormsg += "Bitte wählen Sie ein Passwort.<br>";
        good = false;
    }
    if (!(password_r)) {
        errormsg += "Bitte wiederholen Sie Ihr Passwort.<br>";
        good = false;
    }
    if (!(password_r == password)) {
        errormsg += "Die Passwörter stimmen nicht überein.<br>";
        good = false;
    }
    if (!(firstname)) {
        errormsg += "Bitte geben Sie einen Vornamen an.<br>";
        good = false;
    }
    if (!(lastname)) {
        errormsg += "Bitte geben Sie einen Nachnamen an.<br>";
        good = false;
    }
    if (!(schoolname)) {
        errormsg += "Bitte geben Sie den Namen Ihrer Schule an.<br>";
        good = false;
    }
    if (!(schooladress)) {
        errormsg += "Bitte geben Sie die Adresse Ihrer Schule an.<br>";
        good = false;
    }
    
    document.getElementById("errmsg").innerHTML = errormsg;
    document.getElementById("errmsg0").innerHTML = "Mindestens eine Eingabe ist noch unvollständig oder ungültig.";
    
    return good;
}
	
	
	</script>
