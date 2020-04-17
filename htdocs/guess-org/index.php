<?php
/**
*   Guess number module. POST method
*/
require __DIR__ . "/autoload.php";
require __DIR__ . "/config.php";

if (!isset($_SESSION['g_game'])) {
    $_SESSION['g_game'] = new Guess();
}

// Render page
require __DIR__ . "/view/guess_template.php";
require __DIR__ . "/view/debug_session.php";
