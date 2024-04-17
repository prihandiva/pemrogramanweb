<?php
session_start();

// Periksa apakah token CSRF sudah dibuat sebelumnya
if(empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>