<?php


class Model_Users extends Model {

    public function getData() {}

    public function createUser($data = []){
        $sql = "INSERT INTO users (username, email, phone_number, password, gender, birthdate) 
        VALUES (:username, :email, :phone_number, :password, :gender, :birthdate)";

        $args = [
            "username" => $data["username"], 
            "email" => $data["email"], 
            "phone_number" => $data["phone_number"], 
            "password" => $data["password"], 
            "gender" => $data["gender"], 
            "birthdate" => $data["birthdate"]
        ];

        return $this->db->insert($sql, $args);
    }

    function logout(){
        session_destroy();
        return true;
    }

    public function authUser($data = []){
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password = SHA1(MD5(CONCAT(:password, salt)))";
        $args = [
            "email" => $data["email"],
            "password" => $data["password"]
        ];
        if($this->db->rowCount($sql, $args) == 1){
            $_SESSION['user'] = $this->db->getRow($sql, $args);
            return true;
        } else {
            return false;
        }
    }

    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $args = [
            "id" => $id
        ];
        return $this->db->getRow($sql, $args);
    }

    // public function updateUser($data = []){
    //     $sql = "UPDATE users SET username = :username, email = :email, phone_number = :phone_number, password = :password, gender = :gender, birthdate = :birthdate WHERE id = :id";
    //     $args = [
    //         "username" => $data["username"], 
    //         "email" => $data["email"], 
    //         "phone_number" => $data["phone_number"], 
    //         "password" => $data["password"], 
    //         "gender" => $data["gender"], 
    //         "birthdate" => $data["birthdate"], 
    //         "id" => $data["id"]
    //     ];
    //     return $this->db->insert($sql, $args);
    // }

    public function updateUser($data = []) {
        $sql = "UPDATE users SET username = :username, email = :email, phone_number = :phone_number, password = SHA1(MD5(CONCAT(:password, salt))), gender = :gender, birthdate = :birthdate WHERE id = :id";
        $args = [
            "username" => $data["username"],
            "email" => $data["email"],
            "phone_number" => $data["phone_number"],
            "password" => $data["password"], // Используем пароль как есть, чтобы он был правильно хеширован в SQL-запросе
            "gender" => $data["gender"],
            "birthdate" => $data["birthdate"],
            "id" => $data["id"]
        ];
        return $this->db->update($sql, $args);
    }


}

