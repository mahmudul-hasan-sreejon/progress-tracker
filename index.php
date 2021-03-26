<?php    

require_once("resources/config.php");

require_once(TEMPLATES_PATH . "/header.php");

echo '<br>';

echo '<div class="container-fluid">
    <div class="row">';
        require_once(TEMPLATES_PATH . "/sideBar.php");

        require_once(TEMPLATES_PATH . "/chart1.php");

        require_once(TEMPLATES_PATH . "/chart2.php");
    echo '</div>
</div>';

require_once(TEMPLATES_PATH . "/footer.php");

?>
