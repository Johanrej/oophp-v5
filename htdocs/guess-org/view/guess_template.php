<h1>Guess number!</h1>

<p>Guess a number between 1 and 100. You have <?= $_SESSION['g_game']->tries() ?> tries left.</p>

<form method="post" action="post_process.php">
    <input type="text" name="guess">
    <input type="hidden" name="number" value="<?= $_SESSION['g_game']->number() ?>">
    <input type="hidden" name="tries" value="<?= $_SESSION['g_game']->tries() ?>">
    <input type="submit" name="makeGuess" value="Make guess">
    <input type="submit" name="doInit" value="Start over">
    <input type="submit" name="cheat" value="Cheat">
</form>

<?php if (isset($_SESSION['cheat'])) : ?>
    <p>CHEAT: The secret number is: <?= $_SESSION['g_game']->number() ?>!</p>
<?php endif; ?>

<?php if (isset($_SESSION['res'])) : ?>
    <p><?= $_SESSION['res'] ?></p>
<?php endif; ?>
