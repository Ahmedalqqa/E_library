<?php



require_once("classes/class_user.php"); 
$user=new user();
if($user->auto_header_home())
{
    header("location: home.php");
}
if(isset($_POST['submit']))
{   
    if(!empty($_POST['username'])&&!empty($_POST['useremail'])&&!empty($_POST['userpassword']))  
    {
        if(filter_var($_POST['useremail'], FILTER_VALIDATE_EMAIL))          //check emill valid.
        {
            $user->set_username($_POST['username']);$username = $user->get_username();          //define username.
            $user->set_useremail($_POST['useremail']);$useremail = $user->get_useremail();          //define useremail.
            $user->set_userpassword($_POST['userpassword']);$userpassword = $user->get_userpassword();          //define userpassword.
            
            $userListName = $user->getData("users", "username", "username = '$username'");         //Show if username already in database
            $countName = $userListName->rowCount();
            
            $userListemail = $user->getData("users", "useremail", "useremail = '$useremail'");         //Show if useremail already in database
            $countemail = $userListemail->rowCount();
            

            if($countemail>0&&$countName>0)
            {
                $message = "Email user Name arleady register";
            }
            else if($countemail>0)
            {
                $message = "Email arleady register";
            }
            else if($countName)
            {
                $message = "Name arleady register";
            }
            else
            {
                if(!empty($_FILES['userimage']['name']))
                {
                    $image=$user->valid_image($_FILES,$username);
                    if($image)
                    {
                        $userimage = $user->get_userimage();
                        $user->addeData('users',"username,useremail,userpassword,userimage","'{$username}','{$useremail}','{$userpassword}','$userimage'");
                        $message="Register completed";
                        header("location:index.php");                             
                    }
                    else
                    {
                        echo "Cant upload this file";
                    }
                }
                else
                {
                    $user->addeData('users',"username,useremail,userpassword","'{$username}','{$useremail}','{$userpassword}'");
                    $message="Register completed";
                    header("location:index.php");     
                }
            }
        }
        else
        {
            $message = "Invalid email format";
        }
    }
    else
    {
        $message="Please fill the empties";         //if any fileds empty
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
        <h1 class="text-center">Register</h1>
        <form method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="Email" class="form-control" placeholder="Username" name="useremail">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="Password" class="form-control" placeholder="Password" name="userpassword">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="userimage">
            </div>
            <input type="submit" name="submit" value="Register" class="submit">
            <a href="index.php" class="account">Already Have Account..?</a>
        </form>
    </div>
    <script src="lib/bootstrap.bundle.js"></script>
</body>

</html>