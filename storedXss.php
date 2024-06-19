 <form method="POST" action="">
    Enter Your problem<input type="text" name="problem"> 
    <input type="submit" value="Submit" name="add">
</form>
<?php
require_once 'conn.php';
if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['add']))
{
    if(isset($_POST['problem']))
    {
        $sql="INSERT INTO comment (problem) VALUES(:p)";
        $stat=$conn->prepare($sql);
        $stat->execute(array(':p'=>$_POST['problem']));//xss here
    }
}
$sql2="SELECT * FROM comment";
$stat2=$conn->prepare($sql2);
$stat2->execute();
$allProblems=$stat2->fetchAll(PDO::FETCH_ASSOC);
if(!empty($allProblems))
{
    $i=1;
    foreach($allProblems as $problem )
    {
        foreach($problem as $prob)
        {
            echo "Problem ".$i.": ".$prob."<br>";
            $i++;
        }
    }
}
else{
    echo "Nothing To Show";
}
?>

<!--
    The Problem When execute sql
    -------------------------------Why----------------------------
    because you execute query with the value that you take from user without making any filter
    -------------------------------Mitigation----------------------
    use htmlspecialchars() ==> htmlspecialchars(value==>$_POST['name'])
-->