<?php

class CRUD {
    private $conn;
    private $table;

    public function __construct($db, $table) {
        $this->conn = $db;
        $this->table = $table;
    }

    public function create($data) {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $query = "INSERT INTO " . $this->table . " ($columns) VALUES ($values)";
        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }

        return $stmt->execute();
    }

    public function read($conditions = []) {
        $query = "SELECT * FROM " . $this->table;
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", array_map(function($key) {
                return "$key = :$key";
            }, array_keys($conditions)));
        }

        $stmt = $this->conn->prepare($query);

        foreach ($conditions as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($data, $conditions) {
        $set = implode(", ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($data)));

        $where = implode(" AND ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($conditions)));

        $query = "UPDATE " . $this->table . " SET $set WHERE $where";
        $stmt = $this->conn->prepare($query);

        foreach (array_merge($data, $conditions) as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }

        return $stmt->execute();
    }

    public function delete($conditions) {
        $where = implode(" AND ", array_map(function($key) {
            return "$key = :$key";
        }, array_keys($conditions)));

        $query = "DELETE FROM " . $this->table . " WHERE $where";
        $stmt = $this->conn->prepare($query);

        foreach ($conditions as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }

        return $stmt->execute();
    }
}