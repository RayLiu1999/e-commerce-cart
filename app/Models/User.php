<?php

namespace App\Models;

use Database;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getUser($email)
    {
        $this->db->query("SELECT password FROM users WHERE email = '".$email."'");
        $user = $this->db->result();

        return $user;
    }

    public function CheckUser($username, $email)
    {
        $this->db->query("SELECT * FROM users WHERE username = '$username' OR email = '$email'");
        $accounts = $this->db->resultAll();
        
        return $accounts;
    }

    public function CreateUser($username, $email, $password_hash)
    {
        $this->db->query("INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password_hash')");
        $this->db->execute();
    }
}
