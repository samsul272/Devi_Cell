<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', '', time() - 604800);
setcookie('key', '', time() - 604800);

header("Location: login.php");
exit;
