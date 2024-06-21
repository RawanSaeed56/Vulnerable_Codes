<form action="reflectedXss3.php" method="GET" > <!-- The form submits to the 'reflectedXss3.php' page using the GET method -->
Enter Your Name<input type="text" name="name" required><br> <!-- Text input for the user's name, which is required -->
<input type="submit" value="Say Hello" name="hello"> <!-- Submit button labeled "Say Hello" -->
</form>

<?php
if($_SERVER['REQUEST_METHOD']=="GET"&&isset($_GET['hello'])) // Check if the form was submitted via GET method and the submit button named "hello" was clicked
{
    if(isset($_GET['name'])) // Check if the 'name' field is set in the GET request
    {
        echo "Hello ".$_GET['name']; // Output "Hello " followed by the user's name, directly from the GET request (XSS vulnerability here)
    }
    else{
        echo "Hello User"; // If the 'name' field is not set, output "Hello User"
    }
}
?>
<!--
    The XSS When echo run
    -------------------------------Why----------------------------
    because you print the value that you take from user without making any filter
    -------------------------------Mitigation----------------------
    Making filteration like using htmlspecialchars() ==> echo htmlspecialchars(value==>$_GET['name'])
-->
