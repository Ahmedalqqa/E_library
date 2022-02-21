<?php 
require_once("classes/class_user.php"); 
$user=new user();

if($user->auto_header_home())
{
    header("location: home.php");
}

if(isset($_POST['submit']))
{   
    // print_r($_POST);
    if(!empty($_POST['username']&&!empty($_POST['userpassword']))) 
    {
        $user->set_username($_POST['username']);$username = $user->get_username();             //define username.
        $user->set_userpassword($_POST['userpassword']);$userpassword = $user->get_userpassword(); //define userpassword.
        
        $userListName = $user->getData("users", "username,userpassword", "username = '$username' AND userpassword = '$userpassword' ");       
        $countListName = $userListName->rowCount();
        
        if($countListName>0)
        {
            if(isset($_POST['remember']))
            {
                setcookie("username", $username,time()+60*30);
                setcookie("userpassword", $userpassword,time()+60*30);
                header("location: home.php");

            }
            else
            {
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['userpassword']=$userpassword;
                header("location: home.php");

            }
        }
        else
        {
            $message="Wrong Username or Password";
        }
    
    }
    else
    {
        $message="Please fill the empties";                                                     //if any fileds empty
    }
    if(isset($message)){echo($message);}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="lib/style.css">
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="shortcut icon" href="https://i.pinimg.com/originals/49/f7/25/49f725a9f2b62ea80603f3fe51289735.jpg" type="image/x-icon">
</head>

<body>

    <div class="login">
        <h1 class="text-center">Login</h1>
        <form method="post">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="Password" class="form-control" placeholder="Password" name="userpassword">
            </div>
            <div class="mb-3">
                <label class="form-label">Remember Me</label>
                <input type="checkbox" name="remember">
            </div>
            <input type="submit" name="submit" value="login" class="submit">
            <a href="register.php" class="account">Create New Account..?</a>
        </form>
    </div>



    <script src="lib/bootstrap.bundle.js"></script>
</body>

</html>