<form method="get" action="">
    Enter trip id to show its details<input type="number" name="tid"><br>
    <input type="submit" value="Get_It" name="getit">
</form>
<?php
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["getit"]))
{
    require_once "connection_sqli.php";
    $query="select * from trips where trip_id=$_GET[tid]";//payload here
    $stat=$conn->prepare($query);
    $stat->execute();//here is the sqli
    $trips=$stat->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($trips))
    {
        echo"<table border=1>";
        foreach($trips as $trip)
        {
            echo"<tr>";
            foreach($trip as $key=>$value)
            {
                echo"<td>$key Is $value</td>";
            }
            echo"</tr>";
        }
        echo"</table>";
    }
}
?>
<!--
    The Problem while execute clear query
    ------------------------------Why-----------------------------
    user can inject anything that give him access to database
    ------------------------------Mitigation-----------------------
    you can make one of the following to prevent SQL injection
        1-Use Parametrized Query
        2-Stored procedures
        3-Allow-list input validation
-->
