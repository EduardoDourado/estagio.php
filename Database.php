<?php
//criar a classe database para manipular o arquivo bd.json
namespace App\Database;

class Database
{

    private mixed $db;

    public function __construct()
    {

        $db = file_get_contents("bd.json");
        $this->db = json_decode($db);

    }

    public function getUserData()
    {
        return $this->db->users;
    }
    public function getUserDataById($index)
    {
        return $this->db->users[$index];
    }
}




