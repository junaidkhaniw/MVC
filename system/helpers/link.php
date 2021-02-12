<?php 

function linkCSS($cssPath) {
    
    $url = URLROOT . "/" . $cssPath;
    echo '<link rel="stylesheet" href="' .$url. '">';

}

function linkJS($jsPath) {
    
    $url = URLROOT . "/" . $jsPath;
    echo '<script src="' .$url. '"></script>';

}

?>