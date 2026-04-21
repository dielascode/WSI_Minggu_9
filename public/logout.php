<?php
require_once '../class/session.php';

$session = new session();
$session->destroy();

header("Location: login.php");
exit;
?>