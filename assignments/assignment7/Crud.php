<?php

require_once "Pdo_methods.php";

class Crud extends PdoMethods
{

    public function getFiles()
    {

        $pdo = new PdoMethods();

        $sql = "SELECT DISTINCT entered_file_name, file_path FROM files ORDER BY entered_file_name";

        $records = $pdo->selectNotBinded($sql);

        if ($records == 'error') {
            return 'There was an error.';
        } else {
            if (count($records) != 0) {
                return $this->displayLinks($records);
            } else {
                return "Files not found.";
            }
        }
    } 


    public function addFile()
    {

        $pdo = new PdoMethods();

         $sql = "INSERT INTO files (file_name, file_path, entered_file_name) VALUES (:fname, :fpath, :enteredname)";

        $bindings = [
            [':fname', $_FILES["selectedFile"]["name"], 'str'],
            [':fpath', "files/" . $_FILES["selectedFile"]["name"], 'str'],
            [':enteredname', $_POST['enteredFileName'], 'str']
        ];

         $result = $pdo->otherBinded($sql, $bindings);

        if ($result === 'error') {
            return 'There was an error adding the name';
        } else {
            return "File has been added.";
        }
    } 

    /*THIS FUNCTION TAKES THE DATA FROM THE DATABASE AND RETURN AN UNORDERED LIST OF THE DATA
and it is called by getFiles() above */

    private function displayLinks($records)
    {
        $list = '<ul>';
        foreach ($records as $row) {
            $list .= "<li><a target='_blank' href={$row['file_path']}>{$row['entered_file_name']}</li>";
        }
        $list .= '</ul>';
        return $list;
    }
}