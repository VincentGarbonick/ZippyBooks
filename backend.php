
<?php

function makeTable($conn, $query)
{
    $result = mysqli_query($conn,$query); 
    // Get the number of rows in the result, as well as the first row
    //  and the number of fields in the rows
    $num_rows = mysqli_num_rows($result);
    //print "Number of rows = $num_rows <br />";

    print "<table><caption> <h2> Test </h2> </caption>";
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
}
$hostName = "localhost";
$userName = "root";
$password = "";
$dbName = "isp";

$conn = mysqli_connect($hostName, $userName, $password,$dbName);
if(isset($_POST['btn-print']))
{
    makeTable($conn, "SELECT * FROM zippybooksdb");
}
elseif(isset($_POST['btn-add']))
{
    $title = $_POST["addform_Title"];
    $price = $_POST["addform_Price"];
    $qty = $_POST["addform_Qty"];

    // get largest ID, so we can increment it
    // this would obviously not work in real life with asycnrhonous usecases, and it would be better to use 
    // some kind of sequence. This is a stretch goal. 
    $pulledValue = mysqli_fetch_array(mysqli_query($conn, "SELECT MAX(bookID) FROM zippybooksdb"));
    
    $id = $pulledValue[0]  + 1; 
    
    // if we have a qty of 0 or less, we want to set flag to true, and false otherwise 
    if($qty > 0)
    {
        $query = "insert into zippybooksdb values($id, '$title', $price, $qty, 1)";
    }
    else
    {
        $query = "insert into zippybooksdb values($id, '$title', $price, $qty, 0)";
    }
    $result = mysqli_query($conn,$query);
    
    //echo $query;
}
elseif(isset($_POST['btn-price']))
{
    // find if book exists 
    $title = $_POST["priceform_Title"];
    $price = $_POST["priceform_Price"];
            
    //$query = "SELECT * FROM zippybooksdb WHERE title = \"$title\"";
    //$query = "SELECT title FROM zippybooksdb WHERE title = Arguments for Utilitarianism";

    $query = "SELECT title FROM zippybooksdb WHERE title = \"$title\"";

    $checkPrice = mysqli_query($conn, $query);

    // if the title exists 
    if($checkPrice)
    {
        // TODO: Why does zippybooksdb work, but \"$dbName\" or $dbName doesnt?
        //$query = "UPDATE $dbName SET price = $price WHERE title = \"$title\"";
        $query = "UPDATE zippybooksdb SET price = $price WHERE title = \"$title\"";
        mysqli_query($conn, $query);
    }
}
elseif(isset($_POST['btn-delete']))
{
    // find if book exists 
    $title = $_POST["deleteform_Title"];
    $query = "SELECT title FROM zippybooksdb WHERE title = \"$title\"";
    $checkPrice = mysqli_query($conn, $query);

    // if the title exists, delete it 
    if($checkPrice)
    {
        $query = "DELETE FROM zippybooksdb WHERE title = \"$title\"";
        mysqli_query($conn, $query);
    }
}


?>