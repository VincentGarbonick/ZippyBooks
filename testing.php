


<html>
<head>
    <title>Test</title>
</head>
<body>
    <p>MySite</p>
    <form action="testing.php" method = "post">
        <input type="submit" name="btn-atc" value="Print Whole Table">
        <input type="submit" name="btn-bbc" value="Print All < 100">
    </form>
</body>
</html>


<?php
    function makeTable($conn, $query)
    {
        $result = mysqli_query($conn,$query); 
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
    }
    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "isp";

    $conn = mysqli_connect($hostName, $userName, $password,$dbName);
    if(isset($_POST['btn-atc']))
    {
        makeTable($conn, "SELECT * FROM zippybooksdb");
    }
    elseif(isset($_POST['btn-bbc']))
    {
        makeTable($conn, "SELECT * FROM zippybooksdb WHERE Price < 100");
    }


?>
