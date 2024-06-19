<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" ><!--here is the xss-->
Enter Your Name<input type="text" name="name" required><br>
<input type="submit" value="Say Hello" name="hello">
</form>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['hello']))
{
    if(isset($_POST['name']))
    {
        $name=$_POST['name'];
        echo "Hello ".htmlspecialchars($_POST['name']);
    }
    else{
        echo "Hello User";
    }
}
?>
<!--
    The Problem In action Of The Form 
    ------------------------------Why-----------------------------
    action take any thing in URL So you can go out from action using " then write the xss payload 
    ------------------------------Mitigation-----------------------
    Write The Name Of Your PHP action Page ==> action="pageName.php" 
    *******************OR***************
    Use htmlspecialchars()==> htmlspecialchars($_SERVER['PHP_SELF'])
-->
