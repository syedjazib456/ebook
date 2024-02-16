<?php

include 'config.php';
session_start();

session_unset();

session_destroy();

echo "<script>window.location.href = 'http://localhost:82/ebook/ebookopolis/login.php'</script>";

?>