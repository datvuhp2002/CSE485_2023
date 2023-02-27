<?php 
declare(strict_types = 1);                                          // Use strict types
require '../backEnd/includes/database-connection.php';              // Create PDO object
require '../backEnd/includes/functions.php'; 

if (session_id() === '') {
    session_start();
}

