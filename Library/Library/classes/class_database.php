<?php
abstract class database
{
    private $connection;
    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=library_management_system", "root", "");
        }catch (PDOException $e) 
        {
            echo $e->getMessage();
            exit();
        }
    }

    function validate($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    public function runDML($stmt)
    {
        return $this->connection->query($stmt); //object
    }

    public function getData($table, $select = "*", $condition = 1)
    {
        return $this->runDML("SELECT $select FROM $table WHERE $condition");
    }

    public function updateData($table,$value ,$condition = 1)
    {
        return $this->runDML("UPDATE $table SET $value where $condition");
    }

    public function deleteData($table, $condition = 1)
    {
        return $this->runDML("DELETE FROM ($table) WHERE ($condition)");
    }

    public function addeData($table,$variable,$value )
    {
        return $this->runDML("INSERT INTO $table ($variable) VALUES ($value)");
    }


    public function auto_header_home()
    {
        $have_acess=false;
        session_start();
        if(isset($_COOKIE['username'])&isset($_COOKIE['userpassword']))
        {
            $have_acess=true;
        }
        elseif(isset($_SESSION['username'])&isset($_SESSION['userpassword']))
        {
            $have_acess=true;

        }
        return $have_acess;
    }

    public function check_admin()
    {
        $isadmin=false;
        if(isset($_COOKIE['username'])&isset($_COOKIE['userpassword']))
        {
            $name=$_COOKIE['username'];
            $admin=($this->getData("users", "isadmin", "username ='$name'"))->fetch(PDO::FETCH_ASSOC);
            if($admin['isadmin'])
            {
                $isadmin=true;
            }   
        }
        elseif(isset($_SESSION['username'])&isset($_SESSION['userpassword']))
        {
            $name=$_SESSION['username'];
            $admin=($this->getData("users", "isadmin", "username ='$name'"))->fetch(PDO::FETCH_ASSOC);
            if($admin['isadmin'])
            {
                $isadmin=true;
            }           
        }
        return $isadmin;
    }
}
