<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Init the game and redirect to play the game.
 */
$app->router->get("guess/init", function () use ($app) {

    $_SESSION['g_game'] = null;
    $_SESSION['cheat'] = null;
    $_SESSION['res'] = null;

    return $app->response->redirect("guess/play");
});



/**
 * Play the game.
 */
$app->router->get("guess/play", function () use ($app) {
    $title = "Play the game";

    if (!isset($_SESSION['g_game'])) {
        $_SESSION['g_game'] = new Jorj\Guess\Guess();
    }

    $app->page->add("guess/play");
    // $app->page->add("guess/debug");

    return $app->page->render([
        "title" => $title,
    ]);
});


/**
 * Post route for the game.
 */
$app->router->post("guess/play", function () use ($app) {
    $title = "Play the game";

    $g_number = $_POST['makeGuess'] ?? null;
    $_SESSION['cheat'] = $_POST['cheat'] ?? null;
    $n_guess = $_POST['guess'] ?? null;
    $d_init = $_POST['doInit'] ?? null;
    $g_tries = $_POST['tries'] ?? null;

    if (isset($d_init)) {
        $_SESSION['res'] = "";
        $_SESSION['g_game'] = new Jorj\Guess\Guess();
    }

    if (isset($g_number)) {
        try {
            $_SESSION['res'] = $_SESSION['g_game']->makeGuess(intval($n_guess));
        } catch (Jorj\Guess\GuessException $e) {
            $_SESSION['res'] = "You lost a try. You have to choose a number between 1 and 100.";
        }
    }

    return $app->response->redirect("guess/play");
});
