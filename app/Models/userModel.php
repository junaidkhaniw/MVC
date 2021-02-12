<?php

class userModel extends Database {

    public function checkUsername($username) {

        if ($this->query("SELECT username FROM users WHERE username = ?", [$username])) {
            if ($this->rowCount() > 0) {
                return false;
            }
            else {
                return true;
            }
        }

    }

    public function checkUsernamee($username) {

        if ($this->query("SELECT username FROM users WHERE username = ?", [$username])) {
            if ($this->rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }

    }

    public function checkEmail($email) {

        if ($this->query("SELECT email FROM users WHERE email = ?", [$email])) {
            if ($this->rowCount() > 0) {
                return false;
            }
            else {
                return true;
            }
        }

    }
    
    public function registerUserModel($data) {

        if ($this->query("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)", $data)) {
            return true;
        }
        else {
            return false;
        }

    }
    

    public function loginUserModel($username, $password) {

        if ($this->query("SELECT * FROM users WHERE username = ?", [$username])) {
            if ($this->rowCount() > 0) {
                $row = $this->fetch();
                $userUsername = $row->username;
                $userPassword = $row->password;
                $userId = $row->id;
                if (password_verify($password, $userPassword)) {
                    return ['status' => 'ok', 'data' => $userId, $userUsername];
                }
                else {
                    return ['status' => 'passwordNotMatched'];
                }
            }
            else {
                return ['status' => 'usernameNotFound'];
            }
        }
 
    }
       
    public function viewUserModel() {

        if ($this->query("SELECT * FROM users")) {
            return $this->fetchAll();
        }
        else {
            return false;
        }

    }

}

?>