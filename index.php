<?php    

require_once("resources/config.php");

$currentPage = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1, -4);

require_once(TEMPLATES_PATH . "/header.php");

echo '<br>';

echo '
    <div class="container-fluid">
        <div class="row">
';

require_once(TEMPLATES_PATH . "/sideBar.php");

require_once(TEMPLATES_PATH . "/chart1.php");

require_once(TEMPLATES_PATH . "/chart2.php");

echo '
        </div>
    </div>
';

require_once(TEMPLATES_PATH . "/footer.php");

?>
