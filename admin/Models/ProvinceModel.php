<?php
namespace Back\Models;
include_once "./Core/Database.php";

use Back\Database\Database;
class ProvinceModel extends Database
{
    private string $table;

    public function __construct()
    {
        parent::__construct();

        $this->table = "province";
    }

    public final function get() : object | array {
        $query = "SELECT * FROM {$this->table}";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        $data = [];

        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = (object) $row;
        }

        return $data;
    }

}