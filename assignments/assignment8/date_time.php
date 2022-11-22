<?php

class Date_Time
{

    private $conn;

    function __construct()
    {

        $servername = "localhost";

        $username = "mimran1";

        $password = "qUZg4gD36ASH";

        $dbname = "mimran1";

        $this->conn = new mysqli($servername, $username, $password, $dbname);

        if ($this->conn->connect_error) {

            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function checkSubmit($dtm)
    {

        $timestamp = strtotime($dtm['datetime']);

        $note = $dtm['note'];

        $mdt = $dtm['datetime'];

        $sql = "INSERT INTO tbl_notes (date_time,note) VALUES('$mdt','$note');";

        if ($this->conn->query($sql)) {

            echo "Added Successfully";
        } else {

            echo "Error " . $sql;
        }
    }

    function getNotes($begin, $end)
    {

        $sql = "SELECT * FROM tbl_notes WHERE CAST(date_time AS DATE) BETWEEN '$begin' AND '$end' ORDER BY date_time;";

        $result = $this->conn->query($sql);

        $notes = array();

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $note = array("date_time" => $row['date_time'], "note" => $row['note']);

                array_push($notes, $note);
            }
        }

        return $notes;
    }
}
