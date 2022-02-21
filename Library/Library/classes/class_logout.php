<?php

require_once('class_database.php');

class logout extends database
{
    public function destroy_cookie_session()
    {
        setcookie("username","",time()-30);
        setcookie("userpassword","",time()-30);
        session_start();
        session_unset();
        session_destroy();
    }
}

?>