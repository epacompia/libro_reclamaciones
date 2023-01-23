<?php
require_once("../Logout/logout.php");
session_destroy();
header("Location:" . "http://localhost/libro_reclamaciones/" . "index.php");
exit();

?>