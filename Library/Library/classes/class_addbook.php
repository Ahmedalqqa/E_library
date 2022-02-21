<?php

require_once('class_database.php');

class addbook extends database
{
    private $bookname,$bookimage,$authorname,$date,$price,$books;
    public function set_bookname($bookname)
    {
        $this->bookname=$this->validate($bookname);
    }
    public function get_bookname()
    {
        return $this->bookname;
    }
    public function set_authorname($authorname)
    {
        $this->authorname=$this->validate($authorname);
    }
    public function get_authorname()
    {
        return $this->authorname;
    }
    public function set_date($date)
    {
        $this->date=$this->validate($date);
    }
    public function get_date()
    {
        return $this->date;
    }
    public function set_price($price)
    {
        $this->price=$this->validate($price);
    }
    public function get_price()
    {
        return $this->price;
    }
    public function set_books($books)
    {
        $this->books=$this->validate($books);
    }
    public function get_books()
    {
        return $this->books;
    }
    public function set_description($description)
    {
        $this->description=$this->validate($description);
    }
    public function get_description()
    {
        return $this->description;
    }

    public function valid_image($image,$username)
    {
        $image_name=$this->validate($image['bookimage']['name']);
        $tmp_name=htmlspecialchars($image['bookimage']['tmp_name']);
        $allowed_file=["jpg", "png","jpeg"];
        $ext=explode(".",$image_name);
        $ext=end($ext);
        $ext=strtolower($ext);
        if(in_array($ext,$allowed_file))
        {
            $this->userimage=$username.".".$ext;
            move_uploaded_file($tmp_name,"../image/uploads/$this->userimage");
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_bookimage()
    {
        return $this->userimage;
    }

}

?>