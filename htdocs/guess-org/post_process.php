<?php
/**
 * A processing page that does a redirect.
 */
require __DIR__ . "/autoload.php";
require __DIR__ . "/config.php";

$g_number = $_POST['makeGuess'] ?? null;
$_SESSION['cheat'] = $_POST['cheat'] ?? null;
$n_guess = $_POST['guess'] ?? null;
$d_init = $_POST['doInit'] ?? null;
$g_tries = $_POST['tries'] ?? null;


if (isset($d_init)) {
    $_SESSION['res'] = "";
    $_SESSION['g_game'] = new Guess();
}


if (isset($g_number)) {
    try {
        $_SESSION['res'] = $_SESSION['g_game']->makeGuess(intval($n_guess));
    } catch (GuessException $e) {
        $_SESSION['res'] = "You lost a try. You have to choose a number between 1 and 100.";
    }
}


// Redirect to a result page.
$url = "index.php";
header("Location: $url");
