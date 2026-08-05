<?php
/**
 * Encerra a sessão (login e cadastro).
 */
session_start();
session_unset();
session_destroy();

header("Location: login.php");
exit;
