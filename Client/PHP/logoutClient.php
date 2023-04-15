<?php
session_start();
session_unset();
session_destroy();
header("Location: InterfaceClient.php");
exit();
?>
