<?php
include "include/header.php";
?>
<div class="login" style="width: auto;
                          margin-left: 25%;
                          margin-right: 25%;
                          margin-top: 0px;
                          height: 125px;
                          background-color: #6EDB95;">
    <form id="forgotPassword" action="javascript:void(0);" onsubmit="sendForm(this)">
        <p><input type="text" name="email" style="width: 100%; text-align: center; margin-top: 5px;" value="" placeholder="E-Mail-Adresse"></p>
        <p class="submit" style="width: 26%; margin-bottom: 5px; margin-left: 37%; margin-right: 37%; text-align: center;">
            <input type="submit" name="commit" value="Passwort vergessen"></p>
    </form>
</div>
<?php
include "include/footer.php";
?>
