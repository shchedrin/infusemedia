<?php

namespace App;

use PDO;
use PDOException;
use Exception;

class DB
{
    public $connection;
    public $tableName = 'visitors';

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $host = getenv('MYSQL_HOST');
        $database = getenv('MYSQL_DATABASE');
        $user = getenv('MYSQL_USER');
        $password = getenv('MYSQL_PASSWORD');

        $dsn = "mysql:host=$host;dbname=$database";

        try {
            $this->connection = new PDO($dsn, $user, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function query(string $sql, array $data)
    {
        try {
            $db = $this->connection->prepare($sql);
            foreach ($data as $key => $value) {
                $db->bindValue(":$key", $value);
            }
            $db->execute();
            return $db->fetch();
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function findVisitor($data)
    {
        return $this->query("SELECT * FROM $this->tableName WHERE ip_address = :ip_address AND user_agent = :user_agent AND page_url = :page_url", $data);
    }

    /**
     * @throws Exception
     */
    public function insertVisitor($data)
    {
        return $this->query("INSERT INTO $this->tableName (ip_address, user_agent, view_date, page_url, views_count) VALUES (:ip_address, :user_agent, :view_date, :page_url, 1)", $data);

    }

    /**
     * @throws Exception
     */
    public function updateVisitor($data)
    {
        return $this->query("UPDATE $this->tableName SET views_count = :views_count, view_date = :view_date WHERE id = :id", $data);
    }

}