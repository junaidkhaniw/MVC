<?php

class Profile extends Framework {

    public function __construct() {

        if (!$this->getSession("userId")) {
            $this->redirect("userController/loginUsers");
        }
        $this->helper("link");
    }

    public function index() {
        $this->view("profile");
    }

    public function logout() {
        $this->destroySession();
        $this->redirect('userController/loginUsers');
    }

}

?>