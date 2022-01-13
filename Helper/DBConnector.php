<?php

namespace CRUD\Helper;

use PDO;
use PDOException;

class DBConnector
{

    /** @var mixed $db */
    private $db;
    private $server;
    private $password;
    private $username;
    private PDO $connection;

    public function __construct($db, $server, $username, $password){
        $this->db = $db;
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect() : void
    {
        try {
            $this->connection = new PDO("mysql:host= ".$this->server.";dbname=" .$this->db,$this->username, $this->password);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /**
     * @param string $query
     * @return bool | \PDOStatement
     */
    public function execQuery(string $query)
    {
        return $this->connection->query($query);
    }

    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {

    }
}