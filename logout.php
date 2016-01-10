<?php
include "include/header.php";

session_unset();

?>
<b>logged out, redirection in 5 seconds... </b>
<script type="text/javascript">
 setTimeout(function() {window.location = "index.php"}, 5*1000);
</script>
<?php
include "include/footer.php";
?>
