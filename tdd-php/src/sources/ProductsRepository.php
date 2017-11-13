<?php

require_once "Database.php";

class ProductsRepository
{

    private $connection;

    public function __construct()
    {
        $database = new Database();

        $this->connection = $database->getConnection();
    }

    public function findAll()
    {
        $sql   = "SELECT description, inventory, sold FROM products ORDER BY ID DESC";
        $query = $this->connection->query($sql);

        return $query;
    }
}