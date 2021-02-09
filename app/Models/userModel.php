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

    public function loginUserModel($username) {

        if ($this->query("SELECT * FROM users WHERE username = ?", [$username])) {
            return true;
        }
        else {
            return false;
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