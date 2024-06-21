<?php
$name=""; // Initialize the $name variable as an empty string
if($_SERVER['REQUEST_METHOD']=="GET"&&isset($_GET['hello'])) // Check if the form was submitted via GET method and the submit button named "hello" was clicked
{
    $name=""; // Reset the $name variable to an empty string (this line is redundant since $name is already initialized as an empty string)
    if(isset($_GET['name'])) // Check if the 'name' field is set in the GET request
    {
        $name=$_GET['name']; // Assign the value of the 'name' field to the $name variable
        echo "Hello ".htmlspecialchars($_GET['name']); // Output "Hello " followed by the user's name, using htmlspecialchars to prevent XSS attacks
    }
    else{
        echo "Hello User"; // If the 'name' field is not set, output "Hello User"
    }
}
?>
<form action="reflectedXss2.php" method="GET" > <!-- The form submits to the 'reflectedXss2.php' page using the GET method -->
Enter Your Name<input type="text" name="name" value="<?php echo $name;?>" required><!--here is the xss--><!-- Text input for the user's name, prefilled with the value of $name -->
<br>
<input type="submit" value="Say Hello" name="hello"> <!-- Submit button labeled "Say Hello" -->
</form>

<!--
    The Problem in input tag in attribute value 
    ------------------------------Why-----------------------------
    user write the value and he can go out from value attribute using " then write the xss payload  
    ------------------------------Mitigation-----------------------
    Makw filteration like  htmlspecialchars()==> htmlspecialchars(Write Your Value ==> $name) 
-->
