<?php

require_once "Crud.php";

class Upload
{

    private $fileName;
    private $fileSize;
    private $fileType;

    function __construct()
    {

        $this->fileSize = $_FILES["selectedFile"]["size"];
        $this->fileType = $_FILES["selectedFile"]["type"];
        $this->fileName = $_FILES["selectedFile"]["name"];
        $this->enteredFileName = $_POST['enteredFileName'];
    }

    function checkFile()
    {

        if ($this->fileSize > 100000) {
            return "File is too big";
        } else if ($this->fileType != "application/pdf") {
            return "File must be a pdf file";
        } else {
            return $this->moveFile();
        }
    }

    function moveFile()
    {

        if (move_uploaded_file($_FILES["selectedFile"]["tmp_name"], "files/" . $this->fileName)) {

            $crud = new Crud();
            return $crud->addFile();
        } else {
            return "There was an error uploading your file.";
        }
    }
}
