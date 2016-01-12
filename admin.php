<?php
include "include/access.php";

check_access(ADMIN);
include "include/header.php";
?>
<br>
<h3> ADMIN </h3>
<a href="register.php">Benutzer registrieren</a>
<form action="logout.php" method="get">
    <input type="submit" value="Logout" style="background-color: #52150D; font-size: 11px;">
</form>
<?php
include "include/footer.php";
?>
