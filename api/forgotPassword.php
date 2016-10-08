<?php
include __DIR__."/include.php";

list($email) = apiCheckParams("email");
$email = trim($email);

apiCheck(filter_var($email, FILTER_VALIDATE_EMAIL), "Bitte eine gültige Email angeben.");

apiAction(function() use($email) {
    // don't leak information over registered emails
    $user = fetch("SELECT id FROM user WHERE email = :email", ["email" => $email]);
    if($user !== false) {
        // from http://stackoverflow.com/a/17649993
        $rand = bin2hex(openssl_random_pseudo_bytes(16));
        dbExecute("INSERT INTO forgot (id, user, created_at) VALUES (:rand, :user, NOW())",
                  ["user" => $user->id, "rand" => $rand]);

        own_mail($email, "Passwort vergessen", "Hallo,\r\num dein Passwort zurückzusetzen gehe bitte auf diesen Link: https://www.weltfairsteher.de/resetPassword.php?forgotid=$rand\r\nViele Grüße\r\nDein Weltfairsteher Team");
    }
});
?>
