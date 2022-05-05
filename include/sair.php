<?php

session_start();
session_destroy();

// redirecionar para area administrativa
header("Location: ../index.php");

?>