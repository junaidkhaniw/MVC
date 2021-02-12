<?php
error_reporting(0);

class Framework {

    public function view($viewName, $data = []) {

        if (file_exists("../app/Views/" . $viewName . ".php")) {
            require_once "../app/Views/$viewName.php";
        }
        else {
            echo "<div style='text-align: center; width: 170px; margin: 0 auto;; padding: 10px; background: #1000ff; color: white;'>
            Sorry <strong>'.$viewName.'.php</strong> not found
            </div>";
        }

    }

    public function model($modelName) {

        if (file_exists("../app/Models/" . $modelName . ".php")) {
            require_once "../app/Models/$modelName.php";

            return new $modelName;
        }
        else {
            echo "<div style='text-align: center; width: 170px; margin: 0 auto;; padding: 10px; background: #1000ff; color: white;'>
            Sorry <strong>'.$modelName.'.php</strong> not found
            </div>";
        }
        
    }

    public function input($inputName) {
        return trim(strip_tags($_REQUEST[$inputName]));
        

    }

    // All our public files accessable here from helpers folder
    public function helper($helperName) {
        
        if (file_exists("../system/helpers/" . $helperName . ".php")) {
            require_once "../system/helpers/$helperName.php";
        }
        else {
            echo "<div style='text-align: center; width: 170px; margin: 0 auto;; padding: 10px; background: #1000ff; color: white;'>
            Sorry <strong>'.$helperName.'.php</strong> not found
            </div>";
        }

    }

    ////////////////////////////
    ///////Sessions Start///////
    ////////////////////////////
    
    public function setSession($sessionName, $sessionValue) {
        if (!empty($sessionName) && !empty($sessionValue)) {
            $_SESSION[$sessionName] = $sessionValue;
        }

    }

    public function getSession($sessionName) {
        if (!empty($sessionName)) {
            return $_SESSION[$sessionName];
        }

    }

    public function unsetSession($sessionName) {
        if (!empty($sessionName)) {
            unset($_SESSION[$sessionName]);
        }

    }

    public function destroySession() {
        session_destroy();
    }

    public function setFlash($sessionName, $msg) {
        if (!empty($sessionName) && !empty($msg)) {
            $_SESSION[$sessionName] = $msg;
        }
    }

    public function flash($sessionName, $className) {
        if (!empty($sessionName) && !empty($className) && isset($_SESSION[$sessionName])) {
            $msg = $_SESSION[$sessionName];
            echo "<div class='". $className ."'>". $msg ."</div>'";
            unset($_SESSION[$sessionName]);
        }
    }

    //////////////////////////
    ///////Sessions End///////
    //////////////////////////

    public function redirect($path) {
        header("Location:" . URLROOT . "/" . $path);
    }

}

?>