<?php

require_once('class_database.php');

class user extends database
{
    private $username,$useremail,$userpassword,$userimage;
    public function set_username($username)
    {
        $this->username=$this->validate($username);
    }
    public function get_username()
    {
        return $this->username;
    }

    public function set_useremail($useremail)
    {
        $this->useremail=$this->validate($useremail);
    }
    public function get_useremail()
    {
        return $this->useremail;
    }

    public function set_userpassword($userpassword)
    {
        $this->userpassword=$this->validate($userpassword);
    }
    public function get_userpassword()
    {
        return sha1($this->userpassword);
    }

    public function valid_image($image,$username)
    {
        
        $image_name=$this->validate($image['userimage']['name']);
        $tmp_name=htmlspecialchars($image['userimage']['tmp_name']);
        $allowed_file=["jpg", "png","jpeg"];
        $ext=explode(".",$image_name);
        $ext=end($ext);
        $ext=strtolower($ext);
        if(in_array($ext,$allowed_file))
        {
            $this->userimage=$username.".".$ext;
            move_uploaded_file($tmp_name,"../image_user/$this->userimage");
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_userimage()
    {
        return $this->userimage;
    }

    public function get_userhomeimage()
    {
        if(isset($_COOKIE['username'])&isset($_COOKIE['userpassword']))
        {
            $name=$_COOKIE['username'];
            $userimage=($this->getData("users", "userimage", "username ='$name'"))->fetch(PDO::FETCH_ASSOC);
            if($userimage['userimage'])
            {
                return $userimage['userimage'];
            }
            else
            {
                return "defulet.jpg";

            }  
        }
        elseif(isset($_SESSION['username'])&isset($_SESSION['userpassword']))
        {
            $name=$_SESSION['username'];
            $userimage=($this->getData("users", "userimage", "username ='$name'"))->fetch(PDO::FETCH_ASSOC);
            if($userimage['userimage'])
            {
                return $userimage['userimage'];
            }
            else
            {
                return "defulet.jpg";
            }
        }

    }
}

?>