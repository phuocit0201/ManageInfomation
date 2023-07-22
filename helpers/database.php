<?php
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
                "mysql:host=$this->severName;port=$this->port;dbname=$this->databaseName",
                $this->userName,
                $this->password
            );
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
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

    public function SelectAllDB($sql)
    {
        try {
            $query = $this->conn->prepare($sql);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }
    }

    public function insert($data)
    {
        $fillabel = "(";
        $value = "(";
        foreach ($data as $key => $values) {
            $fillabel .= $key . ",";
            $value .= "'" . $values . "',";
        }
        $fillabel = substr($fillabel, 0, -1) . ")";
        $value = substr($value, 0, -1) . ")";
        $sql = "insert into $this->model" . $fillabel . "values" . $value;

        $this->ExecuteSql($sql);
        return $this->conn->lastInsertId();
    }

    public function all($sort = ["id", "ASC"])
    {
        $sql = "select * from $this->model order by " . $sort[0] . " " . $sort[1];

        return $this->SelectAllDB($sql);
    }

    public function filter($attributes = [],  $sort = ["id", "ASC"])
    {
        $sql = "select * from $this->model";
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

    public function find(array $attributes)
    {
        $sql = "select * from $this->model where ";
        foreach ($attributes as $key => $attribute) {
            $sql .= $key . " = '" . $attribute . "' and ";
        }
        $sql = substr($sql, 0, strlen($sql) - 4);

        return $this->SelectAllDB($sql)[0] ?? null;
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
