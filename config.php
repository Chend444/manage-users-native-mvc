<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gigsberg');

// Autoload classes
spl_autoload_register(function ($className) {
    include_once 'models/' . $className . '.php';
});
?>
