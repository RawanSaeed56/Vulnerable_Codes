<?php
require_once "connection.php";

if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['uemail']))
{
    if(!empty($_POST["email"])&&!empty($_POST["csrfKey"])){//here is the CSRF Attack
    session_start();
    $sql="UPDATE clients SET email=:email WHERE user_id=:userId";
    $stat=$con->prepare($sql);
    $stat->execute(array(
                ':email'=>htmlspecialchars($_POST["email"]),
                ':userId'=>$_SESSION['id']));//here is the CSRF Attack executed
    echo "email changed";
    }
    else{
        echo"please enter email to make change<br>";
    }
}
else if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['back']))
{
    session_start();
    if($_SESSION['Role']=="Admin"){
        header("Location:show.php");
        exit();
    }else{
        header("Location:user.php");
        exit();
    }
}
?>
<form method="POST" action="update.php">
    <input type="text" name="email"><input type="submit" value="Update Email" name="uemail">
    <input type="hidden" value="QUselli1XZ457" name="csrfKey"><br>
    Back To Your Page<input type="submit" value="Back" name="back">
</form>

<!--
    The CSRF When form Update Email submited
    -------------------------------Why----------------------------
    because you don't check this is the vaild value for this user or not
    -------------------------------Mitigation----------------------
    Make a relation between user session and CSRF token
-->