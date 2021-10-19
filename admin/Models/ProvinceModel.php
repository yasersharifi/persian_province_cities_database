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

    public final function get($offset, $limit) : object | array {
        $query = "SELECT province.id AS provinceId, 
                            province.name AS province,
                            city.id AS cityId,
                            city.name AS city,
                            COUNT(city.id) AS cityCount
                            FROM {$this->table} JOIN city ON province.id = city.province_id GROUP BY province.id LIMIT $offset, $limit";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        $data = [];

        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = (object) $row;
        }

        return $data;
    }

    public final function provinceCount() : int {
        $query = "SELECT province.id AS provinceCount FROM {$this->table}";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->rowCount();
    }

    public final function getCitiesProvince($provinceId): object | array {
        $query = "SELECT province.id AS provinceId, 
                            province.name AS province,
                            city.id AS cityId,
                            city.name AS city,
                            COUNT(city.id) AS cityCount
                            FROM {$this->table} JOIN city ON province.id = city.province_id WHERE province.id = {$provinceId} GROUP BY city.id";
        $statement = $this->connection->prepare($query);
        $statement->execute();

        $data = [];

        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = (object) $row;
        }

        return $data;
    }

    public final function search($provinceId, $search): object | array | bool {
        try {
            $query = "SELECT province.id AS provinceId, 
                            province.name AS province,
                            city.id AS cityId,
                            city.name AS city,
                            COUNT(city.id) AS cityCount
                            FROM {$this->table} JOIN city ON province.id = city.province_id WHERE province.id = {$provinceId} AND city.name LIKE :city GROUP BY city.id";
            $statement = $this->connection->prepare($query);

            $statement->execute([":city" => "%".$search."%"]);

            $data = [];

            while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
                $data[] = (object) $row;
            }

            return $data;
        } catch (\PDOException $error) {
            return false;
        }
    }

}