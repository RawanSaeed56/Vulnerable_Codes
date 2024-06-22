<form method="POST" action=""> <!-- The form submits to the same page using the POST method -->
    Enter Your problem<input type="text" name="problem"> <!-- Text input for the user's problem -->
    <input type="submit" value="Submit" name="add"> <!-- Submit button labeled "Submit" -->
</form>

<?php
require_once 'conn.php'; // Include the database connection file

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['add'])) // Check if the form was submitted via POST method and the submit button named "add" was clicked
{
    if(isset($_POST['problem'])) // Check if the 'problem' field is set in the POST request
    {
        $sql = "INSERT INTO comment (problem) VALUES(:p)"; // SQL query to insert the problem into the 'comment' table
        $stat = $conn->prepare($sql); // Prepare the SQL statement
        $stat->execute(array(':p' => $_POST['problem'])); // Execute the prepared statement with the user input (Stored XSS here)
    }
}

$sql2 = "SELECT * FROM comment"; // SQL query to select all records from the 'comment' table
$stat2 = $conn->prepare($sql2); // Prepare the SQL statement
$stat2->execute(); // Execute the prepared statement
$allProblems = $stat2->fetchAll(PDO::FETCH_ASSOC); // Fetch all results as an associative array

if(!empty($allProblems)) // Check if there are any problems to display
{
    $i = 1; // Initialize a counter for problem numbering
    foreach($allProblems as $problem) // Loop through each problem record
    {
        foreach($problem as $prob) // Loop through each field in the problem record
        {
            echo "Problem ".$i.": ".$prob."<br>"; // Output the problems (Stored XSS executed here)
            $i++; // Increment the counter
        }
    }
}
else
{
    echo "Nothing To Show"; // If there are no problems to display, output a message
}
?>


<!--
    The Problem When execute sql
    -------------------------------Why----------------------------
    because you execute query with the value that you take from user without making any filter
    -------------------------------Mitigation----------------------
    Make filteration like using htmlspecialchars() ==> htmlspecialchars(value==>$_POST['problem'])
-->
