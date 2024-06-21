<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" ><!--here is the xss--><!-- This form will submit to the same page using the PHP_SELF variable, which points to the current script -->
Enter Your Name<input type="text" name="name" required><br> <!-- Input field for the user to enter their name, which is required -->
<input type="submit" value="Say Hello" name="hello"> <!-- Submit button labeled "Say Hello" -->
</form>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['hello'])) // Check if the form was submitted via POST method and the submit button named "hello" was clicked
{
    if(isset($_POST['name'])) // Check if the 'name' field is set in the POST request
    {
        $name=$_POST['name']; // Assign the value of the 'name' field to the $name variable
        echo "Hello ".htmlspecialchars($_POST['name']); // Output "Hello " followed by the user's name, using htmlspecialchars to prevent XSS attacks
    }
    else{
        echo "Hello User"; // If the 'name' field is not set, output "Hello User"
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
    Make filteration like using htmlspecialchars()==> htmlspecialchars($_SERVER['PHP_SELF'])
-->
