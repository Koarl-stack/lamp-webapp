<?php
session_start();
unset($_SESSION["user-sess"]);
session_destroy();
header('Location: index.html');
?>