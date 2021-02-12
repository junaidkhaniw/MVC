<?php

class userController extends Framework {

    public function __construct() {

        if ($this->getSession("userId")) {
            $this->redirect("profile");
        }
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
            
            $hashed_password = password_hash($userData["password"], PASSWORD_DEFAULT);
            $data = [
                $userData["name"],
                $userData["username"],
                $userData["email"],
                $hashed_password,
            ];
            if ($this->userModel->registerUserModel($data)) {

                $this->setFlash('accountCreated', 'Your account has been created');
                $this->redirect("userController/loginUsers");
            }

        }
        else {
            $this->view("registerUser", $userData);
        }
    }

    public function loginUsers() {
        $this->view("loginUser");
    }

    public function loginUserController() {

        $userData = [
            "username"          => $this->input("username"),
            "password"          => $this->input("password"),
            "loginUsernameError"     => "",
            "loginPasswordError"     => ""
        ];

        if (empty($userData["username"])) {
            $userData["loginUsernameError"] = "**Username is required**";
        }

        if (empty($userData["password"])) {
            $userData["loginPasswordError"] = "**Password is required**";
        }

        if (empty($userData["loginUsernameError"]) && empty($userData["loginPasswordError"])) {
            
            $result = $this->userModel->loginUserModel($userData['username'], $userData['password']);
            if ($result['status'] === 'usernameNotFound') {
                $userData["loginUsernameError"] = "**Invalid Username**";
                $this->view("loginUser", $userData);
            }
            elseif ($result['status'] === 'passwordNotMatched') {
                $userData["loginPasswordError"] = "**Invalid Password**";
                $this->view("loginUser", $userData);
            }
            elseif ($result['status'] === 'ok') {
                $this->setSession('userId', $result['data']);
                $this->redirect('profile');
            }

        }
        else {
            $this->view("loginUser", $userData);
        }
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

    // public function userProfile() {
    //     # code...
    // }

    // public function viewUserProfileController($id) {
        
    //     $userData = [
    //         "userId" => $id,
    //         "name" => "",
    //         "username" => "",
    //         "email" => ""
    //     ];
        
    //     if($this->userModel->viewUserProfileModel($userData["userId"], $userData["name  "],$userData["username"],$userData["email"],));

    //     $this->view("profile", $userData);
    // }

}

?>