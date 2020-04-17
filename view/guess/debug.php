<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());



?>
<hr>
<pre>
    SESSION
    <?= print_r($_SESSION) ?>
    POST
    <?= print_r($_POST) ?>
    GET
    <?= print_r($_GET) ?>
</pre>
<hr>
