<?php

class Database
{
    const SERVER   = "192.168.99.100";
    const USER     = "root";
    const PASSWORD = "root";
    const DATABASE = "sales";

    private $connection = null;

    public function getConnection()
    {
        if ($this->connection) {
            return $this->connection;
        }

        $mysqli = new mysqli(self::SERVER, self::USER, self::PASSWORD, self::DATABASE);

        if ($mysqli->connect_errno) {
            throw new Exception("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        }

        $this->connection = $mysqli;

        return $this->connection;
    }
}