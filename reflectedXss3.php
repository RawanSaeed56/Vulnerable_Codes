<form action="reflectedXss3.php" method="GET" >
Enter Your Name<input type="text" name="name" required><br>
<input type="submit" value="Say Hello" name="hello">
</form>
<?php
if($_SERVER['REQUEST_METHOD']=="GET"&&isset($_GET['hello']))
{
    if(isset($_GET['name']))
    {
        echo "Hello ".$_GET['name'];//The XSS Here
    }
    else{
        echo "Hello User";
    }
}
?>
<!--
    The XSS When echo run
    -------------------------------Why----------------------------
    because you print the value that you take from user without making any filter
    -------------------------------Mitigation----------------------
    use htmlspecialchars() ==> echo htmlspecialchars(value==>$_GET['name'])
-->