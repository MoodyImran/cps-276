<?php

class DatabaseConn
{

    private $conn;
    
    public function dbOpen()
    {

        try {

            $dbHost = 'localhost';
            $dbName = 'mimran1';
            $dbUsr = 'mimran1';
            $dbPass = 'qUZg4gD36ASH';

            $this->conn = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dbUsr, $dbPass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;
        }

        catch (PDOException $e) {

            echo $e->getMessage();
        } 
    } 
} 