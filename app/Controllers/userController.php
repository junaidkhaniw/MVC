<?php

class userController extends Framework {

    public function __construct() {
        $this->helper("link");
        $this->userModel = $this->model("userModel");
    }

    public function index() {
        $this->view("registerUser");
    }

    public function registerUserController() {

        $userData = [
            "name"            => $this->input("name"),
            "username"        => $this->input("username"),
            "email"           => $this->input("email"),
            "password"        => $this->input("password"),
            "nameError"       => "",
            "usernameError"   => "",
            "emailError"      => "",
            "passwordError"   => ""
        ];

        if (empty($userData["name"])) {
            $userData["nameError"] = "**Name is required**";
        }

        if (empty($userData["username"])) {
            $userData["usernameError"] = "**Username is required**";
        }
        else {
            if (!$this->userModel->checkUsername($userData["username"])) {
                $userData["usernameError"] = "**Username is already exist**";
            }
        }

        if (empty($userData["email"])) {
            $userData["emailError"] = "**Email is required**";
        }
        else {
            if (!$this->userModel->checkEmail($userData["email"])) {
                $userData["emailError"] = "**Email is already exist**";
            }
        }

        if (empty($userData["password"])) {
            $userData["passwordError"] = "**Password is required**";
        }

        if (empty($userData["nameError"]) && empty($userData["usernameError"]) && empty($userData["emailError"]) && empty($userData["passwordError"])) {
            
            $password = password_hash($userData["password"], PASSWORD_DEFAULT);
            $data = [
                $userData["name"],
                $userData["username"],
                $userData["email"],
                $password,
            ];
            if ($this->userModel->registerUserModel($data)) {
                echo "Submited";
            }

        }
        else {
            $this->view("registerUser", $userData);
        }
    }

    public function loginUserController() {

        $userData = [
            "username"          => $this->input("username"),
            "password"          => $this->input("password"),
            "usernameError"     => "",
            "passwordError"     => ""
        ];

        if (empty($userData["username"])) {
            $userData["usernameError"] = "**Username is required**";
        }
        else {
            if (!$this->userModel->checkUsername($userData["username"])) {
                $userData["usernameError"] = "**Invalid Username**";
            }
        }

        if (empty($userData["password"])) {
            $userData["passwordError"] = "**Password is required**";
        }

        if (empty($userData["usernameError"]) && empty($userData["passwordError"])) {
            
            $data = [
                $userData["username"],
                $password,
            ];
            if ($this->userModel->loginUserModel($data)) {
                echo "Submited";
            }

        }
        else {
            $this->view("loginUser", $userData);
        }

        $this->view("loginUser");
        
    }

    public function viewUserController() {

        $user = $this->model("userModel");

        if ($user->viewUserModel()) {
            $result = $user->viewUserModel();
        }
        else {
            echo "US";
        }

        $this->view("userView", $result);
    }

}

?>