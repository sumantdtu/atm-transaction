<?php
session_start();
session_destroy();
header('location:login.php?logout=you are succesfully logout!!come back soon');

?>