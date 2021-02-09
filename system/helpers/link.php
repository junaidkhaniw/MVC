<?php 

function linkCSS($cssPath) {
    
    $url = URLROOT . "/" . $cssPath;
    echo '<link rel="stylesheet" href="' .$url. '">';

}

?>