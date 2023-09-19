<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "imobiliare"; 

// Creeaza conexiunea
$conn = new mysqli($servername, $username, $password, $dbname);

$inboxPageURL = 'http://localhost/licenta/inbox.php';

// Verifica conexiunea
if ($conn->connect_error) {
    die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
}
?>
