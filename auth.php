<?php
// Verificare sesiune
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';

// Verifica daca utilizatorul este autentificat
function isLoggedin() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

if (!function_exists('getUserId')) {
    // Obtine ID-ul utilizatorului autentificat
    function getUserId() {
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        }
        return null;
    }
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}
?>