<?php

require_once __DIR__ . '/../DB/connection.php';
require_once __DIR__ . '/../interface/ModelInterface.php';

class Model extends Connection
{
    public function create_data($data, $table)
    {
        var_dump($data);

        $key = array_keys($data);
        $value = array_values($data);
        echo "<br>";
        $key = implode(",", $key);
        $value = implode("','", $value);
        echo "<br>";
        $query = "INSERT INTO cars $table ($key) VALUES ('$value')";
        echo $query;
        $result = mysqli_query($this->db, $query);
        return $result;
    }

    public function index($table)
    {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function convert_data($datas)
    {
        $data = [];
        while ($row = mysqli_fetch_assoc($datas)) {
            $data[] = $row;
        }
        return $data;
    }

    public function find_data($id, $table)
    {
        $query = "SELECT * FROM $table WHERE id = $id";
        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function all_data($table)
    {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->db, $query);

        return $this->convert_data($result);
    }

    public function update_data($id, $datas, $table)
    {
        $key = array_keys($datas);
        $value = array_values($datas);
        $query = "UPDATE $table SET ";
        for ($i = 0; $i < count($key); $i++) {
            $query .= $key[$i] . " = '" . $value[$i] . "'";
            if ($i != count($key) - 1) {
                $query .= " , ";
            }
        }
        $query .= " WHERE id = $id";
        echo $query;
        $result = mysqli_query($this->db, $query);
        return $result;
    }

    public function delete_data($id, $table)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        $result = mysqli_query($this->db, $query);
        return $result;
    }
}
