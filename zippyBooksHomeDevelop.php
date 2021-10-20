<?php
    include_once "connection.php";
    /*
    $sql = "SELECT * FROM corvettes;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['Year'] . "<br>";
        }
    }
    */
    $action = $_POST["action"];
    
    if($action == "display")
    $query = "";
else if ($action == "insert")
    $query = "insert into Corvettes values($id, '$type', $miles, $year, $state)";
else if ($action == "update")
    $query = "update Corvettes set Body_style = '$type', Miles = $miles, Year = $year, State = $state where Vette_id = $id";
else if ($action == "delete")
    $query = "delete from Corvettes where Vette_id = $id";
else if ($action == "user")
    $query = $statement;


if($query != ""){
    trim($query);
    $query_html = htmlspecialchars($query);
    print "<b> The query is: </b> " . $query_html . "<br />";
    
    // Don't remove or comment out the line below untill you switched to your own database. VIOLATORS WILL BE SEVERELY PUNISHED!!! :-).
    //$query = "SELECT * FROM Corvettes";
    
    $result = mysqli_query($db,$query);
    if (!$result) {
        print "Error - the query could not be executed";
        $error = mysqli_error();
        print "<p>" . $error . "</p>";
    }
}
    
// Final Display of All Entries
$query = "SELECT * FROM Corvettes";
$result = mysqli_query($db,$query);
if (!$result) {
    print "Error - the query could not be executed";
    $error = mysqli_error();
    print "<p>" . $error . "</p>";
    exit;
}

// Get the number of rows in the result, as well as the first row
//  and the number of fields in the rows
$num_rows = mysqli_num_rows($result);
//print "Number of rows = $num_rows <br />";

print "<table><caption> <h2> Cars ($num_rows) </h2> </caption>";
print "<tr align = 'center'>";

$row = mysqli_fetch_array($result);
$num_fields = mysqli_num_fields($result);

// Produce the column labels
$keys = array_keys($row);
for ($index = 0; $index < $num_fields; $index++) 
    print "<th>" . $keys[2 * $index + 1] . "</th>";
print "</tr>";
    
// Output the values of the fields in the rows
for ($row_num = 0; $row_num < $num_rows; $row_num++) {
    print "<tr align = 'center'>";
    $values = array_values($row);
    for ($index = 0; $index < $num_fields; $index++){
        $value = htmlspecialchars($values[2 * $index + 1]);
        print "<th>" . $value . "</th> ";
    }
    print "</tr>";
    $row = mysqli_fetch_array($result);
}
print "</table>";
    
?>