<?php
declare(strict_types=1);

class DataBaseConnection
{
    public mysqli $db;

    PUBLIC const USER_NAME = 'cheredn',
                 HOST      = 'mysql',
                 PASSWORD  = 'cheredn',
                 DATABASE  = 'laravel',
                 PORT      = 3306;

    public function connect(
        string $server = self::HOST,
        string $user_name = self::USER_NAME,
        string $password = self::PASSWORD,
        string $database = self::DATABASE,
        int $port = self::PORT)
    {
        $this->db = new mysqli($server, $user_name, $password, $database, $port);

        if($this->db->connect_error){
            die("Ошибка: " . $this->db->connect_error);
        }
    }

    public function disconnect()
    {
        $this->db->close();
    }
}