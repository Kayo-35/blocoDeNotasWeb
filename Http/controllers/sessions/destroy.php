<?php
use Base\Authenticator;
$auth = new Authenticator();
$auth->logout();
redirect("/");
?>
