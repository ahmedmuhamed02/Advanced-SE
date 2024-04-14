<?php
class User
{
    public $id;
    public $Fullname;
    public $Gender;
    public $Usertype;
    public $FileManagerObj;

    function __construct()
    {
       $this->FileManagerObj=new FileManager();
       $this->FileManagerObj->FileName = "User.txt";
       $this->FileManagerObj->Separator = ",";
    }

    function InsertUser($FileManagerObj)
    {
        $id= $this->FileManagerObj->getLastId($this->FileManagerObj->Separator)+1;
        $record="\r\n".$id.",".$this->Fullname.",".$this->Gender.",Patient";
        $this->FileManagerObj->InsertRecordinFile($record);
    }

    function ListAllUsers()
    {
        $MyReturn=array();
        $myfile = fopen($this->FileManagerObj->FileName, "r+") or die("Unable to open file!");
        $i=0;
        while (!feof($myfile)) {
            $line = fgets($myfile);
            if (!empty($line)) {
                $ArrayLine = explode($this->FileManagerObj->Separator, $line);
                $MyReturn[$i]= $this->GetUserFromFileById($ArrayLine[0]);
                $i++;
            }
        }
        fclose($myfile);
        return $MyReturn;
    }

    function DeleteUser($Id)
    {
    $record = $this->FileManagerObj->GetLineWithId($Id);
    $this->FileManagerObj->deleteRecord($record);

    }
    
    function GetUserFromFileById($Id)
{
    $r = new User();
    $record = $this->FileManagerObj->GetLineWithId($Id);
    $ArrayLine = explode($this->FileManagerObj->Separator, $record);
    $r->id = $ArrayLine[0];
    $r->Fullname = $ArrayLine[1];
    $r->Gender = $ArrayLine[2];
    $r->Usertype = $ArrayLine[3]; 
    return $r;
}
}

class FileManager
{
    public $FileName;
    public $Separator;


    function deleteRecord($record)
    {
        $contents = file_get_contents($this->FileName);
    $contents =str_replace($record,'',$contents);
    file_put_contents($this->FileName,$contents);
    }

    function InsertRecordinFile($record)
    {
        $myfile = fopen($this->FileName, "a+") or die("Unable to open file!");
        fwrite($myfile,$record);
        fclose($myfile);
    }
    
    function GetLineWithId($Id)
    {
        if (!file_exists($this->FileName)) {
            return 0;
        }

        $myfile = fopen($this->FileName, "r+") or die("Unable to open file!");

        while (!feof($myfile)) {
            $line = fgets($myfile);
            $ArrayLine = explode($this->Separator, $line);
            if ($ArrayLine[0] == $Id) {
                fclose($myfile);
                return $line; 
            }
        }
        fclose($myfile);
        return false; 
    }

    public function getLastId()
    {
        if (!file_exists($this->FileName)) {
            return 0;
        }

        $myfile = fopen($this->FileName, "r+") or die("Unable to open file!");
        $lastId = 0;
        while (!feof($myfile)) {
            $line = fgets($myfile);
            $ArrayLine = explode($this->Separator, $line);
            if ($ArrayLine[0] != "") {
                $lastId = $ArrayLine[0];
            }
        }
        fclose($myfile);
        return $lastId;
    }

    public function DrawTablefromFile()
    {
        $myfile = fopen($this->FileName, "r+") or die("Unable to open file!");
        while (!feof($myfile)) {
            $line = fgets($myfile);
            echo "<tr>";
            $ArrayLine = explode($this->Separator, $line);
            for ($i = 0; $i < count($ArrayLine); $i++) {
               echo "<td>" .$ArrayLine[$i]."</td>";
            }
            echo "</tr>";
        }
        fclose($myfile);
    }  
}

?>