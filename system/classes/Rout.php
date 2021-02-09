<?php

class Rout {

    public $defaultController  = "userController";
    public $defaultMethod      = "index";
    public $params             = [];

     public function __construct()
     {
         $url = $this->url();
         if (!empty($url)) {
             if (file_exists("../app/Controllers/" . $url[0] . ".php")) {
                 $this->defaultController = $url[0];
                 unset($url[0]);
             }
             else {
                 echo "<div style='text-align: center; width: 170px; margin: 0 auto;; padding: 10px; background: #1000ff; color: white;'>
                 Sorry <strong>'.$url[0].'.php</strong> not found
                 </div>";
             }
         }

         require_once "../app/Controllers/" . $this->defaultController . ".php";
         $this->defaultController = new $this->defaultController;

         if (isset($url[1]) && !empty($url[1])) {
             if (method_exists($this->defaultController, $url[1])) {
                 $this->defaultMethod = $url[1];
                 unset($url[1]);
             }
             else {
                echo "<div style='text-align: center; width: 170px; margin: 0 auto;; padding: 10px; background: #1000ff; color: white;'>
                Sorry <strong>'.$url[1].'.php</strong> not found
                </div>";
            }
         }

         if (isset($url)) {
             $this->params = $url;
         }
         else {
             $this->params = [];
         }

         call_user_func_array([$this->defaultController, $this->defaultMethod], $this->params);

     }

     public function url() {

        if (isset($_GET["url"])) {
            $url = $_GET["url"];
            //remove extra spaces(from right-side) of url
            $url = rtrim($url);
            //remove special characters from url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            //split url with "/"
            $url = explode("/", $url);
            return $url;
        }

     }
}

?>