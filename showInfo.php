<!DOCTYPE html>
<html>
<head>
    <title>Show Users</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href=
    "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity=
    "sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="styleAndScripts/css/style.css" type="text/css">

    <style>
        table 
        {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th 
        {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) 
        {
          background-color: #dddddd;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center">
        <a  href="ZippyBooks.php">
            <img src="styleAndScripts/assets/uakron.png" style="width:120px;height: auto;">
        </a>
    </div>
    <div style="width:100%; height:24px; background:rgb(134,117,64);"></div>
    <table> 
        <th>Book ID</th>
        <th>Title</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Password</th>
        
        <?php
        
        $hostName = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "isp";
        $tableName = "zippybooksdb";
        $conn = mysqli_connect($hostName, $userName, $password,$dbName);

        $query = "SELECT * FROM $tableName";

        $result = mysqli_query($conn,$query); 
        // Get the number of rows in the result, as well as the first row
        //  and the number of fields in the rows
        $num_rows = mysqli_num_rows($result);
        //print "Number of rows = $num_rows <br />";

        $row = mysqli_fetch_array($result);
        $num_fields = mysqli_num_fields($result);

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
         ?>
    </table>

</body>
</html>

<?php

?>
