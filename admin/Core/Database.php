<?php
namespace Database;

class Database
{
    private $host;
    private $username;
    private $password;
    private $database;

    protected $connection;
    public function __construct()
    {
        if (! $this->connection) {
            try {
                $this->connection = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->connection;
            }
            catch (PDOException $error) {
                return $error->getMessage();
            }
        }
        return $this->connection;

    }

}