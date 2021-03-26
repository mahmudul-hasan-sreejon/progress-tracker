<?php    

require_once("resources/config.php");

$currentPage = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1, -4);

require_once(TEMPLATES_PATH . "/header.php");

echo '<br>';

echo '
    <div class="container-fluid">
        <div class="table-responsive-sm text-center">
';

require_once(TEMPLATES_PATH . "/grid.php");

echo '
        </div>
    </div>
';

require_once(TEMPLATES_PATH . "/footer.php");

?>
