<?php
require_once "Db_conn.php";

class PdoMethods extends DatabaseConn
{

    private $sth;
    private $conn;
    private $database;
    private $error;

    private function db_connection()
    {
        $this->database = new DatabaseConn();
        $this->conn = $this->database->dbOpen();
    }

    private function createBinding($bindings)
    {
        foreach ($bindings as $value) {
            switch ($value[2]) {
                    //from the php manual: Represents the SQL INTEGER data type.
                case 'int':
                    $this->sth->bindParam($value[0], $value[1], PDO::PARAM_INT);
                    //from the php manual: Represents the SQL CHAR, VARCHAR, or other string data type.
                case 'str':
                    $this->sth->bindParam($value[0], $value[1], PDO::PARAM_STR);
            }
        }
    }

    private function executeStatement()
    {
        try {
            $this->sth->execute();
        } catch (PDOException $Exception) {
            $error = date('F-j-Y \a\t h:i:s') . " - ERROR! " . $Exception->getMessage() . "\n";
            file_put_contents('../logs/pdo_errors.log', $error, FILE_APPEND);
            $this->error = true;
        }
    }
    public function selectBinded($sql, $bindings)
    {
        $this->error = false;
        $this->db_connection();
        $this->sth = $this->conn->prepare($sql);
        $this->createBinding($bindings);
        $this->executeStatement();
        $this->conn = null;
        if (!$this->error) {
            return $this->sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return 'There was an error';
        }
    }

    public function selectNotBinded($sql)
    {
        $this->error = false;
        try {
            $this->db_connection();
            $this->sth = $this->conn->prepare($sql);
            $this->executeStatement();
        } catch (PDOException $Exception) {
            return 'There was an error';
        }

        $this->conn = null;
        if (!$this->error) {
            return $this->sth->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return 'There was an error';
        }
    }

    public function otherBinded($sql, $bindings)
    {
        $this->error = false;
        $this->db_connection();
        $this->sth = $this->conn->prepare($sql);
        $this->createBinding($bindings);
        $this->executeStatement();
        $this->conn = null;
        if (!$this->error) {
            return 'There was no error';
        } else {
            return 'There was an error';
        }
    }
}
