<?php
class DBhelper
{
    public function __construct()
    {
        $conn = new mysqli("localhost", "root", "12345678", "db06");
        if($conn->connect_error)
        {
            die("conn error: ".$conn->connect_error);
        }
    }

    public function get($table)
    {
        $sql = "SELECT * FROM ".$table;
        $result = $this->conn->query($sql);
        return $result->facth_all();
    }

    public function find($table, $ind)
    {
        $sql = "SELECT * FROM ".$table." WHERE ".$ind;
        $result = $this->query($sql);
        $result = $result->facth_all();
        return $result[0];
    }
}
