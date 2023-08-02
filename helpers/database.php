<?php
namespace Helpers;

use PDOException;
use PDO;
use Exception;
class Database
{
    private $conn;
    private $severName  = server_name_db;
    private $userName = username_db;
    private $password = password_db;
    private $databaseName = name_db;
    private $port = port_db;
    protected $model;

    function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=$this->severName;port=$this->port;dbname=$this->databaseName;charset=utf8mb4",
                $this->userName,
                $this->password,
                [ PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8 COLLATE utf8_general_ci"]
            );
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }

    public function ExecuteSql($sql)
    {
        try {
            $query = $this->conn->prepare($sql);
            $query->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function SelectAllDB($sql, $values = [])
    {
        try {
            $query = $this->conn->prepare($sql);
            $query->execute($values);

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function insert($data)
    {
        $fillable = array_keys($data);
        $values = array_values($data);
        $fillableString = implode(', ', $fillable);

        // Create a string of placeholder values.
        $placeholders = rtrim(str_repeat('?, ', count($values)), ', ');

        $sql = "INSERT INTO $this->model ($fillableString) VALUES ($placeholders)";

        try {
            $stmt = $this->conn->prepare($sql);

            return $stmt->execute($values);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function all($sort = ["id", "ASC"])
    {
        $orderBy =  $sort[0];
        $orderDirection = strtoupper($sort[1]) === "DESC" ? "DESC" : "ASC";
        $sql = "SELECT * FROM $this->model ORDER BY $orderBy $orderDirection";

        return $this->SelectAllDB($sql);
    }

    public function filter($attributes = [], $sort = ["id", "ASC"])
    {
        $sql = "SELECT * FROM $this->model";

        $conditions = [];
        $values = [];

        foreach ($attributes as $key => $attribute) {
            $conditions[] = "$key = ?";
            $values[] = $attribute;
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $orderBy =  $sort[0];
        $orderDirection = strtoupper($sort[1]) === "DESC" ? "DESC" : "ASC";

        $sql .= " ORDER BY $orderBy $orderDirection";

        return $this->SelectAllDB($sql, $values);
    }

    public function find(array $attributes)
    {
        $conditions = [];
        $values = [];

        foreach ($attributes as $key => $attribute) {
            $conditions[] = "$key = ?";
            $values[] = $attribute;
        }

        $sql = "SELECT * FROM $this->model WHERE " . implode(" AND ", $conditions);

        $result = $this->SelectAllDB($sql, $values);

        return $result[0] ?? [];
    }

    public function joins(
        $select,
        $tableOne,
        $tableTwo,
        $attributeOne,
        $atrributeTwo,
        $attributes = [],
        $sort = ["id", "ASC"]
    ) {
        $sql = "select $select from $tableOne join $tableTwo on $tableOne.$attributeOne = $tableTwo.$atrributeTwo";
        if (count($attributes) > 0) {
            $sql .= " where ";
            foreach ($attributes as $key => $attribute) {
                $sql .= $key . " = '" . $attribute . "' and ";
            }
            $sql = substr($sql, 0, strlen($sql) - 4);
        }
        $sql .= " order by " . $sort[0] . " " . $sort[1];
        return $this->SelectAllDB($sql);
    }

    public function update($data, $attributes = [])
    {
        $sql = "update $this->model set ";
        foreach ($data as $key => $value) {
            $sql .= $key . " = '" . $value . "',";
        }
        $sql = substr($sql, 0, strlen($sql) - 1);
        $sql .= " where ";
        foreach ($attributes as $key => $attribute) {
            $sql .= $key . " = '" . $attribute . "' and ";
        }
        $sql = substr($sql, 0, strlen($sql) - 4);
        $this->ExecuteSql($sql);
        return true;
    }

    public function delete($attributes = [])
    {
        try {
            $sql = "delete from $this->model ";
            if (count($attributes) > 0) {
                $sql .= " where ";
                foreach ($attributes as $key => $attribute) {
                    $sql .= $key . " = '" . $attribute . "' and ";
                }
                $sql = substr($sql, 0, strlen($sql) - 4);
            }
            $this->ExecuteSql($sql);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function whereLike($attributes, $sort = ['id', 'ASC'])
    {
        $sql = "select * from $this->model";
        if (count($attributes) > 0) {
            $sql .= " where ";
            foreach ($attributes as $key => $attribute) {
                $sql .= $key . " like '%" . $attribute . "%' or ";
            }
            $sql = substr($sql, 0, strlen($sql) - 3);
        }
        $sql .= " order by " . $sort[0] . " " . $sort[1];

        return $this->SelectAllDB($sql);
    }
}
