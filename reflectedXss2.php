<?php
$name="";
if($_SERVER['REQUEST_METHOD']=="GET"&&isset($_GET['hello']))
{
    $name="";
    if(isset($_GET['name']))
    {
        $name=$_GET['name'];
        echo "Hello ".htmlspecialchars($_GET['name']);
    }
    else{
        echo "Hello User";
    }
}
?>
<form action="reflectedXss2.php" method="GET" >
Enter Your Name<input type="text" name="name" value="<?php echo $name;?>" required><!--here is the xss-->
<br>
<input type="submit" value="Say Hello" name="hello">
</form>

<!--
    The Problem in input tag in attribute value 
    ------------------------------Why-----------------------------
    user write the value and he can go out from value attribute using " then write the xss payload  
    ------------------------------Mitigation-----------------------
    Use htmlspecialchars()==> htmlspecialchars(Write Your Value ==> $name) 
-->
