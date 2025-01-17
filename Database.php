<?php
//criar a classe database para manipular o arquivo bd.json
namespace App\Database;

class Database
{
    // public const string DateTimeInterface::W3C = "Y-m-d\\TH:i:sP";
    private mixed $db;
    // private mixed $cpf = $db->clients->get("cpf");
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

    public function getClientData()
    {
        return $this->db->clients;
    }

    public function getClientDataById($client, $cpf, $nascimento, $endereco)
    {

        $client = [
            "name" => $client,
            "cpf" => $cpf,
            "nascimento" => $nascimento,
            "endereco" => $endereco
        ];

        $this->db->clients[] = $client;
        $this->saveData();
    }

    public function saveData()
    {
        file_put_contents("bd.json", json_encode($this->db, JSON_PRETTY_PRINT));
        json_encode($this->db, JSON_PRETTY_PRINT);
    }

    // public function validaCpf($cpf)
    // {

    //     // Extrai somente os números
    //     $cpf = preg_replace("/[^0-9]/is", '', $cpf);

    //     // Verifica se foi informado todos os digitos corretamente
    //     if (strlen($cpf) != 11) {
    //         return false;
    //     }

    //     // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    //     if (preg_match("/(\d)\1{10}/", $cpf)) {
    //         return false;
    //     }

    //     // Faz o calculo para validar o CPF
    //     for ($t = 9; $t < 11; $t++) {
    //         for ($d = 0, $c = 0; $c < $t; $c++) {
    //             $d += $cpf[$c] * (($t + 1) - $c);
    //         }
    //         $d = ((10 * $d) % 11) % 10;
    //         if ($cpf[$c] != $d) {
    //             return false;
    //         }
    //     }
    //     return true;


    // }

}
